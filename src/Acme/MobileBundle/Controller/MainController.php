<?php

namespace Acme\MobileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\StoreBundle\Controller\MainController as mc;

class MainController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeMobileBundle:Main:main.html.twig', array('name' => $name));
    }
    
    public function aboutAction()
    {
        return $this->render('AcmeMobileBundle:Main:about.html.twig');
    }

    public function DeliveryAction()
    {
        return $this->render('AcmeMobileBundle:Main:delivery.html.twig');
    }

    public function faqAction()
    {
        return $this->render('AcmeMobileBundle:Main:faq.html.twig');
    }

    public function contactAction()
    {
        return $this->render('AcmeMobileBundle:Main:contact.html.twig');
    }
    
    public function categoryAction($catId)
    {
        return $this->render('AcmeMobileBundle:Main:cars.html.twig', array('catId' => $catId));
    }

    public function carAction($carId)
    {
        $car = $this->getDoctrine()->getRepository('AcmeMobileBundle:Products')->findOneById($carId);
        if (!$car) { 
            throw $this->createNotFoundException('No car found'); 
        }
        return $this->render('AcmeMobileBundle:Main:car.html.twig', array('car' => $car));
        // return $this->render('AcmeMobileBundle:Main:car.html.twig', array('carId' => $carId));
    }

    public function getAllCategoriesOrderedByIdAction()
    {
        $categories = $this->getDoctrine()->getRepository('AcmeMobileBundle:Categories')->findAll();
        if (!$categories) { 
            throw $this->createNotFoundException('No categories found'); 
        }
        return $this->render('AcmeMobileBundle:Main:category.html.twig', array('categories' => $categories));
    }

    public function getFeaturedCarAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQuery('SELECT p FROM AcmeMobileBundle:Products p WHERE p.featured = :true')->setParameter('true', '1')->setMaxResults(6);
        $featured = $query->getResult();
        // $featured = $this->getDoctrine()->getRepository('AcmeMobileBundle:Products')->findAll();
        if (!$featured) { 
            throw $this->createNotFoundException('No featured cars found'); 
        }
        return $this->render('AcmeMobileBundle:Main:featured_car.html.twig', array('featured' => $featured));
    }
}
