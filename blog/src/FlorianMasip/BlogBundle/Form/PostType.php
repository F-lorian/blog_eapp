<?php

namespace FlorianMasip\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FlorianMasip\BlogBundle\Entity\Blog;

class PostType extends AbstractType
{

    public function __construct($options = null) {
       $this->options = $options;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $opts = $this->options;
        $builder
            ->add('name', 'text', array('label' => 'Titre', 'required' => true))
            ->add('urlAlias', 'text', array('label' => 'Url du post', 'required' => true))
            ->add('category', 'entity', array(
            'class' => 'BlogBundle:Category',
            'query_builder' => function($repository) use (&$opts){
                        return $repository->createQueryBuilder('c')
                                ->where('c.nom != :default AND c.blog = :blog')
                                ->setParameter('default','general')
                                ->setParameter('blog',$opts['blog'])
                                ->orderBy('c.nom', 'ASC');
            },
            'property' => 'nom',
            'label' => 'Catégorie',
            'empty_value' => '---',
            'empty_data'  => null,
            'required' => false,
                    ))
            ->add('content', 'textarea', array('label' => 'Contenu', 'required' => true))
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
        return 'blog_new_post';
    }
}
