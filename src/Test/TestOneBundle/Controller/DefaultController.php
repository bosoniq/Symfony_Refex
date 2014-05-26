<?php

namespace Test\TestOneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Test\TestOneBundle\Classes\User;
use Test\TestOneBundle\Classes\Address;


use Test\TestOneBundle\Forms\Types\First;
// use Test\TestOneBundle\Forms\Types\Address;



class DefaultController extends Controller
{



    public function indexAction()
    {

        return $this->render('TestTestOneBundle:Default:index.html.twig');

    }

    public function successAction()
    {

        return new Response('Well done, it worked!');

    }



    /**
     * Create a basic form from within the function
     */
    public function basicAction(Request $request)
    {

        $user = new User();
        $address = new Address();

        // Uses createFromBuilder()
        $form = $this->createFormBuilder($user)
            ->add('name', 'text')
            ->add('surname', 'text')
            ->add('city', 'text')
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database

            return $this->redirect($this->generateUrl('task_success'));
        }
            
            return $this->render('TestTestOneBundle:Default:basic.html.twig', array('form' => $form->createView()));
    }


    /**
     * Create a basic form from a class template
     */
    public function classAction(Request $request)
    {

        $user = new User();
        $user->getAddress()->add(new Address());

        //  Uses createForm()
        $form = $this->createForm(new First(), $user);


        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database

            return $this->redirect($this->generateUrl('task_success'));
        }
            
            return $this->render('TestTestOneBundle:Default:class.html.twig', array('form' => $form->createView()));
    }
}
