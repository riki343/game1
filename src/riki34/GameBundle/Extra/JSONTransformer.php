<?php

namespace riki34\GameBundle\Extra;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use riki34\GameBundle\Interfaces\RESTEntity;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

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
        $jsonArray = array();
        /** @var RESTEntity $item */
        foreach ($array as $item) {
            $jsonArray[] = $item->getSingleInArray();
        }

        return $jsonArray;
    }

    /**
     * @param ConstraintViolationListInterface $errors
     * @return array
     */
    public static function errorsToJson(ConstraintViolationListInterface $errors) {
        $jsonErrors = array();
        /** @var ConstraintViolationInterface $error */
        foreach ($errors as $error) {
            $jsonErrors[] = array(
                'message' => $error->getMessage(),
                'field' => $error->getPropertyPath()
            );
        }

        return $jsonErrors;
    }
}