<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\GiteRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * @ORM\Entity(repositoryClass=GiteRepository::class)
 * @Vich\Uploadable
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
     * @var File|null
     * @Vich\UploadableField(mapping = "gite_image", fileNameProperty = "filename")
     * @Assert\NotBlank()
     */
    private $imageFile;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $fileName;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $superficy;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $bedroom;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $nbBed;

    /**
     * @ORM\Column(type="boolean")
     *
     */
    private $animals;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $priceAnimals;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $priceHightSeason;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $priceLowSeason;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length( 
     *              min=5, 
     *              max=40, 
     *              minMessage="Nom trop cours",
     *              maxMessage="Nom trop long"
     *              )
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     * @Assert\Length(
     *              min=100,
     *              max=500, 
     *              minMessage="Description trop courte",
     *              maxMessage="Description trop longue"
     *              )
     */
    private $descript;

    /**
     * @ORM\ManyToMany(targetEntity=Equipement::class, inversedBy="gites")
     */
    private $equipements;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $updated_at;

    /**
     * @ORM\ManyToMany(targetEntity=Service::class, inversedBy="gites")
     */
    private $services;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *              min=2,
     *              max=50,
     * )
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * 
     */
    private $postalCode;

    /**
     * @ORM\Column(type="float", scale=4, precision=6)
     */
    private $lat;

    /**
     * @ORM\Column(type="float", scale=4, precision=7)
     */
    private $lng;

    public function __construct()
    {
        $this->equipements = new ArrayCollection();
        $this->services = new ArrayCollection();
    }

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescript(): ?string
    {
        return $this->descript;
    }

    public function setDescript(string $descript): self
    {
        $this->descript = $descript;

        return $this;
    }

    /**
     * @return Collection|Equipement[]
     */
    public function getEquipements(): Collection
    {
        return $this->equipements;
    }

    public function addEquipement(Equipement $equipement): self
    {
        if (!$this->equipements->contains($equipement)) {
            $this->equipements[] = $equipement;
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): self
    {
        $this->equipements->removeElement($equipement);

        return $this;
    }

    

    /**
     * Get the value of imageFile
     *
     * @return  File|null
     */ 
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set the value of imageFile
     *
     * @param  File|null  $imageFile
     *
     * @return  self
     */ 
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;
        
        if ($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        
        return $this;
    }

    /**
     * Get the value of fileName
     *
     * @return  string|null
     */ 
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set the value of fileName
     *
     * @param  string|null  $fileName
     *
     * @return  self
     */ 
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        $this->services->removeElement($service);

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(float $lng): self
    {
        $this->lng = $lng;

        return $this;
    }

}
