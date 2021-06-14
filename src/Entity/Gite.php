<?php

namespace App\Entity;

use App\Repository\GiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GiteRepository::class)
 */
class Gite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $superficy;

    /**
     * @ORM\Column(type="integer")
     */
    private $bedroom;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbBed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $animals;

    /**
     * @ORM\Column(type="float")
     */
    private $priceAnimals;

    /**
     * @ORM\Column(type="float")
     */
    private $priceHightSeason;

    /**
     * @ORM\Column(type="float")
     */
    private $priceLowSeason;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getSuperficy(): ?int
    {
        return $this->superficy;
    }

    public function setSuperficy(int $superficy): self
    {
        $this->superficy = $superficy;

        return $this;
    }

    public function getBedroom(): ?int
    {
        return $this->bedroom;
    }

    public function setBedroom(int $bedroom): self
    {
        $this->bedroom = $bedroom;

        return $this;
    }

    public function getNbBed(): ?int
    {
        return $this->nbBed;
    }

    public function setNbBed(int $nbBed): self
    {
        $this->nbBed = $nbBed;

        return $this;
    }

    public function getAnimals(): ?bool
    {
        return $this->animals;
    }

    public function setAnimals(bool $animals): self
    {
        $this->animals = $animals;

        return $this;
    }

    public function getPriceAnimals(): ?float
    {
        return $this->priceAnimals;
    }

    public function setPriceAnimals(float $priceAnimals): self
    {
        $this->priceAnimals = $priceAnimals;

        return $this;
    }

    public function getPriceHightSeason(): ?float
    {
        return $this->priceHightSeason;
    }

    public function setPriceHightSeason(float $priceHightSeason): self
    {
        $this->priceHightSeason = $priceHightSeason;

        return $this;
    }

    public function getPriceLowSeason(): ?float
    {
        return $this->priceLowSeason;
    }

    public function setPriceLowSeason(float $priceLowSeason): self
    {
        $this->priceLowSeason = $priceLowSeason;

        return $this;
    }
}
