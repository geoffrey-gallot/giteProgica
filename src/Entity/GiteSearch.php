<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class GiteSearch
{
    private $minSurface;
    private $minBedroom;
    private $maxPrice;
    private $accueilAnimal;

    /**
     * Undocumented variable
     *
     * @var ArrayCollection
     */
    private $equipements;

    public function __construct()
    {
        $this->equipements = new ArrayCollection();
    }

    /**
     * Get the value of minSurface
     */ 
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     *
     * @return  self
     */ 
    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of minBedroom
     */ 
    public function getMinBedroom()
    {
        return $this->minBedroom;
    }

    /**
     * Set the value of minBedroom
     *
     * @return  self
     */ 
    public function setMinBedroom($minBedroom)
    {
        $this->minBedroom = $minBedroom;

        return $this;
    }

    /**
     * Get the value of maxPrice
     */ 
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * Set the value of maxPrice
     *
     * @return  self
     */ 
    public function setMaxPrice($maxPrice) 
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * Get the value of accueilAnimal
     */ 
    public function getAccueilAnimal()
    {
        return $this->accueilAnimal;
    }

    /**
     * Set the value of accueilAnimal
     *
     * @return  self
     */ 
    public function setAccueilAnimal($accueilAnimal)
    {
        $this->accueilAnimal = $accueilAnimal;

        return $this;
    }

    /**
     * Get the value of equipements
     */ 
    public function getEquipements()
    {
        return $this->equipements;
    }

    /**
     * Set the value of equipements
     *
     * @return  self
     */ 
    public function setEquipements($equipements)
    {
        $this->equipements = $equipements;

        return $this;
    }
}