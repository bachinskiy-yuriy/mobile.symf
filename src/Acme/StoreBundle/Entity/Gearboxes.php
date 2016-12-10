<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gearboxes
 *
 * @ORM\Table(name="gearboxes", uniqueConstraints={@ORM\UniqueConstraint(name="gearbox", columns={"gearbox"})})
 * @ORM\Entity
 */
class Gearboxes
{
    /**
     * @var string
     *
     * @ORM\Column(name="gearbox", type="string", length=50, nullable=false)
     */
    private $gearbox;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set gearbox
     *
     * @param string $gearbox
     * @return Gearboxes
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
