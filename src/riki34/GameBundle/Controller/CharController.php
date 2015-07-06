<?php

namespace riki34\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CharController extends Controller {
    /**
     * @Route("/api/add/char", name="user_add_char", options={"expose"=true})
     * @Security("has_role('ROLE_USER')")
     * @Method({"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function addCharAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        return $this->get('game.char')->addChar($data);
    }
}