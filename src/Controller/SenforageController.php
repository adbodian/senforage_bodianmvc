<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\Abonne;
use App\Repository\AbonneRepository;
use App\Form\AbonneType;

use App\Entity\Facture;
use App\Repository\FactureRepository;
use App\Form\FactureType;



class SenforageController extends Controller
{
    /**
     * @Route("/senforage", name="senforage")
     */
    public function index()
    {
       $repo = $this->getDoctrine()->getRepository(Abonne::class);
        $abonnes = $repo->findAll();
        return $this->render('senforage/index.html.twig', [
            'controller_name' => 'SenforageController',
            'abonnes' => $abonnes
        ]);
    }
    /**
     *  @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('senforage/home.html.twig');

    }
     
     /**
     *  @Route("/senforage/new_abn", name="abonne_create")
     *  @Route("/senforage/{id}/edit", name="abonne_edit")
     */
    public function form1(Abonne $abonne = null, Request $request, ObjectManager $manager)
    {
        if(!$abonne){
            $abonne = new Abonne();
        }
       $form = $this->createForm(AbonneType::class, $abonne);
       $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if($abonne->getId()){

            }
            $manager->persist($abonne);
            $manager->flush();
        return $this->redirectToRoute('abonne_show', ['id' => $abonne->getId()]);
        }
    return $this->render('senforage/create.html.twig', [
        'formAbonne' => $form->createView(),
        'editMode' => $abonne->getId() !== null
    ]);
        
    }

    /**
     *  @Route("/senforage/new_fact", name="facture_create")
     *  @Route("/senforage/{id}/edit", name="facture_edit")
     */
    public function form2(Facture $facture = null, Request $request, ObjectManager $manager)
    {
        if(!$facture){
            $facture = new Facture();
        }
       $form = $this->createForm(FactureType::class, $facture);
       $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if($facture->getId()){

            }
            $manager->persist($facture);
            $manager->flush();
           return $this->redirect('ok');
        }
    return $this->render('senforage/create_fact.html.twig', [
        'formFacture' => $form->createView(),
        'editMode' => $facture->getId() !== null
    ]);
        
    }



    /**
     *  @Route("/senforage/{id}", name="abonne_show")
     */
    public function show($id)
    {
        $repo = $this->getDoctrine()->getRepository(Abonne::class);
        $abonne = $repo->find($id);
        return $this->render('senforage/show.html.twig', [
            'abonne' => $abonne
        ]);
    }

    
  

}





