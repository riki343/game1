<?php

namespace riki34\GameBundle\Controller;

use riki34\GameBundle\Entity\User;
use riki34\GameBundle\Extra\JSONTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class GameController extends Controller {
    /**
     * @Route("/game")
     * @Security("has_role('ROLE_USER')")
     */
    public function indexAction() {
        /** @var User $user */
        $user = $this->getUser();
        $chars = JSONTransformer::arrayToJsonArray($user->getChars());
        //$location = $this->get('game.locationLoader')->loadLocation($user);
    }
}