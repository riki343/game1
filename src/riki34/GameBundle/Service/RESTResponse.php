<?php

namespace riki34\GameBundle\Service;

use riki34\GameBundle\Extra\JSONTransformer;
use riki34\GameBundle\Interfaces\RESTEntity;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class RESTResponse {
    /**
     * @param RESTEntity $object
     * @return JsonResponse
     */
    public function generateResponseWithObject(RESTEntity $object) {
        return new JsonResponse($object->getInArray());
    }

    /**
     * @param array $objects
     * @return JsonResponse
     */
    public function generateResponseWithObjects(array $objects) {
        return new JsonResponse(JSONTransformer::arrayToJsonArray($objects));
    }

    // -------------------------------------------------------- \\

    public function generateSuccessResponseWithObject() {

    }

    public function generateSuccessResponseWithObjects() {

    }

    // -------------------------------------------------------- \\

    /**
     * @param array|ConstraintViolationListInterface $messages
     * @return JsonResponse
     */
    public function generateErrorResponse($messages = array()) {
        return new JsonResponse(array(
            'error' => 1,
            'object' => false,
            'messages' => ($messages instanceof ConstraintViolationListInterface)
                ? JSONTransformer::errorsToJson($messages)
                : $messages,
        ));
    }

    public function generateErrorResponseWithObject() {

    }

    public function generateErrorResponseWithObjects() {

    }

    // -------------------------------------------------------- \\

    /**
     * @param array $messages
     * @return JsonResponse
     */
    public function generateSuccessResponse(array $messages = array()) {
        return new JsonResponse(array(
            'error' => -1,
            'object' => false,
            'messages' => $messages,
        ));
    }
}