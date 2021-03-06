<?php

namespace FlorianMasip\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * CommentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentRepository extends EntityRepository {
    /**
     * Récupère la pagination des post avec un max par page
     *
     * @param \FlorianMasip\BlogBundle\Entity\Post $post
     * @param int $page
     * @param int $commentsPerPage
     * @return Paginator
     */
    public function getCommentsList($post, $page = 0, $commentsPerPage = 10) {

        $q = $this->_em->createQueryBuilder()
                ->select('comment')
                ->from('BlogBundle:Comment', 'comment')
                ->where('comment.post = :post')->setParameter("post", $post)
                ->orderBy('comment.dateCreation', 'DESC');

        $q->setFirstResult($page * $commentsPerPage)->setMaxResults($commentsPerPage);

        return new Paginator($q);
    }

}
