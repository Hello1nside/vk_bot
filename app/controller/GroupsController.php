<?php
/**
 * Created by PhpStorm.
 * User: Yevhenii Mudrahel
 * Date: 08.08.2018
 * Time: 23:09
 */

namespace app\controller;

use app\model\GroupsModel;

class GroupsController
{
    public function getGroups()
    {
        $groupsModel = new GroupsModel();
        return $groupsModel->select();
    }

    public function addGroups($param)
    {
        $data = [
            'owner_id' => intval($param['ownerId']),
            'url' => $param['url'],
            'tag' => $param['tag'],
            'name' => $param['name']
        ];
        $groupsModel = new GroupsModel();
        return $groupsModel->create($data);
    }

    public function deleteGroups($id)
    {
        $groupsModel = new GroupsModel();
        return $groupsModel->delete(['id' => $id]);
    }
}