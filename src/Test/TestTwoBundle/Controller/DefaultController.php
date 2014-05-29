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


    /**
     * Write user supplied information to the database by setting it directly into 
     * Doctrine Entities and then persisting.  
     * 
     * This is done via an intermediatory entity called All() which accepts the 
     * initialised entities and then writes data from the AllType() to them.  
     * 
     * AllType is a skeleton type form which mearly brings together other forms 
     * generated from the Doctrine entities
     */
    public function indexAction(Request $request)
    {

        // Initialise All() and pass in empty objects ready to store the supplied datas
        $all = new All();
        $all->getUser()->add(new User());
        $all->getAddress()->add(new Address());
        $all->getPersonal()->add(new Personal());

        //  Create Form
        $form = $this->createForm(new AllType(), $all);

        $form->handleRequest($request);

        if ($form->isValid()) {

            //  Update both sides of the Bi-directional OneToOne
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
            // Display Form
            return $this->render('TestTestTwoBundle:Default:index.html.twig', array('form' => $form->createView()));

    }


    /**
     * Use the Bi-Directional relationship between the User and Address identities
     * to query the database by User ID and fetch the relevant information about 
     * the corresponding user address at the same time.  Display it in the same t
     * emplate as fetching the same information by querying the address table.
     */
    public function fetchUserAction()
    {

        $id = 3;
        
        $repo = $this->getDoctrine()->getRepository('Test\TestStoreBundle\Entity\User');
        $user = $repo->find($id);

        $array = array(
            'id' => $user->getId(),
            'firstname' => $user->getFirstname(),
            'surname' => $user->getSurname(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'number' => $user->getAddress()->getNumber(),
            'street' => $user->getAddress()->getStreet(),
            'town' => $user->getAddress()->getTown(),
            'postcode' => $user->getAddress()->getPostcode()
            );

        return $this->render('TestTestTwoBundle:Default:fetch.html.twig', $array);

    }



    /**
     * Use the Bi-Directional relationship between the User and Address identities
     * to query the database by Address ID and fetch the relevant information about 
     * the owning user at the same time.  Display it in the same template as fetching the
     * same information by querying the user table.
     */
    public function fetchAddressAction()
    {

        $id = 2;
        
        $repo = $this->getDoctrine()->getRepository('Test\TestStoreBundle\Entity\Address');
        $address = $repo->find($id);

        $array = array(
            'id' => $address->getId(),
            'firstname' => $address->getUser()->getFirstname(),
            'surname' => $address->getUser()->getSurname(),
            'email' => $address->getUser()->getEmail(),
            'password' => $address->getUser()->getPassword(),
            'number' => $address->getNumber(),
            'street' => $address->getStreet(),
            'town' => $address->getTown(),
            'postcode' => $address->getPostcode()
            );

        return $this->render('TestTestTwoBundle:Default:fetch.html.twig', $array);

    }
}
