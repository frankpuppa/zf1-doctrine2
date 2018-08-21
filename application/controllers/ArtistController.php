<?php
 use ZC\Helper\TestHelper;
/**
* Artist Controller.
*
*/
class ArtistController extends Zend_Controller_Action
{
	/**
	 * This dependency will be injected by PHP-DI
	 * @Inject
	 * @var TestHelper
	 */
	private $testhelper;

	/**
	* New Action
	*/
	public function newAction()
	{
		//Get all the genres
		$genres = array("Electronic",
			"Country",
			"Rock",
			"R & B",
			"Hip-Hop",
			"Heavy-Metal",
			"Alternative Rock",
			"Christian",
			"Jazz",
			"Pop");
		//Set the view variables
		$this->view->genres = $genres;
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
		//Initialize variables
		$artistName = $this->_request->getPost('artistName');
		$genre = $this->_request->getPost('genre');
		$rating	= $this->_request->getPost('rating');
		$isFav	= $this->_request->getPost('isFav');
		//Validate
		//Save the input into the DB
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
