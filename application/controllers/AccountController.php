<?php

use ZC\Entity\AccountArtist;
use ZC\Entity\Account;
use Doctrine\ORM\Query\ResultSetMapping;

class AccountController extends Zend_Controller_Action
{

     /**
      * @var Bisna\Application\Container\DoctrineContainer
      */
     protected $doctrine;

     /**
      * @var Doctrine\ORM\EntityManager
      */
     protected $em;

     /**
      * @var repoAccount
      */
     private $repoAccount;

     /**
      * @var repoAccountArtist
      */
     private $repoAccountArtist;

     public function init()
     {
         $this->doctrine = Zend_Registry::get('doctrine');
         $this->em = $this->doctrine->getEntityManager();
         $this->repoAccount = $this->em->getRepository("ZC\Entity\Account");
         $this->repoArtist = $this->em->getRepository("ZC\Entity\Artist");
         $this->repoAccountArtist = $this->em->getRepository("ZC\Entity\AccountArtist");
     }

     public function indexAction()
     {
        var_dump(new DateTime("now"));
    }

    public function successAction()
    {
        $form = $this->getSignupForm();
    //Check if the submitted data is POST type
        if($form->isValid($_POST)){
            $email = $form->getValue("email");
            $username = $form->getValue("username");
            $password = $form->getValue("password");
            $account = new Account($username, $email, $password, "active");
            $this->em->persist($account);
            $this->em->flush();

        }else{
            // $this->view->errors = $form->getMessages();
            $this->view->errors = $form->getErrors();
            // var_dump($this->view->errors['password'][0]);
            $this->view->form = $form;
        }
    }

    /**
    * Account Sign Up.
    *
    */
    public function newAction(){
        $title = "LoudBite.com – Sign Up";
        //Get the form.
        $form = $this->getSignupForm();
        //Add the form to the view
        $this->view->form = $form;
        $this->view->title = $title;
    }
    /**
    * Create the sign up form.
    */
    private function getSignupForm()
    {
        //Create Form
        $form = new Zend_Form();
        $form->setAction('success');
        $form->setMethod('post');
        $form->setAttrib('sitename', 'loudbite');
        //Add Elements
        require "Form/FormElements.php";
        $LoudbiteElements = new Elements();
        //Create Username Field.
        $form->addElement($LoudbiteElements->getUsernameTextField());
        //Create Email Field.
        $form->addElement($LoudbiteElements->getEmailTextField());
        //Create Password Field.
        $form->addElement($LoudbiteElements->getPasswordTextField());
        //Add Captcha
        // $captchaElement = new Zend_Form_Element_Captcha
        // (
        //     'signup',
        //     array('captcha' => array(
        //         'captcha' => 'Figlet',
        //         'wordLen' => 6,
        //         'timeout' => 600))
        // );
        // $captchaElement->setLabel('Please type in the
        //     words below to continue');
        // $form->addElement($captchaElement);
        $form->addElement('submit', 'submit');
        $submitButton = $form->getElement('submit');
        $submitButton->setLabel('Create My Account!');
        return $form;
    }

    /**
    * Update the User's data.
    *
    */
    public function updateAction()
    {
        //Check if the user is logged in
        //Fetch the user's id
        //Fetch the users information
        //Create the form.
        $form = $this->getUpdateForm();
        //Check if the form has been submitted.
        //If so validate and process.
        if($_POST){
        //Check if the form is valid.
            if($form->isValid($_POST)){
        //Get the values
                $username = $form->getValue('username');
                $password = $form->getValue('password');
                $email = $form->getValue('email');
                $aboutMe = $form->getValue('aboutme');
        //Save the file
                // $form->avatar->receive();
        //Save.
            }else{
                $this->view->form = $form;
            }
        }
        //Otherwise display the form.
        else{
            $this->view->form = $form;
        }
    }
    /**
    * Update Form
    */
    private function getUpdateForm()
    {
    //Create Form
        $form = new Zend_Form();
        $form->setAction('update');
        $form->setMethod('post');
        $form->setAttrib('sitename', 'loudbite');
        $form->setAttrib('enctype', 'multipart/form-data');
    //Load Elements class
        require "Form/FormElements.php";
        $LoudbiteElements = new Elements();
    //Create Username Field.
        $form->addElement($LoudbiteElements->getUsernameTextField());
    //Create Email Field.
        $form->addElement($LoudbiteElements->getEmailTextField());
    //Create Password Field.
        $form->addElement($LoudbiteElements->getPasswordTextField());
    //Create Text Area for About me.
        $textAreaElement = new Zend_Form_Element_Textarea('aboutme');
        $textAreaElement->setLabel('About Me:');
        $textAreaElement->setAttribs(array('cols' => 15,
            'rows' => 5));
        $form->addElement($textAreaElement);
    //Add File Upload
        // $fileUploadElement = new Zend_Form_Element_File('avatar');
        // $fileUploadElement->setLabel('Your Avatar:');
        // $fileUploadElement->setDestination(APPLICATION_PATH . '/../public/users/');
        // // $fileUploadElement->addValidator('Count', false, 1);
        // // $fileUploadElement->addValidator('Extension', false, 'jpg,gif');
        // $form->addElement($fileUploadElement);
    //Create a submit button.
        $form->addElement('submit', 'submit');
        $submitElement = $form->getElement('submit');
        $submitElement->setLabel('Update My Account');
        return $form;
    }

    /**
     * Activate Account. Used once the user
     * receives a welcome email and decides to
     * authenticate their account.
     */
    public function activateAction()
    {
        //Fetch the email to update from the query param 'email'
        $emailToActivate = $this->_request->getQuery("email");
        //Check if the email exists
        //Activate the Account.
    }

    /**
    * View All Accounts.
    *
    */
    public function viewAllAction(){
    //Fetch the data
        $accounts = $this->repoAccount->findBy(["status" => "active"]);
    //Set the view variable.
        $this->view->members = $accounts;
        $this->view->totalMembers = count($accounts);
    }

    /**
    * Get Login Form
    *
    * @return Zend_Form
    */
    private function getLoginForm()
    {
    //Create the form
        $form = new Zend_Form();
        $form->setAction("authenticate");
        $form->setMethod("post");
        $form->setName("loginform");
    //Create text elements
        $emailElement = new Zend_Form_Element_Text("email");
        $emailElement->setLabel("Email: ");
        $emailElement->setRequired(true);
    //Create password element
        $passwordElement = new
        Zend_Form_Element_Password("password");
        $passwordElement->setLabel("Password: ");
        $passwordElement->setRequired(true);
    //Create the submit button
        $submitButtonElement = new
        Zend_Form_Element_Submit("submit");
        $submitButtonElement->setLabel("Log In");
    //Add Elements to form
        $form->addElement($emailElement);
        $form->addElement($passwordElement);
        $form->addElement($submitButtonElement);
        return $form;
    }

    /**
    * Load the Login Form.
    *
    */
    public function loginAction(){
    //Initialize the form for the view.
        $this->view->form = $this->getLoginForm();
    }

    /**
    * Authenticate login information.
    *
    */
    public function authenticateAction(){
        $form = $this->getLoginForm();
        if($form->isValid($_POST)){
    //Initialize the variables
            $email = $form->getValue("email");
            $password = $form->getValue("password");

               //Create a db object
    //Check if the user is in the system and active
            $result = $this->repoAccount->findOneBy(["email" => $email]);
            // var_dump($result);
            // var_dump($result->verifyPassword($password));
            if($result){
                if($result->verifyPassword($password)){
                    //Set the user's session
                    $_SESSION['id'] = $result->getId();
                    $_SESSION['username'] = $result->getUsername();
                    $_SESSION['dateJoined'] = $result->getCreatedAt()->format('H:i:s d-m-Y');
                    //Forward the user to the profile page
                    $this->_forward("accountmanager");
                }
            }else{
            //Set the error message and re-display the login page.
                $this->view->message = "Username or password incorrect.";
                $this->view->form = $form;
                $this->render("login");
            }
        }else{
            $this->view->form = $form;
            $this->render("login");
        }
    }

    /**
    * Account Manager.
    *
    */
    public function accountmanagerAction()
    {
        $title = 'LoudBite.com – Account Manager';
        //Check if the user is logged in
        if(!isset($_SESSION['id'])){
            $this->_forward("login");
        }
        //Initialize data.
            $userId = $_SESSION['id'];
            $userName = $_SESSION['username'];
            $dateJoined = $_SESSION['dateJoined'];

            //Fetch Ids of favorite artists
            // $artists = $this->repoAccountArtist->findBy([
            //     "account_id" => $userId,
            //     "is_fav" =>true
            //      ]);
            // $final_artists = array();
            // //Foreach fav artist, get artist obj
            // foreach($artists as $ar){
            //     $t = $this->repoArtist->find($ar->getId());
            //     if($t){
            //         array_push($final_artists, $t);
            //     }
            // }
            $conn = $this->em->getConnection();
            $sql = 'select * from artists ad where ad.id in (select artist_id from accounts_artists where account_id = 1 AND is_fav = 1)';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $final_artists = $stmt->fetchAll();
            // var_dump($final_artists);

            //Set the view variables
            $this->view->artists = $final_artists;
            $this->view->username = $userName;
            $this->view->dateJoined = $dateJoined;

        $this->view->title=$title;
    }
}
