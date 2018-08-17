<?php
/**
* Artist Controller.
*
*/
class ArtistController extends Zend_Controller_Action
{
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
}
