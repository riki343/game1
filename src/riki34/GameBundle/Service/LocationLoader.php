<?php

namespace riki34\GameBundle\Service;

use Doctrine\ORM\EntityManager;

class LocationLoader {
    /** @var EntityManager $em */
    private $em;
    /** @var JSONLoader $jsonLoader */
    private $jsonLoader;

    /**
     * @param EntityManager $entityManager
     * @param JSONLoader $JSONLoader
     */
    public function __construct(EntityManager $entityManager, JSONLoader $JSONLoader) {
        $this->em = $entityManager;
        $this->jsonLoader = $JSONLoader;
    }

    public function loadLocation($location_id) {
        $location = $this->em->find('riki34GameBundle:Location', $location_id);
        if (!$location) {
            return null;
        }

        $location = $this->jsonLoader->loadFile($location->getFile());
    }
}