<?php

namespace riki34\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use riki34\GameBundle\Extra\JSONTransformer;
use riki34\GameBundle\Interfaces\RESTEntity;

/**
 * PlayerBag
 *
 * @ORM\Table(name="bags")
 * @ORM\Entity
 */
class Bag implements RESTEntity
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
     * @ORM\Column(name="char_id", type="integer")
     */
    private $charID;

    /**
     * @var PlayerChar
     * @ORM\ManyToOne(targetEntity="PlayerChar", inversedBy="bag")
     * @ORM\JoinColumn(name="char_id", referencedColumnName="id")
     */
    private $char;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Item", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="bag_items",
     *     joinColumns={@ORM\JoinColumn(name="bag_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="item_id", referencedColumnName="id")}
     * )
     */
    private $items;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Armor", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="bag_armor",
     *     joinColumns={@ORM\JoinColumn(name="bag_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="armor_id", referencedColumnName="id")}
     * )
     */
    private $armors;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Weapon", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="bag_weapon",
     *     joinColumns={@ORM\JoinColumn(name="bag_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="weapon_id", referencedColumnName="id")}
     * )
     */
    private $weapons;

    public function getInArray() {
        return array(
            'id' => $this->id,
            'armors' => JSONTransformer::arrayToJsonArray($this->armors),
            'capacity' => $this->capacity,
            'charID' => $this->charID,
            'items' => JSONTransformer::arrayToJsonArray($this->items),
            'weapons' => JSONTransformer::arrayToJsonArray($this->weapons),
        );
    }

    public function getSingleInArray() {
        return array(
            'id' => $this->id,
            'armors' => $this->armors->count(),
            'capacity' => $this->capacity,
            'charID' => $this->charID,
            'items' => $this->items->count(),
            'weapons' => $this->weapons->count(),
        );
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
        $this->armors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->weapons = new \Doctrine\Common\Collections\ArrayCollection();
        $this->capacity = 50;
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
     * Set charID
     *
     * @param integer $charID
     * @return Bag
     */
    public function setCharID($charID)
    {
        $this->charID = $charID;

        return $this;
    }

    /**
     * Get charID
     *
     * @return integer 
     */
    public function getCharID()
    {
        return $this->charID;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     * @return Bag
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

    /**
     * Set char
     *
     * @param \riki34\GameBundle\Entity\PlayerChar $char
     * @return Bag
     */
    public function setChar(\riki34\GameBundle\Entity\PlayerChar $char = null)
    {
        $this->char = $char;

        return $this;
    }

    /**
     * Get char
     *
     * @return \riki34\GameBundle\Entity\PlayerChar 
     */
    public function getChar()
    {
        return $this->char;
    }

    /**
     * Add items
     *
     * @param \riki34\GameBundle\Entity\Item $items
     * @return Bag
     */
    public function addItem(\riki34\GameBundle\Entity\Item $items)
    {
        $this->items[] = $items;

        return $this;
    }

    /**
     * Remove items
     *
     * @param \riki34\GameBundle\Entity\Item $items
     */
    public function removeItem(\riki34\GameBundle\Entity\Item $items)
    {
        $this->items->removeElement($items);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Add armors
     *
     * @param \riki34\GameBundle\Entity\Armor $armors
     * @return Bag
     */
    public function addArmor(\riki34\GameBundle\Entity\Armor $armors)
    {
        $this->armors[] = $armors;

        return $this;
    }

    /**
     * Remove armors
     *
     * @param \riki34\GameBundle\Entity\Armor $armors
     */
    public function removeArmor(\riki34\GameBundle\Entity\Armor $armors)
    {
        $this->armors->removeElement($armors);
    }

    /**
     * Get armors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArmors()
    {
        return $this->armors;
    }

    /**
     * Add weapons
     *
     * @param \riki34\GameBundle\Entity\Weapon $weapons
     * @return Bag
     */
    public function addWeapon(\riki34\GameBundle\Entity\Weapon $weapons)
    {
        $this->weapons[] = $weapons;

        return $this;
    }

    /**
     * Remove weapons
     *
     * @param \riki34\GameBundle\Entity\Weapon $weapons
     */
    public function removeWeapon(\riki34\GameBundle\Entity\Weapon $weapons)
    {
        $this->weapons->removeElement($weapons);
    }

    /**
     * Get weapons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWeapons()
    {
        return $this->weapons;
    }
}
