<?php

declare(strict_types=1);



use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model;


class UserController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        //
    }

    /**
     * Searches for user
     */
    public function searchAction()
    {
        $numberPage = $this->request->getQuery('page', 'int', 1);
        $parameters = Criteria::fromInput($this->di, 'User', $_GET)->getParams();
        $parameters['order'] = "id";

        $paginator   = new Model(
            [
                'model'      => 'User',
                'parameters' => $parameters,
                'limit'      => 10,
                'page'       => $numberPage,
            ]
        );

        $paginate = $paginator->paginate();

        if (0 === $paginate->getTotalItems()) {
            $this->flash->notice("The search did not find any user");

            $this->dispatcher->forward([
                "controller" => "user",
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
     * Edits a user
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {
            $user = User::findFirstByid($id);
            if (!$user) {
                $this->flash->error("user was not found");

                $this->dispatcher->forward([
                    'controller' => "user",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $user->getId();

            $this->tag->setDefault("id", $user->getId());
            $this->tag->setDefault("login", $user->getLogin());
            $this->tag->setDefault("password", $user->getPassword());
        }
    }

    /**
     * Saves a user edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $user = User::findFirstByid($id);

        if (!$user) {
            $this->flash->error("user does not exist " . $id);

            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'index'
            ]);

            return;
        }

        $user->setlogin($this->request->getPost("login", "int"));
        $user->setpassword($this->request->getPost("password", "int"));

        if (!$user->save()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'edit',
                'params' => [$user->getId()]
            ]);

            return;
        }

        $this->flash->success("user was updated successfully");

        $this->dispatcher->forward([
            'controller' => "user",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a user
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $user = User::findFirstByid($id);
        if (!$user) {
            $this->flash->error("user was not found");

            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'index'
            ]);

            return;
        }

        if (!$user->delete()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("user was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "user",
            'action' => "index"
        ]);
    }

    /**
     * Creates a new user
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'index'
            ]);

            return;
        }

        $user = new User();
        $user->setlogin($this->request->getPost("login", "string"));
        $user->setpassword($this->request->getPost("password", "string"));
        $userFound = User::findFirst(
            [
                "(login = :login:)",
                'bind' => [
                    'login'    => $user->getLogin(),
                ]
            ]
        );
        
        if ($userFound === null) {

            if (!$user->save()) {
                foreach ($user->getMessages() as $message) {
                    $this->flash->error($message);
                }

                $this->dispatcher->forward([
                    'controller' => "user",
                    'action' => 'new'
                ]);

                return;
            }

            $this->flash->success("Your account has been successfully created.");

            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'index'
            ]);
        }
    }

    public function loginAction()
    {
        if ($this->request->isPost()) {
            $login    = $this->request->getPost('login');
            $password = $this->request->getPost('password');
            $user = User::findFirst(
                [
                    "(login = :login:) AND password = :password: ",
                    'bind' => [
                        'login'    => $login,
                        'password' => $password,
                    ]
                ]
            );
            if ($user !== false) {
                $this->_registerSession($user);
                $this->flash->success(
                    'Welcome ' . $user->name
                );
                // rediriger vers la page d'accueil après connexion réussie
                return $this->dispatcher->forward(
                    [
                        'controller' => 'index',
                        'action'     => 'index',
                    ]
                );
            }
        }
    }
    private function _registerSession($user)
    {
        $this->session->set(
            'auth',
            [
                'id'   => $user->id,
                'name' => $user->name,
            ]
        );
    }
}
