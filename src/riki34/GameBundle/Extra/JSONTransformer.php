<?php

namespace riki34\GameBundle\Extra;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use riki34\GameBundle\Interfaces\RESTEntity;

class JSONTransformer {
    /**
     * @param array|ArrayCollection|Collection $array
     * @return array
     */
    public static function arrayToJsonArray($array) {
        $jsonArray = array();
        /** @var RESTEntity $item */
        foreach ($array as $item) {
            $jsonArray[] = $item->getInArray();
        }

        return $jsonArray;
    }

    /**
     * @param array|ArrayCollection|Collection $array
     * @return array
     */
    public static function getSingleInArray($array) {
        $jsonArray[] = array();
        /** @var RESTEntity $item */
        foreach ($array as $item) {
            $jsonArray[] = $item->getSingleInArray();
        }

        return $jsonArray;
    }
}