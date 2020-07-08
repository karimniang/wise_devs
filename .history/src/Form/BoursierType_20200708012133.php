<?php

namespace App\Form;

use App\Entity\Boursier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BoursierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', null, [
                'required' => false
            ])
            ->add('montant', null, [
                'required' => false
            ])
            ->add('isHoused', null, [
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Boursier::class,
        ]);
    }
}
