<?php

namespace App\Form;

use App\Entity\Equipement;
use App\Entity\Gite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class GiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address', TextType::class, [
                'required' => false
            ])
            ->add('superficy', NumberType::class, [
                'required' => false
            ])
            ->add('bedroom', NumberType::class, [
                'required' => false
            ])
            ->add('nbBed', NumberType::class, [
                'required' => false
            ])
            ->add('animals', CheckboxType::class, [
                'required' => false
            ])
            ->add('priceAnimals', NumberType::class, [
                'required' => false
            ])
            ->add('priceHightSeason', NumberType::class, [
                'required' => false
            ])
            ->add('priceLowSeason', NumberType::class, [
                'required' => false
            ])
            ->add('name', TextType::class, [
                'required' => false
            ])
            ->add('descript', TextareaType::class, [
                'required' => false
            ])
            ->add('equipements', EntityType::class, [
                'class' => Equipement::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}
