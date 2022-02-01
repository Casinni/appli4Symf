<?php

namespace App\Controller;
use App\Entity\Personne;
use App\Form\PersonneType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class AdminController extends AbstractController
{
    /**
     * @Route("/insert", name="insert")
     */
    public function insert(Request $request)
    {
           $pers=new Personne();
           $formPersonne=$this->createForm(PersonneType::class,$pers);
           $formPersonne->add('creer',SubmitType::class,array('label'=>'Ajouter une personne','validation_groups'=>array('registration','all')));

           //la méthode handleResquest() permet de récupérer les données de l'entité associée
           $formPersonne->handleRequest($request);
           /* $form=$this->createFormbuilder()
                ->add('nom',TextType::class)
                ->add('prenom',TextType::class)
                ->add('dateNaiss',DateType::class)
                ->add('email',EmailType::class)
                ->add('login',TextType::class)
                ->add('Enregistrer',SubmitType::class,
                    ['label'=>'Enregistrer la personne'])
                    ->getForm();*/

        //la méthode isValid controle que toutes données du formulaire vérifient les contraintes
        if($request->isMethod('post') && $formPersonne->isValid()){
            //récupération de l'entityManager pour insérer les données en bdd
            $em=$this->getDoctrine()->getManager();
           /* $validator=$this->get('validator');
            $listeErrors=$validator->validate($pers);
            if(count($listeErrors)>0){
                return new Response((string) $listeErrors);
            }*/
            $em->persist($pers);
            //insertion en bdd
            $em->flush();
            $session=$request->getSession();
            //Message flashbag , variable message
          $session->getFlashBag()->add('message','une nouvelle personne a été ajoutée');
          //variable statut pour la classe bootstrap
          $session->set('statut','success');
          return $this->redirect($this->generateUrl('liste'));
          //  return new JsonResponse($request->request->all());
        }

        return $this->render("admin/create.html.twig",array('my_form'=>$formPersonne->createView()));

    }

    /**
     * @Route("/update/{id}", name="update")
     */
    public function update(Request $request,$id)
    {
         //récupération de l'entityManager pour l'acces aux données en bdd
        $em=$this->getDoctrine()->getManager();
        //récupération du repository
        $persRepository=$em->getRepository(Personne::class);
        //requete de selection
        $pers=$persRepository->find($id);

        
    //création du formulaire à partir du form Personne
        $formPers= $this->createForm(PersonneType::class,$pers);

        // ajoute un bouton submit
        
        $formPers->add('creer', SubmitType::class,array(
            'label'=>'Mise à jour de la personne',
            'validation_groups'=>array('all')    
        ));
        //la méthode handleResquest() permet de récupérer les données de l'entité associée
         $formPers->handleRequest($request);
        
         if($request->isMethod('post') && $formPers->isValid() ){
           
            // update en bdd
           
            $em->persist($pers);                        
            $em->flush();
            //session  pour flashBag- message information 
            $session=$request->getSession();
            $session->getFlashBag()->add('message','la personne a été mise à jour');
            $session->set('statut','success');
            return $this->redirect($this->generateUrl('liste'));
         }
         return $this->render("admin/create.html.twig",array('my_form'=>$formPers->createView()));

    }

    /**
    * @Route("/delete/{id}", name="delete")
    */
    public function delete(Request $request,$id)
    {
         //récupération du Manager  et du repository pour accéder à la bdd
        $em=$this->getDoctrine()->getManager();
        $persRepository=$em->getRepository(Personne::class);
          //requete de selection
        $pers=$persRepository->find($id);
        //suppression de l'entity
        $em->remove($pers);
        $em->flush();
        //session  pour flashBag- message information 
        $session=$request->getSession();
        $session->getFlashBag()->add('message','La personne a été supprimée');
        $session->set('statut','success');
        return $this->redirect($this->generateUrl('liste'));
    }
}
