<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$u = new ZC\Entity\User();
    	var_dump($u);
    }
}
