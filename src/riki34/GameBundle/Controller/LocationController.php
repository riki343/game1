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
     * @Route("/api/get/location/{location_id}", options={"expose"=true})
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
     * @Route("/api/get/location_editor/{location_id}", name="location_editor", options={"expose"=true})
     * @Security("has_role('ROLE_USER')")
     * @Method({"GET"})
     * @param int $location_id
     * @return JsonResponse
     */
    public function locationEditorAction($location_id) {
        return new JsonResponse(array(
            'editor' => $this->get('game.locationLoader')->loadLocationEditor(),
            'level' => $this->get('game.locationLoader')->loadLocation($location_id)
        ));
    }

    /**
     * @Route("/api/add/location", options={"expose"=true})
     * @Security("has_role('ROLE_ADMIN')")
     * @Method({"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function createLocationAction(Request $request) {

        return new JsonResponse();
    }
}