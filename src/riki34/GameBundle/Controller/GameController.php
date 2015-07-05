<?php

namespace riki34\GameBundle\Controller;

use riki34\GameBundle\Entity\User;
use riki34\GameBundle\Extra\JSONTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;

class GameController extends Controller {
    /**
     * @Route("/api/get/chars", name="get_user_chars", options={"expose"=true})
     * @Security("has_role('ROLE_USER')")
     */
    public function indexAction() {
        /** @var User $user */
        $user = $this->getUser();
        return new JsonResponse(JSONTransformer::arrayToJsonArray($user->getChars()));
    }
}