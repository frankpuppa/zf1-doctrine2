<?php
namespace ZC\Entity;
/**
 * @Table(name="artists")
 * @Entity
 * @HasLifecycleCallbacks
 * author frank
 */

class Artist{
	/**
	 * @var integer $id
	 * @Column(name="id", type="integer", nullable=false)
	 * @Id
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @Column(type="string", nullable=false, length=200, unique=true)
	 * @var string
	 */
	private $artist_name;

    /**
    * @Column(type="string", nullable=true, length=100)
    * @var string
    */
    private $genre;


    /**
     * @Column(type="datetime", nullable=false, length=100)
     * @var string
     */
    private $created_at;

    /**
     * @Column(type="datetime", nullable=false, length=100)
     * @var string
     */
    private $updated_at;

    function __construct($name, $genre)
    {
        $this->created_at = new \DateTime("now");
        $this->updated_at = $this->created_at;
        $this->artist_name = $name;
        $this->genre = $genre;
        // $this->accounts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     *
     * @return self
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getArtistName()
    {
        return $this->artist_name;
    }

    /**
     * @param string $artist_name
     *
     * @return self
     */
    public function setArtistName($artist_name)
    {
        $this->artist_name = $artist_name;
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

    /**
     * @param Category $category
     */
    // public function addAccount(Account $acc)
    // {
    //     if (true === $this->accounts->contains($acc)) {
    //         return;
    //     }
    //     $this->accounts->add($acc);
    //     $acc->addArtist($this);
    // }
    /**
     * Returns accounts
     */
    // public function getAccounts(){
    //     return $this->accounts;
    // }

    /**
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
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
}
