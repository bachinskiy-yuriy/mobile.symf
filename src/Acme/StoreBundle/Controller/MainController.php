<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\StoreBundle\Entity\Products;

class MainController extends Controller
{
    public function addAction($name)
    {
        $product = new Products();
        $product->setModel('Merc');
        $product->setPrice('10');
        $product->setMainPhoto('test');
        $product->setPhotos('test');
        $product->setCategory('test');
        $product->setConditions('test');
        $product->setFirstRegistration('test');
        $product->setGearBox('test');
        $product->setFuel('test');
        $product->setMileage('test');
        $product->setPower('test');
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($product);
        $em->flush();
        return new Response('add new car');
    }
    
    public function getAction($id)
    {
        $product = $this->getDoctrine()->getRepository('AcmeStoreBundle:Products')->find($id);
        if (!$product) { 
            throw $this->createNotFoundException('No product found for id '.$id); 
        }
        return new Response('car model: '.$product->getModel());        
    }
    
    
}
