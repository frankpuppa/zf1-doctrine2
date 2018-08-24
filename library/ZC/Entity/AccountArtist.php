<?php
namespace ZC\Entity;
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
  * @ManyToOne(targetEntity="ZC\Entity\Account")
  */
    private $account;

 /**
  * @ManyToOne(targetEntity="ZC\Entity\Artist")
  */
    private $artist;

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
    function __construct($artist, $account)
    {
        $this->created_at = new \DateTime("now");
        $this->updated_at = $this->created_at;
        $this->artist = $artist;
        $this->account = $account;
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
}
