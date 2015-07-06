<?php

namespace riki34\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LocationController extends Controller {
    /**
     * @Route("/api/get/location/{location_id}")
     * @Security("has_role('ROLE_USER')")
     * @Method({"GET"})
     * @param integer $location_id
     */
    public function getLocationAction($location_id) {
        $location = $this->getDoctrine()->getRepository('riki34GameBundle:Location')->find($location_id);
        if ($location) {

        }
    }

    /**
     * @Route("/api/add/location")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method({"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function createLocationAction(Request $request) {

        return new JsonResponse();
    }
}