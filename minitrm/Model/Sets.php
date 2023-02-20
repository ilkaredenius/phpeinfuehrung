<?php
namespace MyApp\Model;
class Sets extends BaseDB {
    public $id;
    public $training_id;
    public $weight;
    public $repetitions;
    public $created_at;
    public $updated_at;

    public function __construct() {
    }
    
    public function getSource() {
        return "Sets";
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of training_id
     */ 
    public function getTraining_id()
    {
        return $this->training_id;
    }

    /**
     * Set the value of training_id
     *
     * @return  self
     */ 
    public function setTraining_id($training_id)
    {
        $this->training_id = $training_id;

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
     * Get the value of repetitions
     */ 
    public function getRepetitions()
    {
        return $this->repetitions;
    }

    /**
     * Set the value of repetitions
     *
     * @return  self
     */ 
    public function setRepetitions($repetitions)
    {
        $this->repetitions = $repetitions;

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

