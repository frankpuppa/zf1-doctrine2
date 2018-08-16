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
	 * @GeneratedValue(strategy="IDENTITY")
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
}
