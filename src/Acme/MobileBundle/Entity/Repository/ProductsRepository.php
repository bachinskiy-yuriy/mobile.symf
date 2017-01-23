<?php

namespace Acme\MobileBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ProductsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductsRepository extends EntityRepository
{
    public function findFeaturedCars()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT p FROM AcmeMobileBundle:Products p WHERE p.featured = :true')->setParameter('true', '1')->setMaxResults(6);
        $featured = $query->getResult();
        return $featured;
    }

    public function findCarsByCategory($catId, $results, $page)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT p FROM AcmeMobileBundle:Products p WHERE p.categoryid = :catId')->setParameter('catId', $catId)->setMaxResults($results)->setFirstResult($page);
        $cars = $query->getResult();
        return $cars;
    }

    public function findCarsCountByCategory($catId)
    {
        $em = $this->getEntityManager();
        $query =  $em->createQuery('SELECT count(p) FROM AcmeMobileBundle:Products p WHERE p.categoryid = :catId')->setParameter('catId', $catId);
        $records = $query->getSingleScalarResult();
        return $records;
    }

    public function findFilteredCars($search, $results, $page)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT p FROM AcmeMobileBundle:Products p WHERE p.model LIKE :search')->setParameter('search', '%'.$search.'%')->setMaxResults($results)->setFirstResult($page);
        $cars = $query->getResult();
        return $cars;
    }

    public function findCarsCountBySearch($search)
    {
        $em = $this->getEntityManager();
        $query =  $em->createQuery('SELECT count(p) FROM AcmeMobileBundle:Products p WHERE p.model LIKE :search')->setParameter('search', '%'.$search.'%');
        $records = $query->getSingleScalarResult();
        return $records;
    }
}
