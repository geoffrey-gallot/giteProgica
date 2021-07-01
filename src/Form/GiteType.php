<?php

namespace App\Form;

use App\Entity\Gite;


use App\Entity\Service;
use App\Entity\Equipement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class GiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', FileType::class, [
                "required" => false,    
            ])
            ->add('address', TextType::class, [
                'required' => false,
            ])
            ->add('superficy', IntegerType::class, [
                'required' => false,
            ])
            ->add('bedroom', IntegerType::class, [
                'required' => false,
            ])
            ->add('nbBed', IntegerType::class, [
                'required' => false,
            ])
            ->add('animals', CheckboxType::class, [
                'required' => false,
            ])
            ->add('priceAnimals', NumberType::class, [
                'required' => false,
            ])
            ->add('priceHightSeason', NumberType::class, [
                'required' => false,
            ])
            ->add('priceLowSeason', NumberType::class, [
                'required' => false,
            ])
            ->add('name', TextType::class, [
                'required' => false,
            ])
            ->add('descript', TextareaType::class, [
                'required' => false,
            ])
            ->add('equipements', EntityType::class, [
                'class' => Equipement::class,
                'required' => false,
                'label' => false,
                'expanded' => true,
                'choice_label' => 'name',
                'multiple' => true,
            ])
            ->add('services', EntityType::class, [
                'class' => Service::class,
                'required' => false,
                'label' => false,
                'expanded' => true,
                'choice_label' => 'name',
                'multiple' => true,
            ])
            ->add('city', TextType::class, [
                'required' => false,
            ])
            ->add('postalCode', TextType::class, [
                'required' => false,
            ])
            ->add('lat', HiddenType::class)
            ->add('lng', HiddenType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}
