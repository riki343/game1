<?php

namespace riki34\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('username', 'text', [
            'attr' => [ 'class' => 'form-control' ],
            'label_attr' => [ 'class' => 'input-group-addon' ],
            'label' => 'Login:'
        ]);
        $builder->add('email', 'email', [
            'attr' => [ 'class' => 'form-control' ],
            'label_attr' => [ 'class' => 'input-group-addon' ],
            'label' => 'Email:'
        ]);
        $builder->add('password', 'repeated', [
            'type' => 'password',
            'first_options' => [
                'label' => 'Password:',
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'input-group-addon' ],
            ],
            'second_options' => array(
                'label' => 'Confirm Password:',
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'input-group-addon' ]
            ),
            'invalid_message' => 'Passwords do not match',
        ]);
        $builder->add('Register', 'submit', [
            'attr' => [ 'class' => 'btn btn-success btn-sm' ],
        ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'riki34\GameBundle\Entity\User',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'validation_groups' => array('registration', 'Default')
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'riki34_GameBundle_registration';
    }
}