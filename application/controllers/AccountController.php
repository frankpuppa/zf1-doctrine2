<?php
use ZC\Entity\User;

class AccountController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
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
            $user = new User();

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
        $captchaElement = new Zend_Form_Element_Captcha
        (
            'signup',
            array('captcha' => array(
                'captcha' => 'Figlet',
                'wordLen' => 6,
                'timeout' => 600))
        );
        $captchaElement->setLabel('Please type in the
            words below to continue');
        $form->addElement($captchaElement);
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
}
