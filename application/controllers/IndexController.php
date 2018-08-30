<?php
use ZC\Entity\User;
use ZC\Entity\Account;
use ZC\Entity\AccountArtist;
// use ZZ\Entity\Category;
// use ZZ\Entity\Movie;

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
        $this->repoAccount = $this->em->getRepository("ZC\Entity\Account");
        $this->repoArtist = $this->em->getRepository("ZC\Entity\Artist");
        $this->repoAccountA = $this->em->getRepository("ZC\Entity\AccountArtist");
    }

    // public function getDoctrineContainer()
    // {
    //     return $this->getInvokeArg('bootstrap')->getResource('doctrine');
    // }

    public function indexAction()
    {
    	// $u = new User("TdddTT","RRdddR");
        // $u->setFirstname("Test");
        // $u->setLastname("Test");
        // $this->em->persist($u);
        // $this->em->flush();
        // $doctrine = $this->getDoctrineContainer();
        // $em = $doctrine->getEntityManager(); //
    	// $this->doctrineContainer = Zend_Registry::get("doctrine");
    	// $em = $this->doctrineContainer->getEntityManager();
    	 // $repoU = $this->em->getRepository("ZC\Entity\User");
         // $repoA = $this->em->getRepository("ZC\Entity\Account");
    	// $u = $this->em->find("ZC\Entity\AccountArtist",1);
        // var_dump($u);
        // var_dump(count($u->artists));
    	 // $users = $repoU->findAll();
         // $accounts = $repoA->findAll();
        // var_dump(APPLICATION_PATH);
    	// var_dump(get_class_methods($em));
    	// var_dump(get_class_methods($repo));
    	// var_dump($accounts[0]->setUsername("newUserrr"));
     //    $this->em->persist($accounts[0]);
     //    $this->em->flush();
        // $query = $this->em->createQuery("SELECT a FROM ZC\Entity\Account a WHERE a.status='active'");
        // $accounts = $query->getResult();
        // $accounts = $this->repoAccount->findBy(["status" => "active"]);
        // $accounts = $this->repoAccountA->find();
        // var_dump($accounts);

        // var_dump($users);
        // var_dump($accounts);
        // var_dump($users[0]->getLastname());
        // $movie = new Movie();
        // $movie->setTitle('Star Wars');
        // $category = new Category;
        // $category->setName('Drama');
        // $movie = $this->em->getRepository('ZZ\Entity\Movie')->findOneByTitle('Star Wars');
        // var_dump($movie->getCategories()[0]->getName());
        // $this->em->persist($movie);
        // $this->em->flush();
        $accounts = $this->repoAccount->findBy(["status" => "active"]);
        // $e=$accounts[0]->getArtists();
        // $acc = $this->repoAccountA->findAll();
        $acc = $this->repoAccountA->findBy(["account_id" => $accounts[0]->getId(),
                "is_fav" => 1]);
        var_dump($acc);
        // var_dump($accounts[0]->getArtists()[0]->getName());
    }

    public function reactAction(){

    }

    public function ajaxAction(){

    }

    public function testAction(){
        $genres = array(
                "electronic"
                => "Electronic",
                "country"
                => "Country",
                "rock"
                => "Rock",
                "r_n_b"
                => "R & B",
                "hip_hop"
                => "Hip-Hop",
                "heavy_metal" => "Heavy-Metal",
                "alternative_rock" => "Alternative Rock",
                "christian"
                => "Christian",
                "jazz"
                => "Jazz",
                "pop"
                => "Pop"
            );
        if($this->_request->isXmlHttpRequest()){
        //Save the user into the system.
            echo json_encode($genres);
            exit;
        }else{
            throw new Exception("Whoops. Wrong way of submitting your information.");
        }

    }
}
