<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fuels
 *
 * @ORM\Table(name="fuels", uniqueConstraints={@ORM\UniqueConstraint(name="fuel", columns={"fuel"})})
 * @ORM\Entity
 */
class Fuels
{
    /**
     * @var string
     *
     * @ORM\Column(name="fuel", type="string", length=50, nullable=false)
     */
    private $fuel;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set fuel
     *
     * @param string $fuel
     * @return Fuels
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
