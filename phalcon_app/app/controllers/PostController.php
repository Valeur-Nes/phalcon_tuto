<?php
declare(strict_types=1);

 

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model;


class PostController extends \Phalcon\Mvc\Controller
{
    /**
     * Index action
     */
    public function indexAction()
    {
        //
    }

    /**
     * Searches for post
     */
    public function searchAction()
    {
        $numberPage = $this->request->getQuery('page', 'int', 1);
        $parameters = Criteria::fromInput($this->di, 'Post', $_GET)->getParams();
        $parameters['order'] = "id";

        $paginator   = new Model(
            [
                'model'      => 'Post',
                'parameters' => $parameters,
                'limit'      => 10,
                'page'       => $numberPage,
            ]
        );

        $paginate = $paginator->paginate();

        if (0 === $paginate->getTotalItems()) {
            $this->flash->notice("The search did not find any post");

            $this->dispatcher->forward([
                "controller" => "post",
                "action" => "index"
            ]);

            return;
        }

        $this->view->page = $paginate;
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        //
    }

    /**
     * Edits a post
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {
            $post = Post::findFirstByid($id);
            if (!$post) {
                $this->flash->error("post was not found");

                $this->dispatcher->forward([
                    'controller' => "post",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $post->getId();

            $this->tag->setDefault("id", $post->getId());
            $this->tag->setDefault("Name", $post->getName());
            $this->tag->setDefault("Description", $post->getDescription());
            $this->tag->setDefault("Price", $post->getPrice());
            $this->tag->setDefault("Location", $post->getLocation());
            $this->tag->setDefault("Created_at", $post->getCreatedAt());
            $this->tag->setDefault("Updated_at", $post->getUpdatedAt());
            
        }
    }

    /**
     * Creates a new post
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "post",
                'action' => 'index'
            ]);

            return;
        }

        $post = new Post();
        $post->setname($this->request->getPost("Name", "int"));
        $post->setdescription($this->request->getPost("Description", "int"));
        $post->setprice($this->request->getPost("Price", "int"));
        $post->setlocation($this->request->getPost("Location", "int"));
        $post->setcreatedAt($this->request->getPost("Created_at", "int"));
        $post->setupdatedAt($this->request->getPost("Updated_at", "int"));
        

        if (!$post->save()) {
            foreach ($post->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "post",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("post was created successfully");

        $this->dispatcher->forward([
            'controller' => "post",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a post edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "post",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $post = Post::findFirstByid($id);

        if (!$post) {
            $this->flash->error("post does not exist " . $id);

            $this->dispatcher->forward([
                'controller' => "post",
                'action' => 'index'
            ]);

            return;
        }

        $post->setname($this->request->getPost("Name", "int"));
        $post->setdescription($this->request->getPost("Description", "int"));
        $post->setprice($this->request->getPost("Price", "int"));
        $post->setlocation($this->request->getPost("Location", "int"));
        $post->setcreatedAt($this->request->getPost("Created_at", "int"));
        $post->setupdatedAt($this->request->getPost("Updated_at", "int"));
        

        if (!$post->save()) {

            foreach ($post->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "post",
                'action' => 'edit',
                'params' => [$post->getId()]
            ]);

            return;
        }

        $this->flash->success("post was updated successfully");

        $this->dispatcher->forward([
            'controller' => "post",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a post
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $post = Post::findFirstByid($id);
        if (!$post) {
            $this->flash->error("post was not found");

            $this->dispatcher->forward([
                'controller' => "post",
                'action' => 'index'
            ]);

            return;
        }

        if (!$post->delete()) {

            foreach ($post->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "post",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("post was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "post",
            'action' => "index"
        ]);
    }
}
