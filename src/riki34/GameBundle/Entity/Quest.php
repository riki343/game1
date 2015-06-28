<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quest
 *
 * @ORM\Table(name="quests")
 * @ORM\Entity
 */
class Quest
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
     * @ORM\Column(name="levelRequired", type="integer")
     */
    private $levelRequired;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=5000)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="parentQuestID", type="integer")
     */
    private $parentQuestID;


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
}
