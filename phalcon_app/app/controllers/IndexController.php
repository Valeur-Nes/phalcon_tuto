<?php
declare(strict_types=1);

use Phalcon\HTTP\Request;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
		$this->view->name = "Martin";
	    $this->view->test = "Valentine";
    }

    public function showAction(string $var)
    {
		$this->view->var = $var;
    }

    public function editAction()  {

    }

    public function newAction() {

    }

}

