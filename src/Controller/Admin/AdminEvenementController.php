<?php
namespace App\Controller\Admin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminEvenementController extends AbstractController

{
    /**
     * @var EvenementRepository;
     */
    public function __construct(EvenementRepository $event)
    {
        $this->repository= $event;
    }
}