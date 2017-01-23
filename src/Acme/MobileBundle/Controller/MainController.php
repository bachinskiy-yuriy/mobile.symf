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
        if(isset($_POST['contact_name'])){
            $message = \Swift_Message::newInstance()
                ->setSubject($_POST['contact_subject'])
                ->setFrom(array('mobile.kl.com.ua@gmail.com' => 'Автомобили из Германии'))
                ->setTo('mobile.kl.com.ua@gmail.com')
                ->setBody('<b>Имя: </b>'.$_POST['contact_name'].'<br/>'.'<b>Телефон: </b>'.$_POST['contact_tel'].'<br/>'.'<b>E-mail: </b>'.$_POST['contact_email'].'<br/>'.'<b>Автомобиль: </b>'.$_POST['contact_model'].'<br/>'.'<b>Сообщение: </b>'.$_POST['contact_message'], 'text/html');
            $this->get('mailer')->send($message);
            unset($message);
            $message = \Swift_Message::newInstance()
                ->setSubject('Сообщение отправлено')
                ->setFrom(array('mobile.kl.com.ua@gmail.com' => 'Автомобили из Германии'))
                ->setTo($_POST['contact_email'])
                ->setBody('Ваше сообщение было успешно отправлено.<br/>Мы свяжемся с Вами в ближайшее время.', 'text/html');
            $this->get('mailer')->send($message);
            }    
        return $this->render('AcmeMobileBundle:Main:contactPage.html.twig');
    }
    
    public function categoryAction($catId,$page,$results)
    {
        $page = (substr($page,1,strlen($page)-1) - 1)*$results; 
        $em = $this->getDoctrine()->getEntityManager();
        $cars = $this->getDoctrine()->getRepository('AcmeMobileBundle:Products')->findCarsByCategory($catId,$results,$page);
        $records = $this->getDoctrine()->getRepository('AcmeMobileBundle:Products')->findCarsCountByCategory($catId);
        if (!$cars) { 
            throw $this->createNotFoundException('No car found'); 
        }    
        return $this->render('AcmeMobileBundle:Main:filteredCarsPage.html.twig', array('cars' => $cars, 'catId' => $catId, 'thisPage' => ($page/$results+1),'records' => $records, 'results' => $results));
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
        // $featured = $this->getDoctrine()->getRepository('AcmeMobileBundle:Products')->findByFeatured(1);
        $featured = $this->getDoctrine()->getRepository('AcmeMobileBundle:Products')->findFeaturedCars();
        if (!$featured) { 
            throw $this->createNotFoundException('No featured cars found'); 
        }
        return $this->render('AcmeMobileBundle:Main:Blocks/featuredCarBlock.html.twig', array('featured' => $featured));
    }

    public function getFilteredCarAction($page,$results)
    {
        $page = (substr($page,1,strlen($page)-1) - 1)*$results; 
        $search=$_GET['keyword']; 
        $cars =  $this->getDoctrine()->getRepository('AcmeMobileBundle:Products')->findFilteredCars($search, $results, $page);
        $records =  $this->getDoctrine()->getRepository('AcmeMobileBundle:Products')->findCarsCountBySearch($search);
        // if (!$cars) { 
            // throw $this->createNotFoundException('No featured cars found'); 
        // }
        return $this->render('AcmeMobileBundle:Main:filteredCarsPage.html.twig', array('cars' => $cars, 'catId' => '', 'thisPage' => $page/$results+1,'records' => $records,'results' => $results));
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
