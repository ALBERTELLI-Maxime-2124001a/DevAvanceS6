<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Chanson;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DisplayAlbumController extends AbstractController
{
    public function __construct(public EntityManagerInterface $entityManager){
    }
    #[Route('/display/album/{id}', name: 'app_display_album')]
    public function index(Request $request): Response
    {
        $idAlbum = $request -> get('id');
        return $this->render('display_album/index.html.twig', [
            'album' => $this->entityManager->getRepository(Album::class)->find($idAlbum),
        ]);
    }
}
