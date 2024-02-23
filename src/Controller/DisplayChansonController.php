<?php

namespace App\Controller;

use App\Entity\Chanson;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DisplayChansonController extends AbstractController
{
    public function __construct(public EntityManagerInterface $entityManager){
    }

    #[Route('/display/chanson/{id}', name: 'app_display_chanson')]
    public function index(Request $request): Response
    {
        $idChanson = $request -> get('id');
        return $this->render('display_chanson/index.html.twig', [
            'chanson' => $this->entityManager->getRepository(Chanson::class)->find($idChanson),
        ]);
    }
}
