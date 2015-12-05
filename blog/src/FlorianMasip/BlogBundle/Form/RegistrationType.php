<?php

namespace FlorianMasip\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('profilePictureFile',"file", array('label' => 'photo de profil (non fonctionnel)', 'required' => false))
            ->add('username', 'text', array('label' => 'Pseudo', 'required' => true))
            ->add('email', 'text', array('label' => 'Mail', 'required' => true))
            ->add('surname', 'text', array('label' => 'Prénom', 'required' => false))
            ->add('lastname', 'text', array('label' => 'Nom', 'required' => false))
            ->add('age', 'text', array('label' => 'Age', 'required' => false))
            ->add('password', 'password', array('label' => 'Mot de passe', 'required' => true))
            ->add('plainPassword', 'password', array('label' => 'Retaper le mot de passe', 'required' => true))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FlorianMasip\BlogBundle\Entity\User'
        ));
    }
/*
    public function getParent()
    {
        return 'fos_user_registration';
    }
*/
    /**
     * @return string
     */
    public function getName()
    {
        return 'app_user_registration';
    }
}
