<?php
namespace ZZ\Entity;
use Doctrine\Mapping as ORM;

/**
 * @Entity
 */
class Movie
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
    private $title;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|Category[]
     * @ManyToMany(targetEntity="Category", inversedBy="movies", cascade={"persist"})
     * @JoinTable(
     *  name="movie_category",
     *  joinColumns={
     *      @JoinColumn(name="movie", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @JoinColumn(name="category", referencedColumnName="id")
     *  }
     * )
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Movie
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category $category
     */
    public function removeCategory(Category $category)
    {
        if (false === $this->categories->contains($category)) {
            return;
        }
        $this->categories->removeElement($category);
        $category->removeMovie($this);
    }

    /**
     * @param Category $category
     */
    public function addCategory(Category $category)
    {
        if (true === $this->categories->contains($category)) {
            return;
        }
        $this->categories->add($category);
        $category->addMovie($this);
    }
}
?>
