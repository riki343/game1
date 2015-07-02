<?php

namespace riki34\GameBundle\Service;

use Doctrine\ORM\EntityManager;
use riki34\GameBundle\Extra\JSONTransformer;

class LocationLoader {
    /** @var EntityManager $em */
    private $em;
    /** @var JSONLoader $jsonLoader */
    private $jsonLoader;
    /** @var RESTResponse $response */
    private $response;

    /**
     * @param EntityManager $entityManager
     * @param JSONLoader $JSONLoader
     * @param RESTResponse $response
     */
    public function __construct(EntityManager $entityManager, JSONLoader $JSONLoader, RESTResponse $response) {
        $this->em = $entityManager;
        $this->jsonLoader = $JSONLoader;
        $this->response = $response;
    }

    /**
     * @param $location_id
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function loadLocation($location_id) {
        $location = $this->em->find('riki34GameBundle:Location', $location_id);
        $res = $this->jsonLoader->loadFile($location->getFile());
        $location->setRes($res);

        $resources = array();
        $resources['NPC'] = JSONTransformer::arrayToJsonArray(
            $this->em->getRepository('riki34GameBundle:NPC')->findBy(array('id' => $res['NPC']))
        );
        $resources['monsters'] = JSONTransformer::arrayToJsonArray(
            $this->em->getRepository('riki34GameBundle:Monster')->findBy(array('id' => $res['monsters']))
        );
        $resources['decorations'] = JSONTransformer::arrayToJsonArray(
            $this->em->getRepository('riki34GameBundle:Decoration')->findBy(array('id' => $res['decorations']))
        );
        $location->setResources($resources);

        return $this->response->generateResponseWithObject($location);
    }

    /**
     * @param $location_id
     * @param array $resources
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function storeLocation($location_id, array $resources) {
        $location = $this->em->find('riki34GameBundle:Location', $location_id);
        $this->jsonLoader->storeFile($location->getFile(), $resources);
        $message = "Location saved";
        return $this->response->generateSuccessResponse(array($message));
    }
}