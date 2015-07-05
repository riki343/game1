<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use riki34\GameBundle\Interfaces\RESTEntity;

/**
 * Monster
 *
 * @ORM\Table(name="monsters")
 * @ORM\Entity
 */
class Monster implements RESTEntity
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
     * @ORM\Column(name="type_id", type="integer")
     */
    private $typeID;

    /**
     * @var integer
     *
     * @ORM\Column(name="model_id", type="integer")
     */
    private $modelID;

    /**
     * @var Model
     * @ORM\ManyToOne(targetEntity="Model")
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     */
    private $model;

    /**
     * @var integer
     *
     * @ORM\Column(name="fraction_id", type="integer", nullable=true, options={ "default" = null })
     */
    private $fractionID;

    /**
     * @var Fraction
     * @ORM\ManyToOne(targetEntity="Fraction")
     * @ORM\JoinColumn(name="fraction_id", referencedColumnName="id")
     */
    private $fraction;

    /**
     * @var integer
     * @ORM\Column(name="level", type="integer", options={"default" = 0})
     */
    private $level;

    /**
     * @var float
     * @ORM\Column(name="hp", type="float")
     */
    private $hp;

    /**
     * @var float
     * @ORM\Column(name="mp", type="float")
     */
    private $mp;

    /**
     * @var float
     * @ORM\Column(name="strength", type="float")
     */
    private $strength;

    /**
     * @var float
     * @ORM\Column(name="agility", type="float")
     */
    private $agility;

    /**
     * @var float
     * @ORM\Column(name="intelligence", type="float")
     */
    private $intelligence;

    /**
     * @var float
     * @ORM\Column(name="hp_regeneration", type="float")
     */
    private $hpRegeneration;

    /**
     * @var float
     * @ORM\Column(name="mp_regeneration", type="float")
     */
    private $mpRegeneration;

    /**
     * @var float
     * @ORM\Column(name="energy_regeneration", type="float")
     */
    private $energyRegeneration;

    /**
     * @var integer
     * @ORM\Column(name="location_id", type="integer", nullable=true, options={"default" = true})
     */
    private $locationID;

    /**
     * @var Location
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="monsters")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    private $location;

    public function getInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'modelID' => $this->modelID,
            'model' => $this->model->getInArray(),
            'agility' => $this->agility,
            'energyRegeneration' => $this->energyRegeneration,
            'fractionID' => $this->fractionID,
            'fraction' => $this->fraction->getInArray(),
            'hp' => $this->hp,
            'strength' => $this->strength,
            'typeID' => $this->typeID,
            'hpRegeneration' => $this->hpRegeneration,
            'intelligence' => $this->intelligence,
            'level' => $this->level,
            'location' => $this->location->getInArray(),
            'locationID' => $this->locationID,
            'mpRegeneration' => $this->mpRegeneration,
            'mp' => $this->mp,
        );
    }

    public function getSingleInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'modelID' => $this->modelID,
            'agility' => $this->agility,
            'energyRegeneration' => $this->energyRegeneration,
            'fractionID' => $this->fractionID,
            'hp' => $this->hp,
            'strength' => $this->strength,
            'typeID' => $this->typeID,
            'hpRegeneration' => $this->hpRegeneration,
            'intelligence' => $this->intelligence,
            'level' => $this->level,
            'locationID' => $this->locationID,
            'mpRegeneration' => $this->mpRegeneration,
            'mp' => $this->mp,
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
     * @return Monster
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
     * Set type
     *
     * @param integer $type
     * @return Monster
     */
    public function setType($type)
    {
        $this->typeID = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->typeID;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return Monster
     */
    public function setModelID($model)
    {
        $this->modelID = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModelID()
    {
        return $this->modelID;
    }

    /**
     * Set fractionID
     *
     * @param integer $fractionID
     * @return Monster
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
     * @return Monster
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
     * Set hp
     *
     * @param float $hp
     * @return Monster
     */
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Get hp
     *
     * @return float 
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Set mp
     *
     * @param float $mp
     * @return Monster
     */
    public function setMp($mp)
    {
        $this->mp = $mp;

        return $this;
    }

    /**
     * Get mp
     *
     * @return float 
     */
    public function getMp()
    {
        return $this->mp;
    }

    /**
     * Set typeID
     *
     * @param integer $typeID
     * @return Monster
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
     * Set strength
     *
     * @param float $strength
     * @return Monster
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength
     *
     * @return float 
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set agility
     *
     * @param float $agility
     * @return Monster
     */
    public function setAgility($agility)
    {
        $this->agility = $agility;

        return $this;
    }

    /**
     * Get agility
     *
     * @return float 
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * Set intelligence
     *
     * @param float $intelligence
     * @return Monster
     */
    public function setIntelligence($intelligence)
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    /**
     * Get intelligence
     *
     * @return float 
     */
    public function getIntelligence()
    {
        return $this->intelligence;
    }

    /**
     * Set hpRegeneration
     *
     * @param float $hpRegeneration
     * @return Monster
     */
    public function setHpRegeneration($hpRegeneration)
    {
        $this->hpRegeneration = $hpRegeneration;

        return $this;
    }

    /**
     * Get hpRegeneration
     *
     * @return float 
     */
    public function getHpRegeneration()
    {
        return $this->hpRegeneration;
    }

    /**
     * Set mpRegeneration
     *
     * @param float $mpRegeneration
     * @return Monster
     */
    public function setMpRegeneration($mpRegeneration)
    {
        $this->mpRegeneration = $mpRegeneration;

        return $this;
    }

    /**
     * Get mpRegeneration
     *
     * @return float 
     */
    public function getMpRegeneration()
    {
        return $this->mpRegeneration;
    }

    /**
     * Set energyRegeneration
     *
     * @param float $energyRegeneration
     * @return Monster
     */
    public function setEnergyRegeneration($energyRegeneration)
    {
        $this->energyRegeneration = $energyRegeneration;

        return $this;
    }

    /**
     * Get energyRegeneration
     *
     * @return float 
     */
    public function getEnergyRegeneration()
    {
        return $this->energyRegeneration;
    }

    /**
     * Set locationID
     *
     * @param integer $locationID
     * @return Monster
     */
    public function setLocationID($locationID)
    {
        $this->locationID = $locationID;

        return $this;
    }

    /**
     * Get locationID
     *
     * @return integer 
     */
    public function getLocationID()
    {
        return $this->locationID;
    }

    /**
     * Set model
     *
     * @param \riki34\GameBundle\Entity\Model $model
     * @return Monster
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

    /**
     * Set location
     *
     * @param \riki34\GameBundle\Entity\Location $location
     * @return Monster
     */
    public function setLocation(\riki34\GameBundle\Entity\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \riki34\GameBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set fraction
     *
     * @param \riki34\GameBundle\Entity\Fraction $fraction
     * @return Monster
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
