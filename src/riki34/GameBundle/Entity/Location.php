<?php

namespace riki34\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use riki34\GameBundle\Extra\JSONTransformer;
use riki34\GameBundle\Interfaces\RESTEntity;

/**
 * Location
 *
 * @ORM\Table(name="locations")
 * @ORM\Entity
 */
class Location implements RESTEntity
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
     * @ORM\Column(name="height", type="integer")
     */
    private $height;

    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer")
     */
    private $width;

    /**
     * @var integer
     *
     * @ORM\Column(name="levelRequired", type="integer")
     */
    private $levelRequired;

    /**
     * @var string
     * @ORM\Column(name="file", type="string", length=255)
     */
    private $file;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Decoration", mappedBy="location")
     */
    private $decorations;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Monster", mappedBy="location")
     */
    private $monsters;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="NPC", mappedBy="location")
     */
    private $NPC;

    /**
     * @var array
     */
    private $resources;

    /**
     * @var array
     */
    private $res;

    public function getInArray() {
        $resources = array();
        $resources['NPC'] = JSONTransformer::arrayToJsonArray($this->resources['NPC']);
        $resources['monsters'] = JSONTransformer::arrayToJsonArray($this->resources['monsters']);
        $resources['decorations'] = JSONTransformer::arrayToJsonArray($this->resources['decorations']);

        return array(
            'id' => $this->id,
            'name' => $this->name,
            'file' => $this->file,
            'height' => $this->height,
            'width' => $this->width,
            'levelRequired' => $this->levelRequired,
            'resources' => $resources,
            'res' => $this->res,
        );
    }

    public function getSingleInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'file' => $this->file,
            'height' => $this->height,
            'width' => $this->width,
            'levelRequired' => $this->levelRequired,
        );
    }

    /**
     * @return array
     */
    public function getResources() {
        return $this->resources;
    }

    /**
     * @param array $resources
     */
    public function setResources(array $resources) {
        $this->resources = $resources;
    }

    /**
     * @return array
     */
    public function getRes() {
        return $this->res;
    }

    /**
     * @param array $resources
     */
    public function setRes(array $resources) {
        $this->res = $resources;
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
     * @return Location
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
     * Set height
     *
     * @param integer $height
     * @return Location
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set width
     *
     * @param integer $width
     * @return Location
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set levelRequired
     *
     * @param integer $levelRequired
     * @return Location
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
     * Set file
     *
     * @param string $file
     * @return Location
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->decorations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->monsters = new \Doctrine\Common\Collections\ArrayCollection();
        $this->NPC = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add decorations
     *
     * @param \riki34\GameBundle\Entity\Decoration $decorations
     * @return Location
     */
    public function addDecoration(\riki34\GameBundle\Entity\Decoration $decorations)
    {
        $this->decorations[] = $decorations;

        return $this;
    }

    /**
     * Remove decorations
     *
     * @param \riki34\GameBundle\Entity\Decoration $decorations
     */
    public function removeDecoration(\riki34\GameBundle\Entity\Decoration $decorations)
    {
        $this->decorations->removeElement($decorations);
    }

    /**
     * Get decorations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDecorations()
    {
        return $this->decorations;
    }

    /**
     * Add monsters
     *
     * @param \riki34\GameBundle\Entity\Monster $monsters
     * @return Location
     */
    public function addMonster(\riki34\GameBundle\Entity\Monster $monsters)
    {
        $this->monsters[] = $monsters;

        return $this;
    }

    /**
     * Remove monsters
     *
     * @param \riki34\GameBundle\Entity\Monster $monsters
     */
    public function removeMonster(\riki34\GameBundle\Entity\Monster $monsters)
    {
        $this->monsters->removeElement($monsters);
    }

    /**
     * Get monsters
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMonsters()
    {
        return $this->monsters;
    }

    /**
     * Add NPC
     *
     * @param \riki34\GameBundle\Entity\NPC $nPC
     * @return Location
     */
    public function addNPC(\riki34\GameBundle\Entity\NPC $nPC)
    {
        $this->NPC[] = $nPC;

        return $this;
    }

    /**
     * Remove NPC
     *
     * @param \riki34\GameBundle\Entity\NPC $nPC
     */
    public function removeNPC(\riki34\GameBundle\Entity\NPC $nPC)
    {
        $this->NPC->removeElement($nPC);
    }

    /**
     * Get NPC
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNPC()
    {
        return $this->NPC;
    }
}
