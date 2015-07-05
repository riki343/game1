<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use riki34\GameBundle\Interfaces\RESTEntity;

/**
 * Fraction
 *
 * @ORM\Table(name="fractions")
 * @ORM\Entity
 */
class Fraction implements RESTEntity
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
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255)
     */
    private $icon;

    /**
     * @var integer
     *
     * @ORM\Column(name="homeLocationID", type="integer")
     */
    private $homeLocationID;

    public function getInArray() {
        return array(
            'id' => $this->id,
            'homeLocationID' => $this->homeLocationID,
            'icon' => $this->icon,
            'name' => $this->name,
        );
    }

    public function getSingleInArray() {
        return array(
            'id' => $this->id,
            'homeLocationID' => $this->homeLocationID,
            'icon' => $this->icon,
            'name' => $this->name,
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
     * @return Fraction
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
     * Set icon
     *
     * @param string $icon
     * @return Fraction
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set homeLocationID
     *
     * @param integer $homeLocationID
     * @return Fraction
     */
    public function setHomeLocationID($homeLocationID)
    {
        $this->homeLocationID = $homeLocationID;

        return $this;
    }

    /**
     * Get homeLocationID
     *
     * @return integer 
     */
    public function getHomeLocationID()
    {
        return $this->homeLocationID;
    }
}
