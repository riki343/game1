<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use riki34\GameBundle\Interfaces\RESTEntity;

/**
 * Achievement
 *
 * @ORM\Table(name="achievements")
 * @ORM\Entity
 */
class Achievement implements RESTEntity
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

    public function getInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
        );
    }

    public function getSingleInArray() {
        return array(
            'id' => $this->id,
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
     * @return Achievement
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
}
