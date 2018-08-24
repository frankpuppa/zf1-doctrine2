<?php
namespace ZC\Entity;
/**
 * @Table(name="users")
 * @Entity
 * author frank
 */

class User{
	/**
	 * @var integer $id
	 * @Column(name="id", type="integer", nullable=false)
	 * @Id
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	private $firstname;

  /**
  * @Column(type="string", nullable=true)
  * @var string
  */
	private $lastname;
    /**
     * [__construct description]
     * @param [type] $param [description]
     */
    public function __construct($first, $last)
    {
        $this->firstname = $first;
        $this->lastname =  $last;
    }
    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return string $firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get lastname
     *
     * @return string $lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }
}
