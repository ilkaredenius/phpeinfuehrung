<?php
namespace MyApp\Model;

//use MyApp;


class Person extends BaseDB {
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $created_at;
    public $updated_at;

    public function __construct() {
    }
    
    public function getSource() {
        return "Person";
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get the value of vorname
     */ 
    public function getVorname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of vorname
     *
     * @return  self
     */ 
    public function setVorname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of nachname
     */ 
    public function getNachname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of nachname
     *
     * @return  self
     */ 
    public function setNachname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
