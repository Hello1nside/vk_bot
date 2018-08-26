<?php
/**
 * Created by PhpStorm.
 * User: Yevhenii Mudrahel
 * Date: 08.08.2018
 * Time: 23:17
 */

namespace app\controller;

use app\model\PostsModel;
use app\model\GroupsModel;
use app\model\PostImagesModel;

Class PostsController
{
    private $access_token = '';
    private $group_id = 26350528;
    private $version = '5.80';

    public function getPosts($param)
    {
        $limit = 25;
        if (!empty($param['limit'])) {
            $limit = $param['limit'];
        }

        $where = ['LIMIT' => $limit];

        if (!empty($param['st']) || isset($param['st'])) {
            $where['st'] = $param['st'];
        }

        if (!empty($param['group_id'])) {
            $where['group_id'] = $param['group_id'];
        }

        if (!empty($param['portion'])) {
            $offset = $limit * $param['portion'];
            $where['LIMIT'] = [$offset, $limit];
        }

        $postsModel = new PostsModel();


        $posts = $postsModel->select('*', $where);
        $postsId = [];
        foreach ($posts as $post) {
            $postsId[] = $post['id'];
        }
        $images = $this->getImages($postsId);
        $groups = $this->getGroups();

        $result = [];
        foreach ($posts as $post) {
            $post['images'][] = !empty($images[$post['id']]) ? $images[$post['id']] : '';
            $post['owner_id_group'] = $groups[$post['group_id']]['owner_id'];
            $result[] = $post;
        }

        return $result;
    }

    public function updatePost($data, $where)
    {
        if (empty($data) || empty($where)) return false;
        $postsModel = new PostsModel();
        $posts = $postsModel->update($data, $where);
        return $posts == 1;
    }

    public function getImages($postsId = [])
    {
        $where = [];
        $columns = '*';

        if (!empty($postsId)) {
            $columns = ['id_post', 'id_image', 'img_url'];
            $where['id_post'] = $postsId;
        }
        $postImagesModel = new PostImagesModel();
        $imagesData = $postImagesModel->select($columns, $where);
        $images = [];
        foreach ($imagesData as $row) {
            $images[$row['id_post']] = $row;
        }
        return $images;
    }

    public function postPublication()
    {
        $param = [
            'st' => 2,
            'limit' => 1
        ];

        $groupsId = $this->getGroupsIdByTime();
        if ($groupsId || !empty($groupsId)) {
            $param['group_id'] = $groupsId;
        }

        $post = $this->getPosts($param)[0];
        $text = $post['text'];

        $saveWallPhoto = $this->uploadPhoto($post['images'][0]['img_url'])[0];

        $photoID = 'photo' . $saveWallPhoto['owner_id'] . '_' . $saveWallPhoto['id'];
//        $photoID = 'photo' . $post[0]['owner_id_group'] . '_' . $post[0]['images'][0]['id_image']; // . $post[''];

        $id = $post['id'];
        $group = $this->getGroups([
            'id' => $post['group_id']
        ])[$post['group_id']];

        if (isset($post['images']['id_image'])) return false;

        $text = $group['tag'] . "\n" . $text;
        $request_params = [
            'owner_id' => -26350528,
            'message' => $text,
            'attachments' => ['photo' => $photoID],
            'signed' => 0,
            'v' => $this->version,
            'access_token' => $this->access_token
        ];

        $get_params = http_build_query($request_params);
        $dataLink = 'https://api.vk.com/method/wall.post?' . $get_params;

        $this->updatePost(['st' => '3'], ['id' => $id]);

        return json_decode(file_get_contents($dataLink));
    }

    public function getGroupsIdByTime()
    {
        $hour = date('H') + 3; //TODO: временный костыль, в связи с отставанием времеин на серваке
        $tag = [];
        if ($hour > 5 && $hour <= 11) { //06:00 - 11:00 - nature
            $tag[] = '#MyLuckyDay_nature';
        } elseif ($hour > 11 && $hour <= 16) { //12:00 - 16:00 - humor & interesting
            $tag = [
                '#MyLuckyDay_nature', '#MyLuckyDay_interesting'
            ];
        } elseif ($hour > 16 && $hour <= 21) { //17:00 - 21:00 - interesting  & love
            $tag = [
                '#MyLuckyDay_love', '#MyLuckyDay_interesting'
            ];
        } elseif ($hour > 21 && $hour <= 23) { //22:00 - 00:00 - humor & humor
            $tag[] = '#MyLuckyDay_humor';
        } else { //00:00 - 06:00 - other
            $tag = [];
        }

        if (empty($tag)) return false;

        $groupsByTag = $this->getGroups([
            'tag' => $tag
        ]);

        $groupsId = [];
        foreach ($groupsByTag as $group) {
            $groupsId[] = $group['id'];
        }

        return $groupsId;
    }

    public function getGroups($where = [])
    {
        $groupModel = new GroupsModel();
        $result = $groupModel->select('*', $where);
        $groups = [];
        foreach ($result as $row) {
            $groups[$row['id']] = $row;
        }
        return $groups;
    }

    public function parse()
    {
        $groups = $this->getGroups(['st' => 1]);
        if (!empty($groups)) {
            foreach ($groups as $group) {
                $this->parseGroup($group);
            }
            return true;
        } else {
            return false;
        }
    }

    public function addPostImg($data)
    {
        $postImagesModel = new PostImagesModel();
        return $postImagesModel->create($data);
    }

    public function addPost($data)
    {
        $postModel = new PostsModel();
        return $postModel->create($data);
    }

    public function parseGroup($group)
    {
        $request_params = [
            'owner_id' => $group['owner_id'],
            'count' => '100',
            'v' => $this->version,
            'access_token' => $this->access_token
        ];

        $get_params = http_build_query($request_params);
        $dataLink = 'https://api.vk.com/method/wall.get?' . $get_params;
        $result = json_decode(file_get_contents($dataLink));

        $items = $result->response->items;

        $data = [];
        foreach ($items as $item) {
            if ($item->marked_as_ads || !empty($item->is_pinned)) continue;

            $data[$item->id]['id'] = $item->id;
            $data[$item->id]['owner_id'] = $item->owner_id;
            $data[$item->id]['text'] = $item->text;

            if (empty($item->attachments)) continue;
            foreach ($item->attachments as $attachment) {
                if ($attachment->type === 'doc')
                    $data[$item->id]['gif'][$attachment->doc->id] = $attachment->doc->url;
                elseif ($attachment->type === 'photo')
                    $data[$item->id]['picture'][$attachment->photo->id] = array_pop($attachment->photo->sizes);
                else
                    unset($data[$item->id]);
            }
        }

        foreach ($data as $param) {
            $post_id = null;
            $post_id = $this->addPost([
                'post_id' => intval($param['id']),
                'group_id' => $group['id'],
                'text' => $param['text'],
                'created_at' => date('Y-m-d H:i:s')
            ]);

            if (!$post_id) continue; //TODO debug this later

            if (!empty($param['picture'])) {
                foreach ($param['picture'] as $id_image => $val) {
                    $this->addPostImg([
                        'id_image' => $id_image,
                        'id_post' => $post_id,
                        'img_url' => $val->url
                    ]);
                }
            }

            if (!empty($param['gif'])) {
                foreach ($param['gif'] as $id_image => $val) {
                    $this->addPostImg([
                        'id_image' => $id_image,
                        'id_post' => $post_id,
                        'img_url' => $val->url
                    ]);
                }
            }
        }
        return $data;
    }

    public function getWallUploadServer()
    {
        $request_params = [
            'group_id' => $this->group_id,
            'v' => $this->version,
            'access_token' => $this->access_token
        ];

        $get_params = http_build_query($request_params);
        $dataLink = 'https://api.vk.com/method/photos.getWallUploadServer?' . $get_params;

        return json_decode(file_get_contents($dataLink));
    }

    public function uploadPhoto($img_url) {
        $result = $this->getWallUploadServer();
        $file = '/srv/www/mudrahel.com/me/storage/upload/default.jpg';

        //$file = array("photo" => new \CURLFile(dirname(__FILE__)."/1.jpg"));

        $imgContent = file_get_contents($img_url);
        $success = file_put_contents($file, $imgContent);

        if (!$success) return false;

        $file = [
            'photo' => new \CURLFile($file)
        ];

        //$data = array("photo"=>"@".file_get_contents('https://sun9-8.userapi.com/c543103/v543103564/4c0a5/p5-q5Ro3wwE.jpg'));
        $upload_url = $result->response->upload_url;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $upload_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $file);

        $result = json_decode(curl_exec($ch),true);

        $request_params = [
            'group_id' => $this->group_id,
            'server' => $result['server'],
            'photo' => $result['photo'],
            'hash' => $result['hash'],
            'v' => $this->version,
            'access_token' => $this->access_token
        ];

        $post_params = http_build_query($request_params);
        $resultUpload = json_decode(file_get_contents('https://api.vk.com/method/photos.saveWallPhoto?'. $post_params),true);
        return $resultUpload['response'];
    }
}