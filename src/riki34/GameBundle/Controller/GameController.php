<?php

namespace riki34\GameBundle\Controller;

use riki34\GameBundle\Entity\User;
use riki34\GameBundle\Extra\JSONTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

class GameController extends Controller {
    /**
     * @Route("/api/get/chars", name="get_user_chars", options={"expose"=true})
     * @Security("has_role('ROLE_USER')")
     * @Method({"GET"})
     * @return JsonResponse
     */
    public function indexAction() {
        /** @var User $user */
        $user = $this->getUser();
        return new JsonResponse(JSONTransformer::arrayToJsonArray($user->getChars()));
    }

    /**
     * @Route("/api/get/level/{char_id}", name="get_level", options={"expose"=true})
     * @Security("has_role('ROLE_USER')")
     * @Method({"GET"})
     * @param int $char_id
     * @return JsonResponse
     */
    public function loadLevel($char_id = null) {
        $char = $this->getDoctrine()->getRepository('riki34GameBundle:PlayerChar')->find($char_id);
        if ($char) {
            return $this->get('game.locationLoader')->loadLocation($char->getLocationID());
        } else {
            $message = 'Char is not found';
            return $this->get('game.RESTResponse')->generateErrorResponse(array($message));
        }
    }
}