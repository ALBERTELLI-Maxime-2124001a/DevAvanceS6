<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DisplayArtistController extends AbstractController
{
    #[Route('/display/artist', name: 'app_display_artist')]
    public function index(): Response
    {
        return $this->render('display_artist/index.html.twig', [
            'controller_name' => 'DisplayArtistController',
        ]);
    }
}
