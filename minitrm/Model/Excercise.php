<?php
namespace MyApp\Model;
class Excercise extends BaseDB {
    public $id;
    public $split_id;
    public $user_id;
    public $name;
    public $number;
    public $sets;
    public $reps;
    public $sequence;
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

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of split_id
     */ 
    public function getSplit_id()
    {
        return $this->split_id;
    }

    /**
     * Set the value of split_id
     *
     * @return  self
     */ 
    public function setSplit_id($split_id)
    {
        $this->split_id = $split_id;

        return $this;
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */ 
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of sets
     */ 
    public function getSets()
    {
        return $this->sets;
    }

    /**
     * Set the value of sets
     *
     * @return  self
     */ 
    public function setSets($sets)
    {
        $this->sets = $sets;

        return $this;
    }

    /**
     * Get the value of reps
     */ 
    public function getReps()
    {
        return $this->reps;
    }

    /**
     * Set the value of reps
     *
     * @return  self
     */ 
    public function setReps($reps)
    {
        $this->reps = $reps;

        return $this;
    }

    /**
     * Get the value of sequence
     */ 
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Set the value of sequence
     *
     * @return  self
     */ 
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;

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