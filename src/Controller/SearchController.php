<?php

namespace App\Controller;

use App\Api\ApiRequest;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SearchController extends AbstractController
{
    #[Route('/search/{f}', name: 'app_search')]
    public function index(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('search', TextType::class)
            ->add('send', SubmitType::class, ['label' => 'Search'])
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fruit = $form->get('search')->getData();
            return $this->redirectToRoute('app_search', array('f' => $fruit));
        }


        $search = $this->searchApi("https://api.discogs.com/database/search?q=".$request->get('f')."&key=".$_ENV['CONSUMER_KEY']."&secret=".$_ENV['CONSUMER_SECRET_KEY']);
        return $this->render('search/index.html.twig', [
            'searchs'=>$search['results'],
            'form'=>$form
        ]);
    }

    private function searchApi(String $url): array
    {
        $apiRequest = new ApiRequest();
        return $apiRequest->apiRequest($url);
    }
}
