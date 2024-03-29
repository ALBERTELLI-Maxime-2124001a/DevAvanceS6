<?php

namespace App\Controller;

use App\Api\ApiRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
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

        return $this->render('home/index.html.twig', [
            'form'=>$form
        ]);
    }
}
