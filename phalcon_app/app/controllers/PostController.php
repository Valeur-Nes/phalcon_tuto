<?php
declare(strict_types=1);

class PostController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
		$this->view->setVar('posts', Post::find(['order' => 'id DESC']));
    }

    public function showAction($id) {
    	$post = Post::findFirst($id);
    	$user = User::findFirst($post->getUserId());
    	$this->view->setVars([
    		'post' => $post,
		    'user' => $user
	    ]);
    }

    public function newAction() {

    }

    public function createAction() {
	    if (!$this->request->isPost() or empty($this->request)) {
		    $this->dispatcher->forward([
			    'controller' => "Post",
			    'action' => 'index'
		    ]);
		    return;
	    }

	    $user = (new Post())
		    ->setTitle($this->request->getPost('title', 'string'))
		    ->setContent($this->request->getPost('content', 'string'))
		    ->setUserId(1)
	    ;

	    if (!$user->save()) {
		    foreach ($user->getMessages as $message) {
			    $this->flash->error($message);
		    }
	    }

	    $this->dispatcher->forward([
		    'controller' => 'Post',
		    'action' => 'index'
	    ]);
    }

    public function editAction($id) {
	    if (!$this->request->isPost()) {
		    $post = Post::findFirst($id);
		    if (!$post) {
			    $this->flash->error("user was not found");

			    $this->dispatcher->forward([
				    'controller' => "Post",
				    'action' => 'index'
			    ]);

			    return;
		    }

		    $this->view->id = $post->getId();
		    $this->tag->setDefault("title", $post->getTitle());
		    $this->tag->setDefault("content", $post->getContent());
	    }
    }

	public function saveAction() {
		if (!$this->request->isPost()) {
			$this->dispatcher->forward([
				'controller' => "Post",
				'action' => 'index'
			]);

			return;
		}

		$id = $this->request->getPost("id");
		$post = Post::findFirst($id);

		if (!$post) {
			$this->flash->error("user does not exist " . $id);

			$this->dispatcher->forward([
				'controller' => "Post",
				'action' => 'index'
			]);

			return;
		}

		$post->setTitle($this->request->getPost("title", "string"));
		$post->setContent($this->request->getPost("content", "string"));

		if (!$post->save()) {

			foreach ($post->getMessages() as $message) {
				$this->flash->error($message);
			}

			$this->dispatcher->forward([
				'controller' => "Post",
				'action' => 'edit',
				'params' => [$post->getId()]
			]);

			return;
		}

		$this->flash->success("user was updated successfully");

		$this->dispatcher->forward([
			'controller' => "Post",
			'action' => 'index'
		]);
	}

	public function deleteAction($id) {
		$post = Post::findFirst($id);

		if (!$post) {
			$this->flash->error("user was not found");

			$this->dispatcher->forward([
				'controller' => "Post",
				'action' => 'index'
			]);

			return;
		}

		if (!$post->delete()) {

			foreach ($post->getMessages() as $message) {
				$this->flash->error($message);
			}

			$this->dispatcher->forward([
				'controller' => "Post",
				'action' => 'search'
			]);

			return;
		}

		$this->flash->success("user was deleted successfully");

		$this->dispatcher->forward([
			'controller' => "Post",
			'action' => "index"
		]);
	}

}

