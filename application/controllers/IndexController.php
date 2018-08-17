<?php
use ZC\Entity\User;

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function getDoctrineContainer()
    {
        return $this->getInvokeArg('bootstrap')->getResource('doctrine');
    }

    public function indexAction()
    {
    	//$u = new User();
        $doctrine = $this->getDoctrineContainer();
        $em = $doctrine->getEntityManager(); //
    	// $this->doctrineContainer = Zend_Registry::get("doctrine");
    	// $em = $this->doctrineContainer->getEntityManager();
    	$repo = $em->getRepository("ZC\Entity\User");
    	$u = $em->find("ZC\Entity\User",1);
    	$users = $repo->findAll();
        // var_dump(APPLICATION_PATH);
    	// var_dump(get_class_methods($em));
    	// var_dump(get_class_methods($repo));
    	// var_dump($users[0]->getFirstname());
        // var_dump($users[0]->lastname);
    }
}
