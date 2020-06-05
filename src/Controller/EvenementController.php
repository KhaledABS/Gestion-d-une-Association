<?php

namespace App\Controller;
use App\Entity\Evenement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\EvenementRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class EvenementController extends AbstractController
{
    /*
    /**
     * @Route("/events", name="evenements")
     
    public function index()
    {
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
       /* 
       $evenements = $this->getDoctrine()->getRepository(Evenement::class)->findBy([],['createdAt' => 'desc']);

        
        $evenements = $this->getDoctrine()->getRepository(Evenement::class)->findLatest();
        return $this->render('evenement/index.html.twig', [
            'evenements' => $evenements,
        ]);
    }
*/

    /*
    /**
     * @Route("/events", name="evenements", methods={"GET"})
     * @return Response
     
    public function index(EvenementRepository $evenementRepository): Response
    {
        return $this->render('evenement/index.html.twig', [
            'evenements' => $evenementRepository->findAll(),
        ]);
    }
    */
    /* /**
     * @Route("/events/{id}", name="evenements_show", methods={"GET"})
     
    public function show(Evenement $evenements): Response
    {
        return $this->render('evenement/show.html.twig', [
            'evenements' => $evenements,
        ]);
    } */
    
    /**
     * @Route("/events", name="evenements")
     */
    public function index(EvenementRepository $evenementRepository): Response
    {
        return $this->render('evenement/index.html.twig',[
            'evenements' => $evenementRepository->findAll(),

            
        ]);
    }


    /**
     * @Route("/events/{slug}-{id}",name="evenements_show", requirements={"slug": "[a-z 0-9\-]*"})
     * @param Evenement $evenements
     * @return Response
     */

    public function show(Evenement $evenements,string $slug): Response
    {
        if($evenements->getSlug()!==$slug)
        {
            return $this->redirectToRoute('evenements_show',[
                'id'=> $evenements->getId(),
                'slug'=> $evenements->getSlug()

            ],301);

        }
        return $this->render('evenement/show.html.twig',[
            'Evenement'=>$evenements,
            'current_menu'=> 'evenements'
        ]);
    }
}
