<?php
declare(strict_types=1);


class UserController extends \Phalcon\Mvc\Controller
{

	/**
	 * Show all Users
	 */
    public function indexAction()
    {
		$this->view->setVar('users', User::find());
    }

	/**
	 * @param int $id
	 * Show one User
	 */
    public function showAction(int $id) {
    	$this->view->setVar('user', User::findFirst($id));
    }

	/**
	 * Display create form
	 */
    public function newAction() {
    	// Display creation user
    }

	/**
	 * Save new user in database
	 */
    public function createAction() {

	    if (!$this->request->isPost() or empty($this->request)) {
		    $this->dispatcher->forward([
			    'controller' => "User",
			    'action' => 'index'
		    ]);
		    return;
	    }

	    $user = (new User())
		    ->setLastname($this->request->getPost('lastname', 'string'))
		    ->setFirstname($this->request->getPost('firstname', 'string'))
		    ->setEmail($this->request->getPost('email', 'string'))
		    ->setPassword($this->security->hash($this->request->getPost('password', 'string')))
	    ;

	    $userFound = User::findFirst([
		    "(email = :email:)",
		    'bind' => [
			    'email' => $user->getEmail()
		    ]
	    ]);

	    if ($userFound == null) {
		    if (!$user->save()) {
			    foreach ($user->getMessages as $message) {
				    $this->flash->error($message);
			    }
		    }

		    $this->dispatcher->forward([
			    'controller' => 'User',
			    'action' => 'index'
		    ]);
		    return;
	    }

	    $this->dispatcher->forward([
		    'controller' => 'User',
		    'action' => 'index'
	    ]);

    }

    public function editAction($id) {
	    if (!$this->request->isPost()) {
		    $user = User::findFirst($id);
		    if (!$user) {
			    $this->flash->error("user was not found");

			    $this->dispatcher->forward([
				    'controller' => "user",
				    'action' => 'index'
			    ]);

			    return;
		    }

		    $this->view->id = $user->getId();
		    $this->tag->setDefault("lastname", $user->getLastname());
		    $this->tag->setDefault("firstname", $user->getFirstname());
		    $this->tag->setDefault("email", $user->getEmail());
		    $this->tag->setDefault("password", $user->getPassword());
	    }

    }

    public function saveAction() {

	    if (!$this->request->isPost()) {
		    $this->dispatcher->forward([
			    'controller' => "user",
			    'action' => 'index'
		    ]);

		    return;
	    }

	    $id = $this->request->getPost("id");
	    $user = User::findFirst($id);

	    if (!$user) {
		    $this->flash->error("user does not exist " . $id);

		    $this->dispatcher->forward([
			    'controller' => "user",
			    'action' => 'index'
		    ]);

		    return;
	    }

	    $user->setLastname($this->request->getPost("lastname", "string"));
	    $user->setFirstname($this->request->getPost("firstname", "string"));
	    $user->setEmail($this->request->getPost("email", "string"));
	    $user->setPassword($this->request->getPost("password", "string"));

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

    public function deleteAction($id) {
	    $user = User::findFirst($id);

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

    public function loginAction() {
	    if ($this->request->isPost()) {
		    $email = $this->request->getPost('email');
		    $password = $this->request->getPost('password');
		    $user = User::findFirst(["(email = :email:) AND password = :password:", 'bind' => ['email' => $email, 'password' => $this->security->hash($password)]]);
        
            if ($user !== false) {
                $this->_registerSession($user);
                $this->flash->success(
                    'Welcome ' . $user->name
                );
                // rediriger vers la page d'accueil après connexion réussie
                return $this->dispatcher->forward(
                    [
                        'controller' => 'user',
                        'action'     => 'board',
                    ]
                );
            }
        }
    }

    public function boardAction() {

    }

    public function _registerSession($user) {
    	$this->session->set('auth', [
    		'id' => $user->id,
		    'firstname' => $user->firstname,
		    'lastname' => $user->lastname
	    ]);
    }

}

