<?php
namespace MyApp\Model;
class Training extends BaseDB {
    public $id;
    public $user_id;
    public $day;
    public $excercise_id;
    public $weight;
    public $user_weight;
    public $user_scope;
    public $user_leg;
    public $user_arm;
    public $created_at;
    public $updated_at;

    public function __construct() {
    }
    
    public function getSource() {
        return "Excercise";
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of day
     */ 
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set the value of day
     *
     * @return  self
     */ 
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get the value of excercise_id
     */ 
    public function getExcercise_id()
    {
        return $this->excercise_id;
    }

    /**
     * Set the value of excercise_id
     *
     * @return  self
     */ 
    public function setExcercise_id($excercise_id)
    {
        $this->excercise_id = $excercise_id;

        return $this;
    }

    /**
     * Get the value of weight
     */ 
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @return  self
     */ 
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get the value of user_weight
     */ 
    public function getUser_weight()
    {
        return $this->user_weight;
    }

    /**
     * Set the value of user_weight
     *
     * @return  self
     */ 
    public function setUser_weight($user_weight)
    {
        $this->user_weight = $user_weight;

        return $this;
    }

    /**
     * Get the value of user_scope
     */ 
    public function getUser_scope()
    {
        return $this->user_scope;
    }

    /**
     * Set the value of user_scope
     *
     * @return  self
     */ 
    public function setUser_scope($user_scope)
    {
        $this->user_scope = $user_scope;

        return $this;
    }

    /**
     * Get the value of user_leg
     */ 
    public function getUser_leg()
    {
        return $this->user_leg;
    }

    /**
     * Set the value of user_leg
     *
     * @return  self
     */ 
    public function setUser_leg($user_leg)
    {
        $this->user_leg = $user_leg;

        return $this;
    }

    /**
     * Get the value of user_arm
     */ 
    public function getUser_arm()
    {
        return $this->user_arm;
    }

    /**
     * Set the value of user_arm
     *
     * @return  self
     */ 
    public function setUser_arm($user_arm)
    {
        $this->user_arm = $user_arm;

        return $this;
    }

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