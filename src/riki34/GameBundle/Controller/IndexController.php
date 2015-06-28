<?php

namespace riki34\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction() {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->render('@riki34Game/game.html.twig');
        } else {
            return $this->render('@riki34Game/login.html.twig');
        }
    }
}
