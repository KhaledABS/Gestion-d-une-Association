<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Evenement;

class EvenementController extends AbstractController
{
    /**
     * @Route("/events", name="evenements")
     */
    public function index()
    {
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
       /* $evenements = $this->getDoctrine()->getRepository(Evenement::class)->findBy([],['createdAt' => 'desc']);

*/
$evenements = $this->getDoctrine()->getRepository(Evenement::class)->findLatest();
        return $this->render('evenement/index.html.twig', [
            'evenements' => $evenements,
        ]);
    }
}
