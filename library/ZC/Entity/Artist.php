<?php
namespace ZC\Entity;
/**
 * @Table(name="artists")
 * @Entity
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

    function __construct()
    {
        $this->created_at = \DateTime("now");
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

        return $this;
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

        return $this;
    }
}
