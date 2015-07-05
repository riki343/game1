<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use riki34\GameBundle\Interfaces\RESTEntity;

/**
 * Skill
 *
 * @ORM\Table(name="skills")
 * @ORM\Entity
 */
class Skill implements RESTEntity
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
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="attackRange", type="float")
     */
    private $attackRange;

    /**
     * @var float
     *
     * @ORM\Column(name="cooldown", type="float")
     */
    private $cooldown;

    /**
     * @var float
     *
     * @ORM\Column(name="mpRequired", type="float")
     */
    private $mpRequired;

    /**
     * @var float
     *
     * @ORM\Column(name="energyRequired", type="float")
     */
    private $energyRequired;

    /**
     * @var integer
     *
     * @ORM\Column(name="levelRequired", type="integer")
     */
    private $levelRequired;

    /**
     * @var float
     *
     * @ORM\Column(name="basicDamage", type="float")
     */
    private $basicDamage;

    /**
     * @var float
     *
     * @ORM\Column(name="basicHeal", type="float")
     */
    private $basicHeal;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255)
     */
    private $icon;

    public function getInArray() {
        return array(
            'id' => $this->id,
            'attackRange' => $this->attackRange,
            'basicDamage' => $this->basicDamage,
            'basicHeal' => $this->basicHeal,
            'cooldown' => $this->cooldown,
            'energyRequired' => $this->energyRequired,
            'icon' => $this->icon,
            'levelRequired' => $this->levelRequired,
            'mpRequired' => $this->mpRequired,
            'name' => $this->name,
            'type' => $this->type,
        );
    }

    public function getSingleInArray() {
        return array(
            'id' => $this->id,
            'attackRange' => $this->attackRange,
            'basicDamage' => $this->basicDamage,
            'basicHeal' => $this->basicHeal,
            'cooldown' => $this->cooldown,
            'energyRequired' => $this->energyRequired,
            'icon' => $this->icon,
            'levelRequired' => $this->levelRequired,
            'mpRequired' => $this->mpRequired,
            'name' => $this->name,
            'type' => $this->type,
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
     * @return Skill
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
     * @return Skill
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set attackRange
     *
     * @param float $attackRange
     * @return Skill
     */
    public function setAttackRange($attackRange)
    {
        $this->attackRange = $attackRange;

        return $this;
    }

    /**
     * Get attackRange
     *
     * @return float 
     */
    public function getAttackRange()
    {
        return $this->attackRange;
    }

    /**
     * Set cooldown
     *
     * @param float $cooldown
     * @return Skill
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
     * Set mpRequired
     *
     * @param float $mpRequired
     * @return Skill
     */
    public function setMpRequired($mpRequired)
    {
        $this->mpRequired = $mpRequired;

        return $this;
    }

    /**
     * Get mpRequired
     *
     * @return float 
     */
    public function getMpRequired()
    {
        return $this->mpRequired;
    }

    /**
     * Set energyRequired
     *
     * @param float $energyRequired
     * @return Skill
     */
    public function setEnergyRequired($energyRequired)
    {
        $this->energyRequired = $energyRequired;

        return $this;
    }

    /**
     * Get energyRequired
     *
     * @return float 
     */
    public function getEnergyRequired()
    {
        return $this->energyRequired;
    }

    /**
     * Set levelRequired
     *
     * @param integer $levelRequired
     * @return Skill
     */
    public function setLevelRequired($levelRequired)
    {
        $this->levelRequired = $levelRequired;

        return $this;
    }

    /**
     * Get levelRequired
     *
     * @return integer 
     */
    public function getLevelRequired()
    {
        return $this->levelRequired;
    }

    /**
     * Set basicDamage
     *
     * @param float $basicDamage
     * @return Skill
     */
    public function setBasicDamage($basicDamage)
    {
        $this->basicDamage = $basicDamage;

        return $this;
    }

    /**
     * Get basicDamage
     *
     * @return float 
     */
    public function getBasicDamage()
    {
        return $this->basicDamage;
    }

    /**
     * Set basicHeal
     *
     * @param float $basicHeal
     * @return Skill
     */
    public function setBasicHeal($basicHeal)
    {
        $this->basicHeal = $basicHeal;

        return $this;
    }

    /**
     * Get basicHeal
     *
     * @return float 
     */
    public function getBasicHeal()
    {
        return $this->basicHeal;
    }

    /**
     * Set icon
     *
     * @param string $icon
     * @return Skill
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
}
