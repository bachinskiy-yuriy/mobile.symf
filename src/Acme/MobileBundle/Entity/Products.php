<?php

namespace Acme\MobileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Entity
 * @ORM\Table(name="products", indexes={@ORM\Index(name="categoryId", columns={"categoryId"}), @ORM\Index(name="categoryId_2", columns={"categoryId"}), @ORM\Index(name="categoryId_3", columns={"categoryId"}), @ORM\Index(name="categoryId_4", columns={"categoryId"}), @ORM\Index(name="categoryId_5", columns={"categoryId"}), @ORM\Index(name="conditions", columns={"conditionId"}), @ORM\Index(name="gearboxId", columns={"gearboxId"}), @ORM\Index(name="fuelId", columns={"fuelId"})})
 * @ORM\Entity(repositoryClass="Acme\MobileBundle\Entity\ProductsRepository")
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
     * @var integer
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="firstregistration", type="string", length=10, nullable=false)
     */
    private $firstregistration;

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
     * @var string
     *
     * @ORM\Column(name="tecdata", type="string", length=5000, nullable=true)
     */
    private $tecdata;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=5000, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=5000, nullable=false)
     */
    private $photo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="featured", type="boolean", nullable=false)
     */
    private $featured;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Acme\MobileBundle\Entity\Gearboxes
     *
     * @ORM\ManyToOne(targetEntity="Acme\MobileBundle\Entity\Gearboxes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gearboxId", referencedColumnName="id")
     * })
     */
    private $gearboxid;

    /**
     * @var \Acme\MobileBundle\Entity\Conditions
     *
     * @ORM\ManyToOne(targetEntity="Acme\MobileBundle\Entity\Conditions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conditionId", referencedColumnName="id")
     * })
     */
    private $conditionid;

    /**
     * @var \Acme\MobileBundle\Entity\Categories
     *
     * @ORM\ManyToOne(targetEntity="Acme\MobileBundle\Entity\Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoryId", referencedColumnName="id")
     * })
     */
    private $categoryid;

    /**
     * @var \Acme\MobileBundle\Entity\Fuels
     *
     * @ORM\ManyToOne(targetEntity="Acme\MobileBundle\Entity\Fuels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fuelId", referencedColumnName="id")
     * })
     */
    private $fuelid;



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
     * @param integer $price
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
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
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
     * Set tecdata
     *
     * @param string $tecdata
     * @return Products
     */
    public function setTecdata($tecdata)
    {
        $this->tecdata = $tecdata;

        return $this;
    }

    /**
     * Get tecdata
     *
     * @return string 
     */
    public function getTecdata()
    {
        return $this->tecdata;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Products
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Products
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gearboxid
     *
     * @param \Acme\MobileBundle\Entity\Gearboxes $gearboxid
     * @return Products
     */
    public function setGearboxid(\Acme\MobileBundle\Entity\Gearboxes $gearboxid = null)
    {
        $this->gearboxid = $gearboxid;

        return $this;
    }

    /**
     * Get gearboxid
     *
     * @return \Acme\MobileBundle\Entity\Gearboxes 
     */
    public function getGearboxid()
    {
        return $this->gearboxid;
    }

    /**
     * Set conditionid
     *
     * @param \Acme\MobileBundle\Entity\Conditions $conditionid
     * @return Products
     */
    public function setConditionid(\Acme\MobileBundle\Entity\Conditions $conditionid = null)
    {
        $this->conditionid = $conditionid;

        return $this;
    }

    /**
     * Get conditionid
     *
     * @return \Acme\MobileBundle\Entity\Conditions 
     */
    public function getConditionid()
    {
        return $this->conditionid;
    }

    /**
     * Set categoryid
     *
     * @param \Acme\MobileBundle\Entity\Categories $categoryid
     * @return Products
     */
    public function setCategoryid(\Acme\MobileBundle\Entity\Categories $categoryid = null)
    {
        $this->categoryid = $categoryid;

        return $this;
    }

    /**
     * Get categoryid
     *
     * @return \Acme\MobileBundle\Entity\Categories 
     */
    public function getCategoryid()
    {
        return $this->categoryid;
    }

    /**
     * Set fuelid
     *
     * @param \Acme\MobileBundle\Entity\Fuels $fuelid
     * @return Products
     */
    public function setFuelid(\Acme\MobileBundle\Entity\Fuels $fuelid = null)
    {
        $this->fuelid = $fuelid;

        return $this;
    }

    /**
     * Get fuelid
     *
     * @return \Acme\MobileBundle\Entity\Fuels 
     */
    public function getFuelid()
    {
        return $this->fuelid;
    }
}
