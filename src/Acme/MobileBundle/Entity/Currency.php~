<?php

namespace Acme\MobileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currency
 *
 * @ORM\Table(name="currency")
 * @ORM\Entity
 */
class Currency
{
    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=20, nullable=false)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="rate", type="decimal", precision=10, scale=3, nullable=false)
     */
    private $rate;

    /**
     * @var string
     *
     * @ORM\Column(name="symb", type="string", length=1, nullable=false)
     */
    private $symb;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set currency
     *
     * @param string $currency
     * @return Currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set rate
     *
     * @param string $rate
     * @return Currency
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return string 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set symb
     *
     * @param string $symb
     * @return Currency
     */
    public function setSymb($symb)
    {
        $this->symb = $symb;

        return $this;
    }

    /**
     * Get symb
     *
     * @return string 
     */
    public function getSymb()
    {
        return $this->symb;
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
