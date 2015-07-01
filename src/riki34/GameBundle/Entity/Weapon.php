<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Weapon
 *
 * @ORM\Table(name="weapons")
 * @ORM\Entity
 */
class Weapon
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
     * @ORM\Column(name="typeID", type="integer")
     */
    private $typeID;

    /**
     * @var integer
     * @ORM\Column(name="modelID", type="integer")
     */
    private $modelID;

    /**
     * @var Model
     * @ORM\ManyToOne(targetEntity="Model")
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     */
    private $model;

    /**
     * @var float
     *
     * @ORM\Column(name="magicAttackBonus", type="float")
     */
    private $magicAttackBonus;

    /**
     * @var float
     *
     * @ORM\Column(name="physicAttackBonus", type="float")
     */
    private $physicAttackBonus;

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
     * @var float
     *
     * @ORM\Column(name="cost", type="float")
     */
    private $cost;


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
     * @return Weapon
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
     * Set typeID
     *
     * @param integer $typeID
     * @return Weapon
     */
    public function setTypeID($typeID)
    {
        $this->typeID = $typeID;

        return $this;
    }

    /**
     * Get typeID
     *
     * @return integer 
     */
    public function getTypeID()
    {
        return $this->typeID;
    }

    /**
     * Set modelID
     *
     * @param integer $modelID
     * @return Weapon
     */
    public function setModelID($modelID)
    {
        $this->modelID = $modelID;

        return $this;
    }

    /**
     * Get modelID
     *
     * @return integer 
     */
    public function getModelID()
    {
        return $this->modelID;
    }

    /**
     * Set magicAttackBonus
     *
     * @param float $magicAttackBonus
     * @return Weapon
     */
    public function setMagicAttackBonus($magicAttackBonus)
    {
        $this->magicAttackBonus = $magicAttackBonus;

        return $this;
    }

    /**
     * Get magicAttackBonus
     *
     * @return float 
     */
    public function getMagicAttackBonus()
    {
        return $this->magicAttackBonus;
    }

    /**
     * Set physicAttackBonus
     *
     * @param float $physicAttackBonus
     * @return Weapon
     */
    public function setPhysicAttackBonus($physicAttackBonus)
    {
        $this->physicAttackBonus = $physicAttackBonus;

        return $this;
    }

    /**
     * Get physicAttackBonus
     *
     * @return float 
     */
    public function getPhysicAttackBonus()
    {
        return $this->physicAttackBonus;
    }

    /**
     * Set strengthBonus
     *
     * @param float $strengthBonus
     * @return Weapon
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
     * @return Weapon
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
     * @return Weapon
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

    /**
     * Set cost
     *
     * @param float $cost
     * @return Weapon
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return float 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set model
     *
     * @param \riki34\GameBundle\Entity\Model $model
     * @return Weapon
     */
    public function setModel(\riki34\GameBundle\Entity\Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \riki34\GameBundle\Entity\Model 
     */
    public function getModel()
    {
        return $this->model;
    }
}
