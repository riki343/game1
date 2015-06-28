<?php

namespace riki34\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class LocationController extends Controller {
    /**
     * @Route("/get/location/{location_id}")
     * @param integer $location_id
     */
    public function getLocationAction($location_id) {
        $location = $this->getDoctrine()->getRepository('riki34GameBundle:Location')->find($location_id);
        if ($location) {

        }
    }
}