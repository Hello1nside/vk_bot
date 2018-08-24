<?php

namespace app;

use app\controller\GroupsController;
use app\controller\PostsController;

class Route
{
	private $klein;
	private $twig;

	public function __construct($klein, $twig = false)
	{
		$this->klein = $klein;
		$this->twig = $twig;
		$this->pagesRoutes();
		$this->apiRoutes();
	}

	public function pagesRoutes()
	{
		$this->klein->respond('GET', '/me/', function ($request, $response, $service) {
			$response->body($this->twig->load('@pages/groups.html.twig')->render(['hash' => time()]));
		});

		$this->klein->respond('GET', '/me/posts', function ($request, $response, $service) {
            $response->body($this->twig->load('@pages/posts.html.twig')->render(['hash' => time()])) ;
		});
	}

	public function apiRoutes()
	{
        $this->klein->respond('GET', '/me/api/get-groups', function ($request, $response, $service) {
            $groupsController = new GroupsController();
            $groups = $groupsController->getGroups();
            $response->json(['groups' => $groups]);
        });

        $this->klein->respond('GET', '/me/api/get-posts', function ($request, $response, $service) {
            $postsController = new PostsController();
            $posts = $postsController->getPosts([
                'st' => $request->st,
                'group_id' => $request->group,
                'portion' => $request->portion
            ]);
            $response->json(['posts' => $posts]);
        });

        $this->klein->respond('GET', '/me/api/parsing', function ($request, $response, $service) {
            $postController = new PostsController();
            $result = $postController->parse();
        	$response->json(['result' => $result]);
		});

        $this->klein->respond('GET', '/me/api/publish', function ($request, $response, $service) {
            $postController = new PostsController();
            $result = $postController->postPublication();
            $response->json(['result' => $result]);
        });

        //post

        $this->klein->respond('POST', '/me/api/add-groups', function ($request, $response, $service) {
            $groupsController = new GroupsController();
            $result = $groupsController->addGroups($request->data);
            $response->json(['success' => $result ? true:false]);
		});

        $this->klein->respond('POST', '/me/api/delete-groups', function ($request, $response, $service) {
            $groupsController = new GroupsController();
            $result = $groupsController->deleteGroups($request->id);
            $response->json(['success' => $result ? true:false]);
		});

        $this->klein->respond('POST', '/me/api/set-post-st', function ($request, $response, $service) {
            $postController = new PostsController();
            $result = $postController->updatePost(
                ['st' => $request->st],
                ['id' => $request->id]
            );
            $response->json(['success' => $result]);
        });

        $this->klein->respond('GET', '/me/api/test', function ($request, $response, $service) {
            $postController = new PostsController();
            $postController->testUploadPhoto();
        });

        $this->klein->respond('GET', '/me/api/upload-photo', function ($request, $response, $service) {
            $postController = new PostsController();
            $result = $postController->uploadPhoto();
            $response->json(['success' => $result ? true:false]);
        });
	}
}