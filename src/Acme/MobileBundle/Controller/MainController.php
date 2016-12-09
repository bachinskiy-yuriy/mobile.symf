<?php

namespace Acme\MobileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
        return $this->render('AcmeMobileBundle:Main:car.html.twig', array('carId' => $carId));
    }
}
