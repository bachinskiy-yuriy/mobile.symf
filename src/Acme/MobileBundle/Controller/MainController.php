<?php

namespace Acme\MobileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\StoreBundle\Controller\MainController as mc;

class MainController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeMobileBundle:Main:mainPage.html.twig', array('name' => $name));
    }
    
    public function aboutAction()
    {
        return $this->render('AcmeMobileBundle:Main:aboutPage.html.twig');
    }

    public function DeliveryAction()
    {
        return $this->render('AcmeMobileBundle:Main:deliveryPage.html.twig');
    }

    public function faqAction()
    {
        return $this->render('AcmeMobileBundle:Main:faqPage.html.twig');
    }

    public function contactAction()
    {
        return $this->render('AcmeMobileBundle:Main:contactPage.html.twig');
    }
    
    public function categoryAction($catId,$page)
    {
        $page = ($page - 1)*6; 
        $em = $this->getDoctrine()->getEntityManager();
        // $query = $em->createQuery('SELECT p FROM AcmeMobileBundle:Products p WHERE p.categoryid.id = :catId')->setParameter('catId', $catId)->setMaxResults(6)->setFirstResult($page);
        $query = $em->createQuery('SELECT p FROM AcmeMobileBundle:Products p WHERE p.categoryid = :catId')->setParameter('catId', $catId)->setMaxResults(6)->setFirstResult($page);
        $cars = $query->getResult();
        $query =  $em->createQuery('SELECT count(p) FROM AcmeMobileBundle:Products p WHERE p.categoryid = :catId')->setParameter('catId', $catId);
        $records = $query->getSingleScalarResult();
        if (!$cars) { 
            throw $this->createNotFoundException('No car found'); 
        }    
        return $this->render('AcmeMobileBundle:Main:filteredCarsPage.html.twig', array('cars' => $cars, 'catId' => $catId, 'thisPage' => ($page/6+1),'records' => $records));
    }

    public function carAction($carId)
    {
        $car = $this->getDoctrine()->getRepository('AcmeMobileBundle:Products')->findOneById($carId);
        if (!$car) { 
            throw $this->createNotFoundException('No car found'); 
        }
        return $this->render('AcmeMobileBundle:Main:carPage.html.twig', array('car' => $car));
    }

    public function getAllCategoriesOrderedByIdAction()
    {
        $categories = $this->getDoctrine()->getRepository('AcmeMobileBundle:Categories')->findAll();
        if (!$categories) { 
            throw $this->createNotFoundException('No categories found'); 
        }
        return $this->render('AcmeMobileBundle:Main:Blocks/categoryBlock.html.twig', array('categories' => $categories));
    }

    public function getFeaturedCarAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQuery('SELECT p FROM AcmeMobileBundle:Products p WHERE p.featured = :true')->setParameter('true', '1')->setMaxResults(6);
        $featured = $query->getResult();
        if (!$featured) { 
            throw $this->createNotFoundException('No featured cars found'); 
        }
        return $this->render('AcmeMobileBundle:Main:Blocks/featuredCarBlock.html.twig', array('featured' => $featured));
    }
}
