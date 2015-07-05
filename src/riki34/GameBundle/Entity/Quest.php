<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use riki34\GameBundle\Interfaces\RESTEntity;

/**
 * Quest
 *
 * @ORM\Table(name="quests")
 * @ORM\Entity
 */
class Quest implements RESTEntity
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var integer
     * @ORM\Column(name="levelRequired", type="integer")
     */
    private $levelRequired;

    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=5000)
     */
    private $description;

    /**
     * @var integer
     * @ORM\Column(name="parentQuestID", type="integer", nullable=true, options={"default" = null})
     */
    private $parentQuestID;

    /**
     * @var integer
     * @ORM\Column(name="take_location_id", type="integer", nullable=true, options={"default" = null})
     */
    private $takeLocationID;

    /**
     * @var Location
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="takeQuests", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="take_location_id", referencedColumnName="id")
     */
    private $takeLocation;

    /**
     * @var integer
     * @ORM\Column(name="complete_location_id", type="integer", nullable=true, options={"default" = null})
     */
    private $completeLocationID;

    /**
     * @var Location
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="completeQuests", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="complete_location_id", referencedColumnName="id")
     */
    private $completeLocation;

    /**
     * @var integer
     * @ORM\Column(name="take_npc_id", type="integer", nullable=true, options={"default" = null})
     */
    private $takeNPCID;

    /**
     * @var NPC
     * @ORM\ManyToOne(targetEntity="NPC", inversedBy="takeQuests", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="take_npc_id", referencedColumnName="id")
     */
    private $takeNPC;

    /**
     * @var integer
     * @ORM\Column(name="complete_npc_id", type="integer", nullable=true, options={"default" = null})
     */
    private $completeNPCID;

    /**
     * @var NPC
     * @ORM\ManyToOne(targetEntity="NPC", inversedBy="completeQuests", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="complete_npc_id", referencedColumnName="id")
     */
    private $completeNPC;

    public function getInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'completeLocation' => $this->completeLocation->getInArray(),
            'completeLocationID' => $this->completeLocationID,
            'completeNPC' => $this->completeNPC->getInArray(),
            'completeNPCID' => $this->completeNPCID,
            'description' => $this->description,
            'levelRequired' => $this->levelRequired,
            'parentQuestID' => $this->parentQuestID,
            'takeLocation' => $this->takeLocation->getInArray(),
            'takeLocationID' => $this->takeLocationID,
            'takeNPC' => $this->takeNPC->getInArray(),
            'takeNPCID' => $this->takeNPCID,
        );
    }

    public function getSingleInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'completeLocationID' => $this->completeLocationID,
            'completeNPCID' => $this->completeNPCID,
            'description' => $this->description,
            'levelRequired' => $this->levelRequired,
            'parentQuestID' => $this->parentQuestID,
            'takeLocationID' => $this->takeLocationID,
            'takeNPCID' => $this->takeNPCID,
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
     * @return Quest
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
     * Set levelRequired
     *
     * @param integer $levelRequired
     * @return Quest
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
     * Set description
     *
     * @param string $description
     * @return Quest
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
     * Set parentQuestID
     *
     * @param integer $parentQuestID
     * @return Quest
     */
    public function setParentQuestID($parentQuestID)
    {
        $this->parentQuestID = $parentQuestID;

        return $this;
    }

    /**
     * Get parentQuestID
     *
     * @return integer 
     */
    public function getParentQuestID()
    {
        return $this->parentQuestID;
    }

    /**
     * Set takeLocationID
     *
     * @param integer $takeLocationID
     * @return Quest
     */
    public function setTakeLocationID($takeLocationID)
    {
        $this->takeLocationID = $takeLocationID;

        return $this;
    }

    /**
     * Get takeLocationID
     *
     * @return integer 
     */
    public function getTakeLocationID()
    {
        return $this->takeLocationID;
    }

    /**
     * Set completeLocationID
     *
     * @param integer $completeLocationID
     * @return Quest
     */
    public function setCompleteLocationID($completeLocationID)
    {
        $this->completeLocationID = $completeLocationID;

        return $this;
    }

    /**
     * Get completeLocationID
     *
     * @return integer 
     */
    public function getCompleteLocationID()
    {
        return $this->completeLocationID;
    }

    /**
     * Set takeLocation
     *
     * @param \riki34\GameBundle\Entity\Location $takeLocation
     * @return Quest
     */
    public function setTakeLocation(\riki34\GameBundle\Entity\Location $takeLocation = null)
    {
        $this->takeLocation = $takeLocation;

        return $this;
    }

    /**
     * Get takeLocation
     *
     * @return \riki34\GameBundle\Entity\Location 
     */
    public function getTakeLocation()
    {
        return $this->takeLocation;
    }

    /**
     * Set completeLocation
     *
     * @param \riki34\GameBundle\Entity\Location $completeLocation
     * @return Quest
     */
    public function setCompleteLocation(\riki34\GameBundle\Entity\Location $completeLocation = null)
    {
        $this->completeLocation = $completeLocation;

        return $this;
    }

    /**
     * Get completeLocation
     *
     * @return \riki34\GameBundle\Entity\Location 
     */
    public function getCompleteLocation()
    {
        return $this->completeLocation;
    }

    /**
     * Set takeNPCID
     *
     * @param integer $takeNPCID
     * @return Quest
     */
    public function setTakeNPCID($takeNPCID)
    {
        $this->takeNPCID = $takeNPCID;

        return $this;
    }

    /**
     * Get takeNPCID
     *
     * @return integer 
     */
    public function getTakeNPCID()
    {
        return $this->takeNPCID;
    }

    /**
     * Set completeNPCID
     *
     * @param integer $completeNPCID
     * @return Quest
     */
    public function setCompleteNPCID($completeNPCID)
    {
        $this->completeNPCID = $completeNPCID;

        return $this;
    }

    /**
     * Get completeNPCID
     *
     * @return integer 
     */
    public function getCompleteNPCID()
    {
        return $this->completeNPCID;
    }

    /**
     * Set takeNPC
     *
     * @param \riki34\GameBundle\Entity\NPC $takeNPC
     * @return Quest
     */
    public function setTakeNPC(\riki34\GameBundle\Entity\NPC $takeNPC = null)
    {
        $this->takeNPC = $takeNPC;

        return $this;
    }

    /**
     * Get takeNPC
     *
     * @return \riki34\GameBundle\Entity\NPC 
     */
    public function getTakeNPC()
    {
        return $this->takeNPC;
    }

    /**
     * Set completeNPC
     *
     * @param \riki34\GameBundle\Entity\NPC $completeNPC
     * @return Quest
     */
    public function setCompleteNPC(\riki34\GameBundle\Entity\NPC $completeNPC = null)
    {
        $this->completeNPC = $completeNPC;

        return $this;
    }

    /**
     * Get completeNPC
     *
     * @return \riki34\GameBundle\Entity\NPC 
     */
    public function getCompleteNPC()
    {
        return $this->completeNPC;
    }
}
