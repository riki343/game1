<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use riki34\GameBundle\Interfaces\RESTEntity;

/**
 * Guild
 *
 * @ORM\Table(name="guilds")
 * @ORM\Entity
 */
class Guild implements RESTEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="fractionID", type="integer")
     */
    private $fractionID;

    /**
     * @var Fraction
     * @ORM\ManyToOne(targetEntity="Fraction")
     * @ORM\JoinColumn(name="fractionID", referencedColumnName="id")
     */
    private $fraction;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var float
     *
     * @ORM\Column(name="expirience", type="float")
     */
    private $expirience;

    /**
     * @var integer
     *
     * @ORM\Column(name="bankID", type="integer")
     */
    private $bankID;

    public function getInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'bankID' => $this->bankID,
            'expirience' => $this->expirience,
            'fractionID' => $this->fractionID,
            'fraction' => $this->fraction->getInArray(),
            'level' => $this->level,
        );
    }

    public function getSingleInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'bankID' => $this->bankID,
            'expirience' => $this->expirience,
            'fractionID' => $this->fractionID,
            'level' => $this->level,
        );
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
     * Set name
     *
     * @param string $name
     * @return Guild
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set fractionID
     *
     * @param integer $fractionID
     * @return Guild
     */
    public function setFractionID($fractionID)
    {
        $this->fractionID = $fractionID;

        return $this;
    }

    /**
     * Get fractionID
     *
     * @return integer 
     */
    public function getFractionID()
    {
        return $this->fractionID;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return Guild
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set expirience
     *
     * @param float $expirience
     * @return Guild
     */
    public function setExpirience($expirience)
    {
        $this->expirience = $expirience;

        return $this;
    }

    /**
     * Get expirience
     *
     * @return float 
     */
    public function getExpirience()
    {
        return $this->expirience;
    }

    /**
     * Set bankID
     *
     * @param integer $bankID
     * @return Guild
     */
    public function setBankID($bankID)
    {
        $this->bankID = $bankID;

        return $this;
    }

    /**
     * Get bankID
     *
     * @return integer 
     */
    public function getBankID()
    {
        return $this->bankID;
    }

    /**
     * Set fraction
     *
     * @param \riki34\GameBundle\Entity\Fraction $fraction
     * @return Guild
     */
    public function setFraction(\riki34\GameBundle\Entity\Fraction $fraction = null)
    {
        $this->fraction = $fraction;

        return $this;
    }

    /**
     * Get fraction
     *
     * @return \riki34\GameBundle\Entity\Fraction 
     */
    public function getFraction()
    {
        return $this->fraction;
    }
}
