<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use riki34\GameBundle\Interfaces\RESTEntity;

/**
 * NPC
 *
 * @ORM\Table(name="NPC")
 * @ORM\Entity
 */
class NPC implements RESTEntity
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
     * @var integer
     *
     * @ORM\Column(name="typeID", type="integer")
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
     * @ORM\Column(name="bagID", type="integer")
     */
    private $bagID;

    /**
     * @var Bag
     * @ORM\OneToOne(targetEntity="Bag")
     * @ORM\JoinColumn(name="bagID", referencedColumnName="id")
     */
    private $bag;

    /**
     * @var boolean
     *
     * @ORM\Column(name="immortal", type="boolean")
     */
    private $immortal;

    /**
     * @var integer
     * @ORM\Column(name="location_id", type="integer", nullable=true, options={"default" = true})
     */
    private $locationID;

    /**
     * @var Location
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="NPC")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    private $location;

    /**
     * @var array
     * @ORM\Column(name="location_point", type="array")
     */
    private $locationPoint;

    public function getInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'modelID' => $this->modelID,
            'model' => $this->model->getInArray(),
            'locationID' => $this->locationID,
            'location' => $this->location,
            'bagID' => $this->bagID,
            'bag' => $this->bag->getInArray(),
            'immortal' => $this->immortal,
            'locationPoint' => $this->locationPoint,
            'typeID' => $this->typeID,
        );
    }

    public function getSingleInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'modelID' => $this->modelID,
            'locationID' => $this->locationID,
            'bagID' => $this->bagID,
            'immortal' => $this->immortal,
            'locationPoint' => $this->locationPoint,
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
     * @return NPC
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
     * @return NPC
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
     * Set typeID
     *
     * @param integer $typeID
     * @return NPC
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
     * Set bagID;
     *
     * @param integer $bagID;
     * @return NPC
     */
    public function setBagID($bagID)
    {
        $this->bagID = $bagID;

        return $this;
    }

    /**
     * Get bagID;
     *
     * @return integer 
     */
    public function getBagID()
    {
        return $this->bagID;
    }

    /**
     * Set immortal
     *
     * @param boolean $immortal
     * @return NPC
     */
    public function setImmortal($immortal)
    {
        $this->immortal = $immortal;

        return $this;
    }

    /**
     * Get immortal
     *
     * @return boolean 
     */
    public function getImmortal()
    {
        return $this->immortal;
    }

    /**
     * Set locationID
     *
     * @param integer $locationID
     * @return NPC
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
     * Set locationPoint
     *
     * @param array $locationPoint
     * @return NPC
     */
    public function setLocationPoint($locationPoint)
    {
        $this->locationPoint = $locationPoint;

        return $this;
    }

    /**
     * Get locationPoint
     *
     * @return array 
     */
    public function getLocationPoint()
    {
        return $this->locationPoint;
    }

    /**
     * Set modelID
     *
     * @param integer $modelID
     * @return NPC
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
     * Set model
     *
     * @param \riki34\GameBundle\Entity\Model $model
     * @return NPC
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
     * @return NPC
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
     * Set bag
     *
     * @param \riki34\GameBundle\Entity\Bag $bag
     * @return NPC
     */
    public function setBag(\riki34\GameBundle\Entity\Bag $bag = null)
    {
        $this->bag = $bag;

        return $this;
    }

    /**
     * Get bag
     *
     * @return \riki34\GameBundle\Entity\Bag 
     */
    public function getBag()
    {
        return $this->bag;
    }
}
