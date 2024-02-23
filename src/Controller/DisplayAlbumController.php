<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DisplayAlbumController extends AbstractController
{
    #[Route('/display/album', name: 'app_display_album')]
    public function index(): Response
    {
        return $this->render('display_album/index.html.twig', [
            'controller_name' => 'DisplayAlbumController',
        ]);
    }
}
