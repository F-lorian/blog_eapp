<?php

namespace FlorianMasip\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Titre'))
            ->add('urlAlias', 'text', array('label' => 'Url du lien'))
            ->add('nomCategory', 'entity', array(
            'class' => 'BlogBundle:Category',
            'query_builder' => function($repository) { return $repository->createQueryBuilder('p')->orderBy('p.nom', 'ASC'); },
            'property' => 'nom',
            'label' => 'Catégory',        
            'empty_value' => '---',
            'empty_data'  => null,
            'required' => false,
                    ))
            ->add('content', 'textarea', array('label' => 'Contenu'))
            ->add('valider', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FlorianMasip\BlogBundle\Entity\Post'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Sfobis_blog_new_post';
    }
}
