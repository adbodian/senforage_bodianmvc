<?php

namespace App\Form;

use App\Entity\Facture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('num_compteur')
            ->add('nom_abn')
            ->add('date_facture')
            ->add('anc_consommation')
            ->add('nouv_consommation')
            ->add('solde')
            ->add('solde_anterieur')
            ->add('total_facture')
            ->add('date_limite_paiement')
            ->add('abonne')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Facture::class,
        ]);
    }
}
