<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use riki34\GameBundle\Interfaces\RESTEntity;

/**
 * Armor
 *
 * @ORM\Table(name="armors")
 * @ORM\Entity
 */
class Armor implements RESTEntity
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
     * @ORM\Column(name="magicDefenceBonus", type="float")
     */
    private $magicDefenceBonus;

    /**
     * @var float
     *
     * @ORM\Column(name="physicDefenceBonus", type="float")
     */
    private $physicDefenceBonus;

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
     * @var integer
     *
     * @ORM\Column(name="typeID", type="integer")
     */
    private $typeID;

    public function getInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'agilityBonus' => $this->agilityBonus,
            'cost' => $this->cost,
            'intelligenceBonus' => $this->intelligenceBonus,
            'magicAttackBonus' => $this->magicAttackBonus,
            'magicDefenceBonus' => $this->magicDefenceBonus,
            'model' => $this->model->getInArray(),
            'modelID' => $this->modelID,
            'physicAttackBonus' => $this->physicAttackBonus,
            'physicDefenceBonus' => $this->physicDefenceBonus,
            'strengthBonus' => $this->strengthBonus,
            'typeID' => $this->typeID,
        );
    }

    public function getSingleInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'agilityBonus' => $this->agilityBonus,
            'cost' => $this->cost,
            'intelligenceBonus' => $this->intelligenceBonus,
            'magicAttackBonus' => $this->magicAttackBonus,
            'magicDefenceBonus' => $this->magicDefenceBonus,
            'modelID' => $this->modelID,
            'physicAttackBonus' => $this->physicAttackBonus,
            'physicDefenceBonus' => $this->physicDefenceBonus,
            'strengthBonus' => $this->strengthBonus,
            'typeID' => $this->typeID,
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
     * @return Armor
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
     * Set modelID
     *
     * @param integer $modelID
     * @return Armor
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
     * Set magicDefenceBonus
     *
     * @param float $magicDefenceBonus
     * @return Armor
     */
    public function setMagicDefenceBonus($magicDefenceBonus)
    {
        $this->magicDefenceBonus = $magicDefenceBonus;

        return $this;
    }

    /**
     * Get magicDefenceBonus
     *
     * @return float 
     */
    public function getMagicDefenceBonus()
    {
        return $this->magicDefenceBonus;
    }

    /**
     * Set physicDefenceBonus
     *
     * @param integer $physicDefenceBonus
     * @return Armor
     */
    public function setPhysicDefenceBonus($physicDefenceBonus)
    {
        $this->physicDefenceBonus = $physicDefenceBonus;

        return $this;
    }

    /**
     * Get physicDefenceBonus
     *
     * @return integer 
     */
    public function getPhysicDefenceBonus()
    {
        return $this->physicDefenceBonus;
    }

    /**
     * Set magicAttackBonus
     *
     * @param integer $magicAttackBonus
     * @return Armor
     */
    public function setMagicAttackBonus($magicAttackBonus)
    {
        $this->magicAttackBonus = $magicAttackBonus;

        return $this;
    }

    /**
     * Get magicAttackBonus
     *
     * @return integer 
     */
    public function getMagicAttackBonus()
    {
        return $this->magicAttackBonus;
    }

    /**
     * Set physicAttackBonus
     *
     * @param float $physicAttackBonus
     * @return Armor
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
     * @return Armor
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
     * @return Armor
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
     * @return Armor
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
     * @return Armor
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
     * Set typeID
     *
     * @param integer $typeID
     * @return Armor
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
     * Set model
     *
     * @param \riki34\GameBundle\Entity\Model $model
     * @return Armor
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
