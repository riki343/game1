<?php

namespace riki34\GameBundle\Entity;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;
use riki34\GameBundle\Extra\JSONTransformer;
use riki34\GameBundle\Interfaces\RESTEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="riki34\GameBundle\Entity\UserRepository")
 */
class User implements UserInterface, RESTEntity, \Serializable
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
     * @Assert\NotBlank(groups={"registration"})
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     * @Assert\NotBlank(groups={"settings", "registration"})
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     * @Assert\NotBlank(groups={"settings", "registration"})
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     * @Assert\NotBlank(groups={"settings"})
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     * @Assert\NotBlank(groups={"settings"})
     * @ORM\Column(name="surname", type="string", length=255, nullable=true)
     */
    private $surname;

    /**
     * @var \DateTime
     * @ORM\Column(name="registered", type="datetime")
     */
    private $registered;

    /**
     * @var \DateTime
     * @ORM\Column(name="lastactive", type="datetime")
     */
    private $lastactive;

    /**
     * @var boolean
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     * @var ArrayCollection $roles
     */
    protected $roles;

    /**
     * @var string
     * @Assert\NotBlank(groups={"settings"})
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true, options={"default" = null})
     */
    private $avatar;

    /**
     * @var int
     * @ORM\Column(name="language_id", type="integer", nullable=true, options={"default" = null})
     */
    private $languageID;

    /**
     * @var string
     * @ORM\Column(name="skype", type="string", nullable=true, options={"default" = null})
     */
    private $skype;

    /**
     * @var boolean
     * @ORM\Column(name="deleted", type="boolean", options={"default" = false})
     */
    private $deleted;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Achievement", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="user_gained_achievements",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="achievement_id", referencedColumnName="id")}
     * )
     */
    private $gainedAchievements;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="PlayerChar", mappedBy="user")
     */
    private $chars;

    /**
     * Constructor
     */
    public function __construct() {
        $this->roles = new ArrayCollection();
        $this->name = null;
        $this->surname = null;
        $this->languageID = null;
        $this->deleted = false;
        $this->registered = new \DateTime();
        $this->lastactive = $this->registered;
        $this->active = true;
        $this->chars = new ArrayCollection();
        $this->gainedAchievements = new ArrayCollection();
    }

    /**
     * @return array
     */
    public function getInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'active' => $this->active,
            'avatar' => $this->avatar,
            'chars' => JSONTransformer::getSingleInArray($this->chars),
            'deleted' => $this->deleted,
            'email' => $this->email,
            'gainedAchievements' => JSONTransformer::arrayToJsonArray($this->gainedAchievements),
            'languageID' => $this->languageID,
            'lastactive' => $this->lastactive->format('Y-m-d H:i:s'),
            'skype' => $this->skype,
            'surname' => $this->surname,
            'username' => $this->username,
            'registered' => $this->registered->format('Y-m-d H:i:s'),
        );
    }

    public function getSingleInArray() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'active' => $this->active,
            'avatar' => $this->avatar,
            'deleted' => $this->deleted,
            'chars' => $this->chars->count(),
            'email' => $this->email,
            'gainedAchievements' => $this->gainedAchievements->count(),
            'languageID' => $this->languageID,
            'lastactive' => $this->lastactive->format('Y-m-d H:i:s'),
            'skype' => $this->skype,
            'surname' => $this->surname,
            'username' => $this->username,
            'registered' => $this->registered->format('Y-m-d H:i:s'),
        );
    }

    /**
     * Get password
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Get username
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return $this->roles->toArray();
    }

    /**
     * @inheritDoc
     */
    public function getSalt() {
        return '29bb70e342c414586fd9a3609b98d1e825cbc75f';
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize() {
        return serialize(array(
            $this->id, $this->username,
            $this->password, $this->email,
            $this->name, $this->surname,
            $this->registered, $this->lastactive,
            $this->active
        ));
    }

    /**
     * @see \Serializable::unserialize()
     * @param $serialized
     */
    public function unserialize($serialized) {
        list($this->id, $this->username, $this->password,
            $this->email, $this->name, $this->surname,
            $this->registered, $this->lastactive,
            $this->active) = unserialize($serialized);
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() { }

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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set registered
     *
     * @param \DateTime $registered
     * @return User
     */
    public function setRegistered($registered)
    {
        $this->registered = $registered;

        return $this;
    }

    /**
     * Get registered
     *
     * @return \DateTime 
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * Set lastactive
     *
     * @param \DateTime $lastactive
     * @return User
     */
    public function setLastactive($lastactive)
    {
        $this->lastactive = $lastactive;

        return $this;
    }

    /**
     * Get lastactive
     *
     * @return \DateTime 
     */
    public function getLastactive()
    {
        return $this->lastactive;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set languageID
     *
     * @param integer $languageID
     * @return User
     */
    public function setLanguageID($languageID)
    {
        $this->languageID = $languageID;

        return $this;
    }

    /**
     * Get languageID
     *
     * @return integer 
     */
    public function getLanguageID()
    {
        return $this->languageID;
    }

    /**
     * Set skype
     *
     * @param string $skype
     * @return User
     */
    public function setSkype($skype)
    {
        $this->skype = $skype;

        return $this;
    }

    /**
     * Get skype
     *
     * @return string 
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     * @return User
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Add roles
     *
     * @param \riki34\GameBundle\Entity\Role $roles
     * @return User
     */
    public function addRole(\riki34\GameBundle\Entity\Role $roles)
    {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \riki34\GameBundle\Entity\Role $roles
     */
    public function removeRole(\riki34\GameBundle\Entity\Role $roles)
    {
        $this->roles->removeElement($roles);
    }

    /**
     * Add completedQuests
     *
     * @param \riki34\GameBundle\Entity\Quest $completedQuests
     * @return User
     */
    public function addCompletedQuest(\riki34\GameBundle\Entity\Quest $completedQuests)
    {
        $this->completedQuests[] = $completedQuests;

        return $this;
    }

    /**
     * Remove completedQuests
     *
     * @param \riki34\GameBundle\Entity\Quest $completedQuests
     */
    public function removeCompletedQuest(\riki34\GameBundle\Entity\Quest $completedQuests)
    {
        $this->completedQuests->removeElement($completedQuests);
    }

    /**
     * Get completedQuests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompletedQuests()
    {
        return $this->completedQuests;
    }

    /**
     * Add takenQuests
     *
     * @param \riki34\GameBundle\Entity\Quest $takenQuests
     * @return User
     */
    public function addTakenQuest(\riki34\GameBundle\Entity\Quest $takenQuests)
    {
        $this->takenQuests[] = $takenQuests;

        return $this;
    }

    /**
     * Remove takenQuests
     *
     * @param \riki34\GameBundle\Entity\Quest $takenQuests
     */
    public function removeTakenQuest(\riki34\GameBundle\Entity\Quest $takenQuests)
    {
        $this->takenQuests->removeElement($takenQuests);
    }

    /**
     * Get takenQuests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTakenQuests()
    {
        return $this->takenQuests;
    }

    /**
     * Add gainedAchievements
     *
     * @param \riki34\GameBundle\Entity\Achievement $gainedAchievements
     * @return User
     */
    public function addGainedAchievement(\riki34\GameBundle\Entity\Achievement $gainedAchievements)
    {
        $this->gainedAchievements[] = $gainedAchievements;

        return $this;
    }

    /**
     * Remove gainedAchievements
     *
     * @param \riki34\GameBundle\Entity\Achievement $gainedAchievements
     */
    public function removeGainedAchievement(\riki34\GameBundle\Entity\Achievement $gainedAchievements)
    {
        $this->gainedAchievements->removeElement($gainedAchievements);
    }

    /**
     * Get gainedAchievements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGainedAchievements()
    {
        return $this->gainedAchievements;
    }

    /**
     * Add chars
     *
     * @param \riki34\GameBundle\Entity\PlayerChar $chars
     * @return User
     */
    public function addChar(\riki34\GameBundle\Entity\PlayerChar $chars)
    {
        $this->chars[] = $chars;

        return $this;
    }

    /**
     * Remove chars
     *
     * @param \riki34\GameBundle\Entity\PlayerChar $chars
     */
    public function removeChar(\riki34\GameBundle\Entity\PlayerChar $chars)
    {
        $this->chars->removeElement($chars);
    }

    /**
     * Get chars
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChars()
    {
        return $this->chars;
    }
}
