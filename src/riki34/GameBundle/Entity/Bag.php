<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlayerBag
 *
 * @ORM\Table(name="bags")
 * @ORM\Entity
 */
class Bag
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
     * @var integer
     *
     * @ORM\Column(name="playerID", type="integer")
     */
    private $playerID;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;


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
     * Set playerID
     *
     * @param integer $playerID
     * @return PlayerBag
     */
    public function setPlayerID($playerID)
    {
        $this->playerID = $playerID;

        return $this;
    }

    /**
     * Get playerID
     *
     * @return integer 
     */
    public function getPlayerID()
    {
        return $this->playerID;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     * @return PlayerBag
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }
}
