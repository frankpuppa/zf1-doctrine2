<?php
 use ZC\Helper\TestHelper;
 use ZC\Entity\Artist;
 use ZC\Entity\AccountArtist;
 use ZC\Entity\Account;
/**
* Artist Controller.
*
*/
class ArtistController extends Zend_Controller_Action
{
	private $testhelper;
	/**
	 *
	 * @return [type] [description]
	 */
	public function init(){
		$this->testhelper = new TestHelper();
		$this->doctrine = Zend_Registry::get('doctrine');
		$this->em = $this->doctrine->getEntityManager();
	}

	/**
	* New Action
	*/
	public function newAction()
	{
		//Check if the user is logged in.
		   //Set the view variables
		 $this->view->form = $this->getAddArtistForm();
	}

	/**
	* Artist Profile
	*
	*/
	public function profileAction()
	{
	}

	/**
	* List all the artists in the system.
	*
	*/
	public function listAllArtistsAction()
	{
	}

	/**
	* Artist Items a user might be interested
	* in purchasing.
	*
	*/
	public function artistaffiliatecontentAction()
	{
		var_dump(new DateTime("now"));
	}

	/**
	* Save the Artist entered by the user.
	*/
	public function saveArtistAction(){
		//Create instance of artist form.
		$form = $this->getAddArtistForm();
		//Check if there were no errors
		if($form->isValid($_POST)){
		//Initialize the variables
			$artistName = $form->getValue('artistName');
			$genre = $form->getValue('genre');
			$rating = $form->getValue('rating');
			$isFav = $form->getValue('isFavorite');
			$repoA = $this->em->getRepository("ZC\Entity\Account");
			$accounts = $repoA->findAll();
			$artist = new Artist($artistName, $genre);
			$this->em->persist($artist);
			$accArtist = new AccountArtist($accounts[0], $artist, $isFav, $rating);
			// var_dump($artist->getAccounts());
			$this->em->persist($artist);
			$this->em->persist($accArtist);
			$this->em->flush();
		}else{
			$this->view->errors = $form->getMessages();
			$this->view->form = $form;
		}
	}

	/**
	* Display news for users artist.
	*/
	public function newsAction()
	{
	//Check if the user is logged in
	//Get the user's Id
	//Get the artists. (Example uses static artists)
		$artists = array("Thievery Corporation",
			"The Eagles",
			"Elton John");
	//Set the view variables
		$this->view->artists = $artists;
	//Find the view in our new location
		$this->view->setScriptPath(APPLICATION_PATH . "/views/scripts");
		$this->view->render("artist/news.phtml");
	}
	/**
	* Create Add Artist Form.
	*
	* @return Zend_Form
	*/
	private function getAddArtistForm()
	{
	    $form = new Zend_Form();
	    $form->setAction("save-artist");
	    $form->setMethod("post");
	    $form->setName("addartist");
	//Create artist name text field.
	    $artistNameElement = new Zend_Form_Element_Text('artistName');
	    $artistNameElement->setLabel("Artist Name:");
	//Create genres select menu
	    $genres = array("multiOptions" => array
	        (
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
	        ));
	    $genreElement = new Zend_Form_Element_Select('genre', $genres);
	    $genreElement->setLabel("Genre:");
	    $genreElement->setRequired(true);
	//Create favorite radio buttons.
	    $favoriteOptions = array("multiOptions" => array
	        (
	            "1" => "yes",
	            "0" => "no"
	        ));
	    $isFavoriteListElement = new Zend_Form_Element_Radio('isFavorite',
	        $favoriteOptions);
	    $isFavoriteListElement->setLabel("Add to Favorite List:");
	    $isFavoriteListElement->setRequired(true);
	    $isFavoriteListElement->setValue(0);
	    // var_dump($isFavoriteListElement);
	//Create Rating raio button
	    $ratingOptions = array("multiOptions" => array
	        (
	            "1" => "1",
	            "2" => "2",
	            "3" => "3",
	            "4" => "4",
	            "5" => "5"
	        ));
	    $ratingElement = new Zend_Form_Element_Radio('rating', $ratingOptions);
	    $ratingElement->setLabel("Rating:");
	    $ratingElement->setRequired(true)->addValidator(new Zend_Validate_Alnum(false));
	//Create submit button
	    $submitButton = new Zend_Form_Element_Submit("submit");
	    $submitButton->setLabel("Add Artist");
	//Add Elements to form
	    $form->addElement($artistNameElement);
	    $form->addElement($genreElement);
	    $form->addElement($isFavoriteListElement);
	    $form->addElement($ratingElement);
	    $form->addElement($submitButton);
	    return $form;
	}

	/**
	* Remove favorite artist..
	*/
	public function removeAction()
	{
		//Check if the user is logged in
		//Get the user's Id
		//Get the user's artists.
		$artists = array(
			array( "name" => "Thievery Corporation", "rating" => 5),
			array("name" => "The Eagles", "rating" => 5),
			array("name" => "Elton John", "rating" => 4)
		);
		//Set the view variables
		$this->view->totalArtist = count($artists);
		$this->view->artists = $artists;
		// require_once(APPLICATION_PATH . "/services/TestHelper.php");
	  // $testhelper = new TestHelper();
		// var_dump(dirname(__FILE__));
		var_dump($this->testhelper);
	}
}
