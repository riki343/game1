<?php

namespace riki34\GameBundle\Extra;

use riki34\GameBundle\Interfaces\RESTEntity;

class JSONTransformer {
    public static function arrayToJsonArray(array $array) {
        $jsonArray[] = array();
        /** @var RESTEntity $item */
        foreach ($array as $item) {
            $jsonArray[] = $item->getInArray();
        }

        return $jsonArray;
    }
}