<?php

namespace Test\TestOneBundle\Forms\Types;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class addressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', 'integer', array('label' => 'Number : '))
            ->add('street', 'text', array('label' => 'Street : '))
            ->add('town', 'text', array('label' => 'Town : '))
            ->add('postcode', 'text', array('label' => 'Postcode : '));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\TestOneBundle\Classes\Address',
        ));
    }

    public function getName()
    {
        return 'addressType';
    }
}
