<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;

class IndexController extends Controller
{

    public function indexAction() {
		$this->view->name = "John Doe";
    }

    public function showAction(string $string) {
    	$request = new Request();
	    $this->view->data = "Je test l'affichage";
	    //$this->view->var = $request->get('var');
	    $this->view->var = $string;
    }

}

