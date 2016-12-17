<?php

namespace Acme\MobileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

class MainController extends Controller
{
    public function __construct()
    {
        // if(!isset($_SESSION['currency'])){
            // $this->get('session')->set('currency', '2');
            // $this->get('session')->set('rate', '1130');
        // }
    }   
    
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
        $page = (substr($page,1,strlen($page)-1) - 1)*6; 
        $em = $this->getDoctrine()->getEntityManager();
        // $query = $em->createQuery('SELECT p FROM AcmeMobileBundle:Products p WHERE p.categoryid.id = :catId')->setParameter('catId', $catId)->setMaxResults(6)->setFirstResult($page);
        $query = $em->createQuery('SELECT p FROM AcmeMobileBundle:Products p WHERE p.categoryid = :catId')->setParameter('catId', $catId)->setMaxResults(6)->setFirstResult($page);
        $cars = $query->getResult();
        $query =  $em->createQuery('SELECT count(p) FROM AcmeMobileBundle:Products p WHERE p.categoryid = :catId')->setParameter('catId', $catId);
        $records = $query->getSingleScalarResult();
        if (!$cars) { 
            throw $this->createNotFoundException('No car found'); 
        }    
        return $this->render('AcmeMobileBundle:Main:filteredCarsPage.html.twig', array('cars' => $cars, 'catId' => '/'.$catId, 'thisPage' => ($page/6+1),'records' => $records));
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

    public function getFilteredCarAction($page)
    {
        $page = (substr($page,1,strlen($page)-1) - 1)*6; 
        $search=$_GET['keyword']; 
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQuery('SELECT p FROM AcmeMobileBundle:Products p WHERE p.model LIKE :search')->setParameter('search', '%'.$search.'%')->setMaxResults(6)->setFirstResult($page);;
        $cars = $query->getResult();
        $query =  $em->createQuery('SELECT count(p) FROM AcmeMobileBundle:Products p WHERE p.model LIKE :search')->setParameter('search', '%'.$search.'%');
        $records = $query->getSingleScalarResult();
        if (!$cars) { 
            throw $this->createNotFoundException('No featured cars found'); 
        }
        return $this->render('AcmeMobileBundle:Main:filteredCarsPage.html.twig', array('cars' => $cars, 'catId' => '', 'thisPage' => ($page/6+1),'records' => $records));
    }

    public function getAllCurrencyOrderedByIdAction()
    {
        $currency = $this->getDoctrine()->getRepository('AcmeMobileBundle:Currency')->findAll();
        if($this->get('session')->get('currency') == ''){
            $currency_id = 2;
            $this->get('session')->set('currency',$currency_id);
            $this->get('session')->set('rate',$this->getDoctrine()->getRepository('AcmeMobileBundle:Currency')->find($currency_id)->getRate());
            $this->get('session')->set('symb',$this->getDoctrine()->getRepository('AcmeMobileBundle:Currency')->find($currency_id)->getSymb());
        }
        if (!$currency) { 
            throw $this->createNotFoundException('No currency found'); 
        }
        return $this->render('AcmeMobileBundle:Main:Blocks/currencyBlock.html.twig', array('currency' => $currency, 'selected' => $this->get('session')->get('currency')));
    }

    public function refreshAction(Request $request)
    {
        $this->get('session')->set('currency', $_GET['currency_id']);
        $rate = $this->getDoctrine()->getRepository('AcmeMobileBundle:Currency')->find($_GET['currency_id'])->getRate();
        $this->get('session')->set('rate', $rate);
        $symb = $this->getDoctrine()->getRepository('AcmeMobileBundle:Currency')->find($_GET['currency_id'])->getSymb();
        $this->get('session')->set('symb', $symb);
        $referer = $request->headers->get('referer');
        return new RedirectResponse($referer);
    }
}
