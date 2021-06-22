<?php

namespace App\Form;

use App\Entity\Equipement;
use App\Entity\GiteSearch;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class GiteSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'minSurface',
                IntegerType::class,
                [
                    'required' => false,
                    'label' => 'Surface Minimum'
                ]
            )
            ->add(
                'minBedroom',
                IntegerType::class,
                [
                    'required' => false,
                    'label' => 'Nombre de chambre minimum'
                ]
            )
            ->add(
                'maxPrice',
                IntegerType::class,
                [
                    'required' => false,
                    'label' => 'Prix maximum'
                ]
            )
            //selecteur animal
            ->add(
                'accueilAnimal',
                CheckboxType::class,
                [
                    'required' => false,
                    'label' => 'Animaux Accepté'
                ]

            )
            //selecteur equipement
            ->add(
                'equipements',
                EntityType::class,
                [
                    'class' => Equipement::class,
                    'required' => false,
                    'label' => false,
                    'expanded' => true,
                    'choice_label' => 'name',
                    'multiple' => true,
                ]
            )
            ->add(
                'submit',
                SubmitType::class
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GiteSearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
