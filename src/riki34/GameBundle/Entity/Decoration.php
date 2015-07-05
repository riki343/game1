<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use riki34\GameBundle\Interfaces\RESTEntity;

/**
 * Decoration
 *
 * @ORM\Table(name="decorations")
 * @ORM\Entity
 */
class Decoration implements RESTEntity
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
     * @var boolean
     *
     * @ORM\Column(name="destroyable", type="boolean")
     */
    private $destroyable;

    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer")
     */
    private $width;

    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer")
     */
    private $height;

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
     * @ORM\Column(name="location_id", type="integer", nullable=true, options={"default" = true})
     */
    private $locationID;

    /**
     * @var Location
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="NPC")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    private $location;

    public function getInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'destroyable' => $this->destroyable,
            'height' => $this->height,
            'width' => $this->width,
            'location' => $this->location->getInArray(),
            'locationID' => $this->locationID,
            'model' => $this->model->getInArray(),
            'modelID' => $this->modelID,
        );
    }

    public function getSingleInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'destroyable' => $this->destroyable,
            'height' => $this->height,
            'width' => $this->width,
            'locationID' => $this->locationID,
            'modelID' => $this->modelID,
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
     * @return Decoration
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
     * Set destroyable
     *
     * @param boolean $destroyable
     * @return Decoration
     */
    public function setDestroyable($destroyable)
    {
        $this->destroyable = $destroyable;

        return $this;
    }

    /**
     * Get destroyable
     *
     * @return boolean 
     */
    public function getDestroyable()
    {
        return $this->destroyable;
    }

    /**
     * Set width
     *
     * @param integer $width
     * @return Decoration
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     * @return Decoration
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set modelID
     *
     * @param integer $modelID
     * @return Decoration
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
     * Set locationID
     *
     * @param integer $locationID
     * @return Decoration
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
     * @return Decoration
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
     * @return Decoration
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
}
