<?php

namespace riki34\GameBundle\Service;

use riki34\GameBundle\Extra\JSONTransformer;
use riki34\GameBundle\Interfaces\RESTEntity;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\JsonResponse;

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

    public function generateErrorResponse() {

    }

    public function generateErrorResponseWithObject() {

    }

    public function generateErrorResponseWithObjects() {

    }
}