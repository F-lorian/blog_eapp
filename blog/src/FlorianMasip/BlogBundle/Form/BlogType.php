<?php

namespace FlorianMasip\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pictureFile',"file", array('label' => 'photo de couverture (étirée en 1100 x 200 - 6 MB maximum)', 'required' => false))
            ->add('name', 'text', array('label' => 'Nom', 'required' => true))
            ->add('urlAlias', 'text', array('label' => 'url du blog', 'required' => true))
            ->add('theme', 'text', array('label' => 'Thème', 'required' => true))
            ->add('description', 'textarea', array('label' => 'description', 'required' => false))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FlorianMasip\BlogBundle\Entity\Blog'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'new_blog';
    }
}
