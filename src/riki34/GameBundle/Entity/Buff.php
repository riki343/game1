<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Buff
 *
 * @ORM\Table(name="buffs")
 * @ORM\Entity
 */
class Buff
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
     * @ORM\Column(name="effect", type="boolean")
     */
    private $effect;

    /**
     * @var float
     *
     * @ORM\Column(name="strength", type="float")
     */
    private $strength;

    /**
     * @var float
     *
     * @ORM\Column(name="agility", type="float")
     */
    private $agility;

    /**
     * @var float
     *
     * @ORM\Column(name="intelligence", type="float")
     */
    private $intelligence;

    /**
     * @var float
     *
     * @ORM\Column(name="physicDefenceBonus", type="float")
     */
    private $physicDefenceBonus;

    /**
     * @var float
     *
     * @ORM\Column(name="magicDefenceBonus", type="float")
     */
    private $magicDefenceBonus;

    /**
     * @var float
     *
     * @ORM\Column(name="physicAttackBonus", type="float")
     */
    private $physicAttackBonus;

    /**
     * @var float
     *
     * @ORM\Column(name="magicAttackBonus", type="float")
     */
    private $magicAttackBonus;

    /**
     * @var float
     *
     * @ORM\Column(name="cooldown", type="float")
     */
    private $cooldown;

    /**
     * @var float
     *
     * @ORM\Column(name="duration", type="float")
     */
    private $duration;


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
     * @return Buff
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
     * Set effect
     *
     * @param boolean $effect
     * @return Buff
     */
    public function setEffect($effect)
    {
        $this->effect = $effect;

        return $this;
    }

    /**
     * Get effect
     *
     * @return boolean 
     */
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * Set strength
     *
     * @param integer $strength
     * @return Buff
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength
     *
     * @return integer 
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set agility
     *
     * @param float $agility
     * @return Buff
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
     * @return Buff
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
     * Set physicDefenceBonus
     *
     * @param float $physicDefenceBonus
     * @return Buff
     */
    public function setPhysicDefenceBonus($physicDefenceBonus)
    {
        $this->physicDefenceBonus = $physicDefenceBonus;

        return $this;
    }

    /**
     * Get physicDefenceBonus
     *
     * @return float 
     */
    public function getPhysicDefenceBonus()
    {
        return $this->physicDefenceBonus;
    }

    /**
     * Set magicDefenceBonus
     *
     * @param float $magicDefenceBonus
     * @return Buff
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
     * Set physicAttackBonus
     *
     * @param float $physicAttackBonus
     * @return Buff
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
     * Set magicAttackBonus
     *
     * @param float $magicAttackBonus
     * @return Buff
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
     * Set cooldown
     *
     * @param float $cooldown
     * @return Buff
     */
    public function setCooldown($cooldown)
    {
        $this->cooldown = $cooldown;

        return $this;
    }

    /**
     * Get cooldown
     *
     * @return float 
     */
    public function getCooldown()
    {
        return $this->cooldown;
    }

    /**
     * Set duration
     *
     * @param float $duration
     * @return Buff
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return float 
     */
    public function getDuration()
    {
        return $this->duration;
    }
}
