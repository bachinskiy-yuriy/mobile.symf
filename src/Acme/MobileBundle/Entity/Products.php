<?php

namespace Acme\MobileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity
 */
class Products
{
    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=100, nullable=false)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=20, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="mainphoto", type="string", length=150, nullable=false)
     */
    private $mainphoto;

    /**
     * @var string
     *
     * @ORM\Column(name="photos", type="string", length=1000, nullable=false)
     */
    private $photos;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=50, nullable=false)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="conditions", type="string", length=20, nullable=false)
     */
    private $conditions;

    /**
     * @var string
     *
     * @ORM\Column(name="firstregistration", type="string", length=10, nullable=false)
     */
    private $firstregistration;

    /**
     * @var string
     *
     * @ORM\Column(name="gearbox", type="string", length=30, nullable=false)
     */
    private $gearbox;

    /**
     * @var string
     *
     * @ORM\Column(name="fuel", type="string", length=30, nullable=false)
     */
    private $fuel;

    /**
     * @var string
     *
     * @ORM\Column(name="mileage", type="string", length=20, nullable=false)
     */
    private $mileage;

    /**
     * @var string
     *
     * @ORM\Column(name="power", type="string", length=20, nullable=false)
     */
    private $power;

    /**
     * @var boolean
     *
     * @ORM\Column(name="featured", type="boolean", nullable=false)
     */
    private $featured;

    /**
     * @var string
     *
     * @ORM\Column(name="photofullsize", type="string", length=1000, nullable=false)
     */
    private $photofullsize;

    /**
     * @var string
     *
     * @ORM\Column(name="photoresize", type="string", length=1000, nullable=false)
     */
    private $photoresize;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set model
     *
     * @param string $model
     * @return Products
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Products
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set mainphoto
     *
     * @param string $mainphoto
     * @return Products
     */
    public function setMainphoto($mainphoto)
    {
        $this->mainphoto = $mainphoto;

        return $this;
    }

    /**
     * Get mainphoto
     *
     * @return string 
     */
    public function getMainphoto()
    {
        return $this->mainphoto;
    }

    /**
     * Set photos
     *
     * @param string $photos
     * @return Products
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get photos
     *
     * @return string 
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Products
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set conditions
     *
     * @param string $conditions
     * @return Products
     */
    public function setConditions($conditions)
    {
        $this->conditions = $conditions;

        return $this;
    }

    /**
     * Get conditions
     *
     * @return string 
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * Set firstregistration
     *
     * @param string $firstregistration
     * @return Products
     */
    public function setFirstregistration($firstregistration)
    {
        $this->firstregistration = $firstregistration;

        return $this;
    }

    /**
     * Get firstregistration
     *
     * @return string 
     */
    public function getFirstregistration()
    {
        return $this->firstregistration;
    }

    /**
     * Set gearbox
     *
     * @param string $gearbox
     * @return Products
     */
    public function setGearbox($gearbox)
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    /**
     * Get gearbox
     *
     * @return string 
     */
    public function getGearbox()
    {
        return $this->gearbox;
    }

    /**
     * Set fuel
     *
     * @param string $fuel
     * @return Products
     */
    public function setFuel($fuel)
    {
        $this->fuel = $fuel;

        return $this;
    }

    /**
     * Get fuel
     *
     * @return string 
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /**
     * Set mileage
     *
     * @param string $mileage
     * @return Products
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * Get mileage
     *
     * @return string 
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Set power
     *
     * @param string $power
     * @return Products
     */
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Get power
     *
     * @return string 
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set featured
     *
     * @param boolean $featured
     * @return Products
     */
    public function setFeatured($featured)
    {
        $this->featured = $featured;

        return $this;
    }

    /**
     * Get featured
     *
     * @return boolean 
     */
    public function getFeatured()
    {
        return $this->featured;
    }

    /**
     * Set photofullsize
     *
     * @param string $photofullsize
     * @return Products
     */
    public function setPhotofullsize($photofullsize)
    {
        $this->photofullsize = $photofullsize;

        return $this;
    }

    /**
     * Get photofullsize
     *
     * @return string 
     */
    public function getPhotofullsize()
    {
        return $this->photofullsize;
    }

    /**
     * Set photoresize
     *
     * @param string $photoresize
     * @return Products
     */
    public function setPhotoresize($photoresize)
    {
        $this->photoresize = $photoresize;

        return $this;
    }

    /**
     * Get photoresize
     *
     * @return string 
     */
    public function getPhotoresize()
    {
        return $this->photoresize;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
