<?php

namespace FlorianMasip\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * BlogRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BlogRepository extends \Doctrine\ORM\EntityRepository
{


	/**
     * Récupère le blog par l'urlAlias
     *
     * @param string $urlAlias
     * @return Paginator
     */
    public function getBlogbyUrl($url_alias) {
            return $this->getEntityManager()
                            ->createQuery(
                'SELECT b.urlAlias
                FROM BlogBundle:Blog b
                WHERE b.urlAlias = :url')->setParameter('url', $url_alias)->getResult();
    }

    /**
     * Récupère le blog par le nom
     *
     * @param string $name
     * @return Paginator
     */
    public function getBlogByName($name) {
            return $this->getEntityManager()
                            ->createQuery(
                'SELECT b.name
                FROM BlogBundle:Blog b
                WHERE b.name = :name')->setParameter('name', $name)->getResult();
    }

}