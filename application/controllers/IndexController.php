<?php
use ZC\Entity\User;

class IndexController extends Zend_Controller_Action
{
    /**
     * @var Bisna\Application\Container\DoctrineContainer
     */
    protected $doctrine;

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    public function init()
    {
        $this->doctrine = Zend_Registry::get('doctrine');
        $this->em = $this->doctrine->getEntityManager();
    }

    // public function getDoctrineContainer()
    // {
    //     return $this->getInvokeArg('bootstrap')->getResource('doctrine');
    // }

    public function indexAction()
    {
    	$u = new User("TdddTT","RRdddR");
        // $u->setFirstname("Test");
        // $u->setLastname("Test");
        $this->em->persist($u);
        $this->em->flush();
        // $doctrine = $this->getDoctrineContainer();
        // $em = $doctrine->getEntityManager(); //
    	// $this->doctrineContainer = Zend_Registry::get("doctrine");
    	// $em = $this->doctrineContainer->getEntityManager();
    	 $repo = $this->em->getRepository("ZC\Entity\User");
    	// $u = $em->find("ZC\Entity\User",1);
    	 $users = $repo->findAll();
        // var_dump(APPLICATION_PATH);
    	// var_dump(get_class_methods($em));
    	// var_dump(get_class_methods($repo));
    	// var_dump($users[0]->getFirstname());
        var_dump($users);
        var_dump($u);
        // var_dump($users[0]->getLastname());
    }
}
