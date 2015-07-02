<?php

namespace riki34\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * QuestCondition
 *
 * @ORM\Table(name="quest_conditions")
 * @ORM\Entity
 */
class QuestCondition
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     * @ORM\Column(name="quest_id", type="integer")
     */
    private $questID;

    /**
     * @var Quest
     * @ORM\ManyToOne(targetEntity="Quest")
     * @ORM\JoinColumn(name="quest_id", referencedColumnName="id")
     */
    private $quest;

    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=1000)
     */
    private $description;

    /**
     * @var integer
     * @ORM\Column(name="typeID", type="integer")
     */
    private $typeID;

    /**
     * @var integer
     * @ORM\Column(name="monsterID", type="integer", nullable=true, options={"default" = null})
     */
    private $monsterID;

    /**
     * @var Monster
     * @ORM\ManyToOne(targetEntity="Monster")
     * @ORM\JoinColumn(name="monsterID", referencedColumnName="id")
     */
    private $monster;

    /**
     * @var integer
     * @ORM\Column(name="monsterCount", type="integer", nullable=true, options={"default" = null})
     */
    private $monsterCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="lootID", type="integer", nullable=true, options={"default" = null})
     */
    private $lootID;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Item", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="quest_items",
     *     joinColumns={@ORM\JoinColumn(name="quest_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="item_id", referencedColumnName="id")}
     * )
     */
    private $loot;

    /**
     * @var integer
     * @ORM\Column(name="lootCount", type="integer", nullable=true, options={"default" = null})
     */
    private $lootCount;

    /**
     * @var integer
     * @ORM\Column(name="playerCount", type="integer", nullable=true, options={"default" = null})
     */
    private $playerCount;

    /**
     * @var integer
     * @ORM\Column(name="playerFractionID", type="integer", nullable=true, options={"default" = null})
     */
    private $playerFractionID;

    /**
     * @var Fraction
     * @ORM\ManyToOne(targetEntity="Fraction")
     * @ORM\JoinColumn(name="playerFractionID", referencedColumnName="id")
     */
    private $playerFraction;

    /**
     * @var integer
     * @ORM\Column(name="bossID", type="integer", nullable=true, options={"default" = null})
     */
    private $bossID;

    /// TODO: need to implement BOSS
    private $boss;


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
     * @return QuestCondition
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
     * Set description
     *
     * @param string $description
     * @return QuestCondition
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set typeID
     *
     * @param integer $typeID
     * @return QuestCondition
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
     * Set monsterID
     *
     * @param integer $monsterID
     * @return QuestCondition
     */
    public function setMonsterID($monsterID)
    {
        $this->monsterID = $monsterID;

        return $this;
    }

    /**
     * Get monsterID
     *
     * @return integer 
     */
    public function getMonsterID()
    {
        return $this->monsterID;
    }

    /**
     * Set monsterCount
     *
     * @param integer $monsterCount
     * @return QuestCondition
     */
    public function setMonsterCount($monsterCount)
    {
        $this->monsterCount = $monsterCount;

        return $this;
    }

    /**
     * Get monsterCount
     *
     * @return integer 
     */
    public function getMonsterCount()
    {
        return $this->monsterCount;
    }

    /**
     * Set lootID
     *
     * @param integer $lootID
     * @return QuestCondition
     */
    public function setLootID($lootID)
    {
        $this->lootID = $lootID;

        return $this;
    }

    /**
     * Get lootID
     *
     * @return integer 
     */
    public function getLootID()
    {
        return $this->lootID;
    }

    /**
     * Set lootCount
     *
     * @param integer $lootCount
     * @return QuestCondition
     */
    public function setLootCount($lootCount)
    {
        $this->lootCount = $lootCount;

        return $this;
    }

    /**
     * Get lootCount
     *
     * @return integer 
     */
    public function getLootCount()
    {
        return $this->lootCount;
    }

    /**
     * Set playerCount
     *
     * @param integer $playerCount
     * @return QuestCondition
     */
    public function setPlayerCount($playerCount)
    {
        $this->playerCount = $playerCount;

        return $this;
    }

    /**
     * Get playerCount
     *
     * @return integer 
     */
    public function getPlayerCount()
    {
        return $this->playerCount;
    }

    /**
     * Set playerFractionID
     *
     * @param integer $playerFractionID
     * @return QuestCondition
     */
    public function setPlayerFractionID($playerFractionID)
    {
        $this->playerFractionID = $playerFractionID;

        return $this;
    }

    /**
     * Get playerFractionID
     *
     * @return integer 
     */
    public function getPlayerFractionID()
    {
        return $this->playerFractionID;
    }

    /**
     * Set bossID
     *
     * @param integer $bossID
     * @return QuestCondition
     */
    public function setBossID($bossID)
    {
        $this->bossID = $bossID;

        return $this;
    }

    /**
     * Get bossID
     *
     * @return integer 
     */
    public function getBossID()
    {
        return $this->bossID;
    }

    /**
     * Set monster
     *
     * @param \riki34\GameBundle\Entity\Monster $monster
     * @return QuestCondition
     */
    public function setMonster(\riki34\GameBundle\Entity\Monster $monster = null)
    {
        $this->monster = $monster;

        return $this;
    }

    /**
     * Get monster
     *
     * @return \riki34\GameBundle\Entity\Monster 
     */
    public function getMonster()
    {
        return $this->monster;
    }

    /**
     * Set playerFraction
     *
     * @param \riki34\GameBundle\Entity\Fraction $playerFraction
     * @return QuestCondition
     */
    public function setPlayerFraction(\riki34\GameBundle\Entity\Fraction $playerFraction = null)
    {
        $this->playerFraction = $playerFraction;

        return $this;
    }

    /**
     * Get playerFraction
     *
     * @return \riki34\GameBundle\Entity\Fraction 
     */
    public function getPlayerFraction()
    {
        return $this->playerFraction;
    }

    /**
     * Set questID
     *
     * @param integer $questID
     * @return QuestCondition
     */
    public function setQuestID($questID)
    {
        $this->questID = $questID;

        return $this;
    }

    /**
     * Get questID
     *
     * @return integer 
     */
    public function getQuestID()
    {
        return $this->questID;
    }

    /**
     * Set quest
     *
     * @param \riki34\GameBundle\Entity\Quest $quest
     * @return QuestCondition
     */
    public function setQuest(\riki34\GameBundle\Entity\Quest $quest = null)
    {
        $this->quest = $quest;

        return $this;
    }

    /**
     * Get quest
     *
     * @return \riki34\GameBundle\Entity\Quest 
     */
    public function getQuest()
    {
        return $this->quest;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->loot = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add loot
     *
     * @param \riki34\GameBundle\Entity\Item $loot
     * @return QuestCondition
     */
    public function addLoot(\riki34\GameBundle\Entity\Item $loot)
    {
        $this->loot[] = $loot;

        return $this;
    }

    /**
     * Remove loot
     *
     * @param \riki34\GameBundle\Entity\Item $loot
     */
    public function removeLoot(\riki34\GameBundle\Entity\Item $loot)
    {
        $this->loot->removeElement($loot);
    }

    /**
     * Get loot
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLoot()
    {
        return $this->loot;
    }
}
