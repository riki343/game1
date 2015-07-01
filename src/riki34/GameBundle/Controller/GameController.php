<?php

namespace riki34\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class GameController extends Controller {
    /**
     * @Route("/get/location/{location_id}")
     * @param integer $location_id
     */
    public function indexAction($location_id) {

    }
}