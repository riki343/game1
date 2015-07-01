<?php

namespace riki34\GameBundle\Model;
use riki34\GameBundle\Interfaces\RESTEntity;

/**
 * LocationPoint
 */
class LocationPoint implements RESTEntity
{
    /**
     * @var float
     *
     * @ORM\Column(name="x", type="float")
     */
    private $x;

    /**
     * @var float
     *
     * @ORM\Column(name="y", type="float")
     */
    private $y;

    /**
     * @var float
     *
     * @ORM\Column(name="z", type="float")
     */
    private $z;

    public function __construct($x, $y, $z = 0) {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function getInArray() {
        return array(
            'x' => $this->x,
            'y' => $this->y,
            'z' => $this->z,
        );
    }

    public static function getFromArray(array $array) {
        return new LocationPoint($array['x'], $array['y'], $array['z']);
    }

    /**
     * Set x
     *
     * @param float $x
     * @return LocationPoint
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get x
     *
     * @return float 
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set y
     *
     * @param float $y
     * @return LocationPoint
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * Get y
     *
     * @return float 
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Set z
     *
     * @param float $z
     * @return LocationPoint
     */
    public function setZ($z)
    {
        $this->z = $z;

        return $this;
    }

    /**
     * Get z
     *
     * @return float 
     */
    public function getZ()
    {
        return $this->z;
    }
}
