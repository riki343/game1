<?php

namespace riki34\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PlayerChar
 *
 * @ORM\Table(name="player_chars")
 * @ORM\Entity
 */
class PlayerChar
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
     * @ORM\Column(name="sex", type="boolean")
     */
    private $sex;

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
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="monsters")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    private $location;

    /**
     * @var integer
     *
     * @ORM\Column(name="fraction_id", type="integer")
     */
    private $fractionID;

    /**
     * @var integer
     *
     * @ORM\Column(name="specialization_id", type="integer")
     */
    private $specializationID;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var float
     *
     * @ORM\Column(name="experience", type="float")
     */
    private $experience;

    /**
     * @var float
     *
     * @ORM\Column(name="hp", type="float")
     */
    private $hp;

    /**
     * @var float
     *
     * @ORM\Column(name="mp", type="float")
     */
    private $mp;

    /**
     * @var float
     *
     * @ORM\Column(name="energy", type="float")
     */
    private $energy;

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
     * @var \DateTime
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var integer
     * @ORM\Column(name="guild_id", type="integer", nullable=true, options={"default=null"})
     */
    private $guildID;

    /**
     * @var Guild
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumn(name="guild_id", referencedColumnName="id")
     */
    private $guild;

    /**
     * @var integer
     * @ORM\Column(name="bag_id", type="integer")
     */
    private $bagID;

    /**
     * @var Bag
     * @ORM\OneToOne(targetEntity="Bag", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="bag_id", referencedColumnName="id")
     */
    private $bag;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Skill", mappedBy="users")
     */
    private $skills;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Quest", mappedBy="users")
     */
    private $quests;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Achievement", mappedBy="users")
     */
    private $achievements;

    /**
     * @param Fraction $fraction
     * @param Specialization $specialization
     */
    public function __construct(Fraction $fraction, Specialization $specialization) {
        $this->created = new \DateTime();
        $this->bag = new Bag();
        $this->skills = new ArrayCollection();
        $this->quests = new ArrayCollection();
        $this->achievements = new ArrayCollection();
        $this->fraction = $fraction;
        $this->specialization = $specialization;
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
     * @return PlayerChar
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
     * Set sex
     *
     * @param boolean $sex
     * @return PlayerChar
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return boolean 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return PlayerChar
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
    public function getModel()
    {
        return $this->modelID;
    }

    /**
     * Set fraction
     *
     * @param integer $fraction
     * @return PlayerChar
     */
    public function setFractionID($fraction)
    {
        $this->fractionID = $fraction;

        return $this;
    }

    /**
     * Get fraction
     *
     * @return integer 
     */
    public function getFraction()
    {
        return $this->fractionID;
    }

    /**
     * Set specialization
     *
     * @param integer $specialization
     * @return PlayerChar
     */
    public function setSpecializationID($specialization)
    {
        $this->specializationID = $specialization;

        return $this;
    }

    /**
     * Get specialization
     *
     * @return integer 
     */
    public function getSpecialization()
    {
        return $this->specializationID;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return PlayerChar
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
     * Set expirience
     *
     * @param float $experience
     * @return PlayerChar
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get expirience
     *
     * @return float 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set hp
     *
     * @param float $hp
     * @return PlayerChar
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
     * @return PlayerChar
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
     * Get modelID
     *
     * @return integer 
     */
    public function getModelID()
    {
        return $this->modelID;
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
     * Get specializationID
     *
     * @return integer 
     */
    public function getSpecializationID()
    {
        return $this->specializationID;
    }

    /**
     * Set energy
     *
     * @param float $energy
     * @return PlayerChar
     */
    public function setEnergy($energy)
    {
        $this->energy = $energy;

        return $this;
    }

    /**
     * Get energy
     *
     * @return float 
     */
    public function getEnergy()
    {
        return $this->energy;
    }

    /**
     * Set strength
     *
     * @param float $strength
     * @return PlayerChar
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
     * @return PlayerChar
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
     * @return PlayerChar
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
     * @return PlayerChar
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
     * @return PlayerChar
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
     * @return PlayerChar
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
     * Set created
     *
     * @param \DateTime $created
     * @return PlayerChar
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set guildID
     *
     * @param integer $guildID
     * @return PlayerChar
     */
    public function setGuildID($guildID)
    {
        $this->guildID = $guildID;

        return $this;
    }

    /**
     * Get guildID
     *
     * @return integer 
     */
    public function getGuildID()
    {
        return $this->guildID;
    }

    /**
     * Set bagID
     *
     * @param integer $bagID
     * @return PlayerChar
     */
    public function setBagID($bagID)
    {
        $this->bagID = $bagID;

        return $this;
    }

    /**
     * Get bagID
     *
     * @return integer 
     */
    public function getBagID()
    {
        return $this->bagID;
    }

    /**
     * Set guild
     *
     * @param \riki34\GameBundle\Entity\Guild $guild
     * @return PlayerChar
     */
    public function setGuild(\riki34\GameBundle\Entity\Guild $guild = null)
    {
        $this->guild = $guild;

        return $this;
    }

    /**
     * Get guild
     *
     * @return \riki34\GameBundle\Entity\Guild 
     */
    public function getGuild()
    {
        return $this->guild;
    }

    /**
     * Set bag
     *
     * @param \riki34\GameBundle\Entity\Bag $bag
     * @return PlayerChar
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

    /**
     * Add skills
     *
     * @param \riki34\GameBundle\Entity\Skill $skills
     * @return PlayerChar
     */
    public function addSkill(\riki34\GameBundle\Entity\Skill $skills)
    {
        $this->skills[] = $skills;

        return $this;
    }

    /**
     * Remove skills
     *
     * @param \riki34\GameBundle\Entity\Skill $skills
     */
    public function removeSkill(\riki34\GameBundle\Entity\Skill $skills)
    {
        $this->skills->removeElement($skills);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Add quests
     *
     * @param \riki34\GameBundle\Entity\Quest $quests
     * @return PlayerChar
     */
    public function addQuest(\riki34\GameBundle\Entity\Quest $quests)
    {
        $this->quests[] = $quests;

        return $this;
    }

    /**
     * Remove quests
     *
     * @param \riki34\GameBundle\Entity\Quest $quests
     */
    public function removeQuest(\riki34\GameBundle\Entity\Quest $quests)
    {
        $this->quests->removeElement($quests);
    }

    /**
     * Get quests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuests()
    {
        return $this->quests;
    }

    /**
     * Add achievements
     *
     * @param \riki34\GameBundle\Entity\Achievement $achievements
     * @return PlayerChar
     */
    public function addAchievement(\riki34\GameBundle\Entity\Achievement $achievements)
    {
        $this->achievements[] = $achievements;

        return $this;
    }

    /**
     * Remove achievements
     *
     * @param \riki34\GameBundle\Entity\Achievement $achievements
     */
    public function removeAchievement(\riki34\GameBundle\Entity\Achievement $achievements)
    {
        $this->achievements->removeElement($achievements);
    }

    /**
     * Get achievements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAchievements()
    {
        return $this->achievements;
    }

    /**
     * Set locationID
     *
     * @param integer $locationID
     * @return PlayerChar
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
     * @return PlayerChar
     */
    public function setModel(\riki34\GameBundle\Entity\Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Set location
     *
     * @param \riki34\GameBundle\Entity\Location $location
     * @return PlayerChar
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
