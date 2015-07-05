<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use riki34\GameBundle\Interfaces\RESTEntity;

/**
 * Model
 *
 * @ORM\Table(name="models")
 * @ORM\Entity
 */
class Model implements RESTEntity
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
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    public function getInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
        );
    }

    public function getSingleInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
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
     * @return Model
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
     * Set image
     *
     * @param string $image
     * @return Model
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
}
