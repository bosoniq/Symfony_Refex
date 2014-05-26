<?php

namespace Test\TestTwoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Test\TestStoreBundle\Form\UserType;
use Test\TestStoreBundle\Form\AddressType;
use Test\TestStoreBundle\Form\PersonalType;

class AllType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', 'collection', array('type' => new UserType()))
            ->add('address', 'collection', array('type' => new AddressType()))
            ->add('personal', 'collection', array('type' => new PersonalType()))

            ->add('save', 'submit');
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\TestTwoBundle\Entity\All',
        ));
    }


    public function getName()
    {
        return 'all';
    }
}
