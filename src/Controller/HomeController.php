<?php

namespace App\Controller;

use App\Api\ApiRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $form = $this->createFormBuilder()
            ->add('search', TextType::class)
            ->add('send', SubmitType::class, ['label' => 'Search'])
            ->getForm();

        if ($form->isSubmitted() && $form->isValid()) {
            $fruit = $form->get('search')->getData();
            $search = $this->searchApi("https://api.discogs.com/database/search?q=Banana&key=".$_ENV['CONSUMER_KEY']."&secret=".$_ENV['CONSUMER_SECRET_KEY']);
        }

        return $this->render('home/index.html.twig', [
            'form'=>$form
        ]);
    }

    private function searchApi(String $url): array
    {
        $apiRequest = new ApiRequest();
        return $apiRequest->apiRequest($url);
    }
}
