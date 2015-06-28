<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specialization
 *
 * @ORM\Table(name="specializations")
 * @ORM\Entity
 */
class Specialization
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
     * @var float
     *
     * @ORM\Column(name="magicDefenseBonus", type="float")
     */
    private $magicDefenseBonus;

    /**
     * @var float
     *
     * @ORM\Column(name="physicDefenseBonus", type="float")
     */
    private $physicDefenseBonus;

    /**
     * @var float
     *
     * @ORM\Column(name="strengthBonus", type="float")
     */
    private $strengthBonus;

    /**
     * @var float
     *
     * @ORM\Column(name="agilityBonus", type="float")
     */
    private $agilityBonus;

    /**
     * @var float
     *
     * @ORM\Column(name="intelligenceBonus", type="float")
     */
    private $intelligenceBonus;


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
     * @return Specialization
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
     * Set magicDefenseBonus
     *
     * @param float $magicDefenseBonus
     * @return Specialization
     */
    public function setMagicDefenseBonus($magicDefenseBonus)
    {
        $this->magicDefenseBonus = $magicDefenseBonus;

        return $this;
    }

    /**
     * Get magicDefenseBonus
     *
     * @return float 
     */
    public function getMagicDefenseBonus()
    {
        return $this->magicDefenseBonus;
    }

    /**
     * Set physicDefenseBonus
     *
     * @param float $physicDefenseBonus
     * @return Specialization
     */
    public function setPhysicDefenseBonus($physicDefenseBonus)
    {
        $this->physicDefenseBonus = $physicDefenseBonus;

        return $this;
    }

    /**
     * Get physicDefenseBonus
     *
     * @return float 
     */
    public function getPhysicDefenseBonus()
    {
        return $this->physicDefenseBonus;
    }

    /**
     * Set strengthBonus
     *
     * @param float $strengthBonus
     * @return Specialization
     */
    public function setStrengthBonus($strengthBonus)
    {
        $this->strengthBonus = $strengthBonus;

        return $this;
    }

    /**
     * Get strengthBonus
     *
     * @return float 
     */
    public function getStrengthBonus()
    {
        return $this->strengthBonus;
    }

    /**
     * Set agilityBonus
     *
     * @param float $agilityBonus
     * @return Specialization
     */
    public function setAgilityBonus($agilityBonus)
    {
        $this->agilityBonus = $agilityBonus;

        return $this;
    }

    /**
     * Get agilityBonus
     *
     * @return float 
     */
    public function getAgilityBonus()
    {
        return $this->agilityBonus;
    }

    /**
     * Set intelligenceBonus
     *
     * @param float $intelligenceBonus
     * @return Specialization
     */
    public function setIntelligenceBonus($intelligenceBonus)
    {
        $this->intelligenceBonus = $intelligenceBonus;

        return $this;
    }

    /**
     * Get intelligenceBonus
     *
     * @return float 
     */
    public function getIntelligenceBonus()
    {
        return $this->intelligenceBonus;
    }
}
