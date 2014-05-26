<?php

namespace Test\TestTwoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Test\TestTwoBundle\Entity\All;
use Test\TestTwoBundle\Form\AllType;

use Test\TestStoreBundle\Entity\User;
use Test\TestStoreBundle\Entity\Address;
use Test\TestStoreBundle\Entity\Personal;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {

        $all = new All();
        $all->getUser()->add(new User());
        $all->getAddress()->add(new Address());
        $all->getPersonal()->add(new Personal());

        //  Create Form
        $form = $this->createForm(new AllType(), $all);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $all->getUser()->first()->setPersonal($all->getPersonal()->first());
            $all->getUser()->first()->setAddress($all->getAddress()->first());
            $all->getAddress()->first()->setUser($all->getUser()->first());
            $all->getPersonal()->first()->setUser($all->getUser()->first());

            // Persist submitted info to Database
            $em = $this->getDoctrine()->getManager();
            $em->persist($all->getUser()->first());
            $em->persist($all->getAddress()->first());
            $em->persist($all->getPersonal()->first());
            $em->flush();

            return new Response('Well done, it worked!');

        }
            
            return $this->render('TestTestTwoBundle:Default:index.html.twig', array('form' => $form->createView()));

    }
}
