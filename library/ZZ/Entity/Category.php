<?php
namespace ZZ\Entity;
/**
 * @Entity
 */
class Category
{

    /**
     * @var int
     * @Id @Column(type="integer") @GeneratedValue
     */
    private $id;

    /**
     * @var string
     * @Column(type="string")
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|Movie[]
     * @ManyToMany(targetEntity="Movie", mappedBy="categories")
     */
    private $movies;

    public function __construct()
    {
        $this->movies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|Movie[]
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * @param Movie $movie
     */
    public function removeMovie(Movie $movie)
    {
        if (false === $this->movies->contains($movie)) {
            return;
        }
        $this->movies->removeElement($movie);
        $movie->removeCategory($this);
    }

    /**
     * @param Movie $movie
     */
    public function addMovie(Movie $movie)
    {
        if (true === $this->movies->contains($movie)) {
            return;
        }
        $this->movies->add($movie);
        $movie->addCategory($this);
    }
}
?>
