<?php
namespace ZC\Entity;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Table(name="accounts_artists")
 * @Entity
 * @HasLifecycleCallbacks
 * author frank
 */

class AccountArtist{
 /**
  * @var integer $id
  * @Column(name="id", type="integer", nullable=false)
  * @Id
  * @GeneratedValue(strategy="AUTO")
  */
	  private $id;

  /**
  * @Column(name="account_id", type="integer", nullable=false)
  */
    private $account_id;

 /**
  * @Column(name="artist_id", type="integer", nullable=false)
  */
    private $artist_id;

  /**
  * @Column(type="integer", nullable=true)
  * @var string
  */
	   private $rating;

  /**
  * @Column(type="integer", nullable=true)
  * @var integer
  */
    private $is_fav;

  /**
  * @Column(type="datetime", nullable=false)
  * @var string
  */
    private $created_at;

  /**
  * @Column(type="datetime", nullable=false)
  * @var string
  */
    private $updated_at;

  /**
   * [__construct description]
   */
    function __construct($account, $artist, $isFav, $rating)
    {
        $this->created_at = new \DateTime("now");
        $this->updated_at = $this->created_at;
        $this->artist_id = $artist->getId();
        $this->account_id = $account->getId();
        $this->is_fav = $isFav;
        $this->rating = $rating;
    }

    /**
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param string $rating
     *
     * @return self
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return integer
     */
    public function getIsFav()
    {
        return $this->is_fav;
    }

    /**
     * @param integer $is_fav
     *
     * @return self
     */
    public function setIsFav($is_fav)
    {
        $this->is_fav = $is_fav;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @PreUpdate
     */
    public function setUpdatedAt()
    {
        $this->updated_at = new \DateTime("now");
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function addArtist(Artist $artist)
    {
      $this->artist_id=$artist->getId();
    }

    public function addAccount(Account $account)
    {
      $this->account_id = $account->getId() ;
    }

    public function getArtist(){
      return $this->artist_id;
    }

    public function getAccount(){
      return $this->account_id;
    }

    /**
     * @param integer $id $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
}
