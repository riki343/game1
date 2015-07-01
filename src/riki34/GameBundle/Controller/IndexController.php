<?php

namespace riki34\GameBundle\Controller;

use Doctrine\ORM\EntityManager;
use riki34\GameBundle\Entity\Role;
use riki34\GameBundle\Entity\User;
use riki34\GameBundle\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @Route("/login_check", name="login_check")
     * @Method({"POST"})
     */
    public function loginCheckAction() {}

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction() {}

    /**
     * @Route("/register", name="register_user")

     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function userRegisterAction(Request $request) {
        $user = new User();
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new RegistrationType(), $user, [
            'attr' => [ 'class' => 'form-horizontal', 'novalidate' => 'novalidate' ],
            'method' => 'POST',
            'action' => $this->generateUrl('register_user'),
        ]);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $encoderFactory = $this->get('security.encoder_factory');
            $encoder = $encoderFactory->getEncoder($user);
            $user->setPassword($encoder->encodePassword($user->getPassword(), $user->getSalt()));
            $user->addRole($em->find('riki34GameBundle:Role', Role::USER_ROLE));
            $em->persist($user);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'Registration success');
            return $this->redirectToRoute('home');
        }

        return $this->render('@riki34Game/register.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
