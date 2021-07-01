<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact 
{
    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Length(min=2,max=100)
     */
    private $firstname;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Length(min=2,max=100)
     */
    private $lastname;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Regex(
     *  pattern="/[0-9]{10}/",
     * )
     */
    private $phone;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Length(min=10)
     */
    private $message;

    /**
     * Undocumented variable
     *
     * @var Gite|null
     */
    private Gite $gite;

    /**
     * Get the value of firstname
     *
     * @return  string
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firsname
     *
     * @param  string  $firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     *
     * @return  string
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @param  string  $lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get pattern="/[0-9]{10}/",
     *
     * @return  string
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set pattern="/[0-9]{10}/",
     *
     * @param  string  $phone  pattern="/[0-9]{10}/",
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of message
     *
     * @return  string
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param  string  $message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  Gite|null
     */ 
    public function getGite()
    {
        return $this->gite;
    }

    /**
     * Set undocumented variable
     *
     * @param  Gite|null  $gite  Undocumented variable
     *
     * @return  self
     */ 
    public function setGite(Gite $gite)
    {
        $this->gite = $gite;

        return $this;
    }
}