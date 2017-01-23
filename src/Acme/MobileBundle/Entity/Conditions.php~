<?php

namespace Acme\MobileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conditions
 *
 * @ORM\Table(name="conditions", uniqueConstraints={@ORM\UniqueConstraint(name="condition", columns={"condition"})})
 * @ORM\Entity
 */
class Conditions
{
    /**
     * @var string
     *
     * @ORM\Column(name="condition", type="string", length=20, nullable=false)
     */
    private $condition;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set condition
     *
     * @param string $condition
     * @return Conditions
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * Get condition
     *
     * @return string 
     */
    public function getCondition()
    {
        return $this->condition;
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
