<?php
namespace ZC\Entity;
/**
 * @Table(name="accounts")
 * @Entity
 * author frank
 */

class Account{
	/**
	 * @var integer $id
	 * @Column(name="id", type="integer", nullable=false, unique=true)
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @Column(type="string", nullable=true, length=20, unique=true)
	 * @var string
	 */
	private $username;

  /**
  * @Column(type="string", nullable=true, length=200, unique=true)
  * @var string
  */
	private $email;

  /**
  * @Column(type="string", nullable=true, length=20)
  * @var string
  */
    private $password;

  /**
  * @Column(type="string", nullable=true, length=10)
  * @var string
  */
    private $status;

  /**
  * @Column(type="string", nullable=true, length=3)
  * @var string
  */
    private $email_newsletter_status;

  /**
  * @Column(type="string", nullable=true, length=4)
  * @var string
  */
    private $email_type;

  /**
  * @Column(type="string", nullable=true, length=3)
  * @var string
  */
    private $email_favorite_artists_status;

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

   public function __construct()
   {
        $this->created_at = \DateTime("now");
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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string $username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailNewsletterStatus()
    {
        return $this->email_newsletter_status;
    }

    /**
     * @param string $email_newsletter_status
     *
     * @return self
     */
    public function setEmailNewsletterStatus($email_newsletter_status)
    {
        $this->email_newsletter_status = $email_newsletter_status;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailType()
    {
        return $this->email_type;
    }

    /**
     * @param string $email_type
     *
     * @return self
     */
    public function setEmailType($email_type)
    {
        $this->email_type = $email_type;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailFavoriteArtistsStatus()
    {
        return $this->email_favorite_artists_status;
    }

    /**
     * @param string $email_favorite_artists_status
     *
     * @return self
     */
    public function setEmailFavoriteArtistsStatus($email_favorite_artists_status)
    {
        $this->email_favorite_artists_status = $email_favorite_artists_status;

        return $this;
    }

    /**
     * @return string
     */
    public function getUpdateAt()
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     *
     * @return self
     */
    public function setUpdatedAt()
    {
        $this->updated_at = new \DateTime("now");

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