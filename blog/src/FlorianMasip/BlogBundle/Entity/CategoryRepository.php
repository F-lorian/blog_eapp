<?php

namespace FlorianMasip\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{

    /**
     * Récupère une liste des catégories selon un nom de catégorie
     * @param string $unNomCategory
     * @return array
     */
    public function findAllByNomCategory($unNomCategory = null) {

        if ($unNomCategory != null) {
            return $this->getEntityManager()
                            ->createQuery(
                'SELECT p
                FROM BlogBundle:Category p
                WHERE p.nom = :nomCat
                ORDER BY p.nom ASC')->setParameter('nomCat', $unNomCategory)->getResult();
        } else {
            return $this->getEntityManager()
                            ->createQuery(
                'SELECT p
                FROM BlogBundle:Category p
                ORDER BY p.nom ASC')->getResult();
        }

    }

}
