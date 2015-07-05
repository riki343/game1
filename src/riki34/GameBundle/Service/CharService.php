<?php

namespace riki34\GameBundle\Service;

use Doctrine\ORM\EntityManager;
use riki34\GameBundle\Entity\Bag;
use riki34\GameBundle\Entity\PlayerChar;
use riki34\GameBundle\Entity\User;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class CharService {
    /** @var EntityManager $em */
    private $em;
    /** @var RESTResponse $response */
    private $response;
    /** @var ValidatorInterface */
    private $validator;
    /** @var User $user */
    private $user;

    /**
     * @param EntityManager $em
     * @param RESTResponse $response
     * @param ValidatorInterface $validator
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct($em, $response, $validator, $tokenStorage) {
        $this->em = $em;
        $this->response = $response;
        $this->validator = $validator;
        $this->user = $tokenStorage->getToken()->getUser();
    }

    public function addChar($data) {
        $fraction = $this->em->find('riki34GameBundle:Fraction', $data['fractionID']);
        $specialization = $this->em->find('riki34GameBundle:Specialization', $data['specializationID']);
        $char = new PlayerChar($fraction, $specialization);
        $char->setName($data['name']);
        $char->setSex($data['sex']);
        $char->setUser($this->user);

        $errors = $this->validator->validate($char, null, array('create'));
        if (count($errors) === 0) {
            $bag = new Bag();
            $bag->setChar($char);
            $this->em->persist($bag);
            $this->em->persist($char);
            $this->em->flush();
            return $this->response->generateSuccessResponse();
        } else {
            return $this->response->generateErrorResponse($errors);
        }
    }
}