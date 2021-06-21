<?php

namespace App\Entity;

class GiteSearch
{
    private $minSurface;
    private $minBedroom;
    private $maxPrice;

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
}