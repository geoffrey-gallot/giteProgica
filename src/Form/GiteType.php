<?php

namespace App\Form;

use App\Entity\Gite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address')
            ->add('superficy')
            ->add('bedroom')
            ->add('nbBed')
            ->add('animals')
            ->add('priceAnimals')
            ->add('priceHightSeason')
            ->add('priceLowSeason')
            ->add('name')
            ->add('descript')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}
