<?php

namespace Test\TestOneBundle\Forms\Types;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class First extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Random Name : '))
            ->add('surname', 'text', array('label' => 'Funky Surname : '))
            ->add('city', 'text', array('label' => 'Far off place : '))

            //  This line adds another form type class which uses a different
            //  storage class than that of the rest of this form.
            ->add('address', 'collection', array('type' => new addressType()))

            ->add('save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\TestOneBundle\Classes\User',
        ));
    }

    public function getName()
    {
        return 'first';
    }
}
