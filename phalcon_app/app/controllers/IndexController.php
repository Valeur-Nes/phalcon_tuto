<?php
declare(strict_types=1);

use Phalcon\HTTP\Request;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
	    $this->view->setVars([
	    	'name' => 'Martin',
		    'tab' => [
		    	1 => '1',
			    2 => '2',
			    3 => '3',
			    4 => '4',
			    5 => '5'
		    ]
	    ]);
    }

    public function showAction()
    {
    	$request = new Request();
		$this->view->var = $request->get('var');
    }

    public function editAction()  {

    }

    public function newAction() {

    }

}