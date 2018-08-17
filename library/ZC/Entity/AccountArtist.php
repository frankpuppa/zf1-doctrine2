<?php
namespace ZC\Entity;
/**
 * @Table(name="accounts_artists")
 * @Entity
 * author frank
 */

class AccountArtist{
 /**
  * @var integer $id
  * @Column(name="id", type="integer", nullable=false)
  * @Id
  * @GeneratedValue(strategy="IDENTITY")
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
   * [__construct description]
   */
    function __construct($artist, $account)
    {
        $this->created_at = \DateTime("now");
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

        return $this;
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

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}
