<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\SearchDiscogs;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $search = new SearchDiscogs();

        $form = $this->createFormBuilder($search)
            ->add('search', TextType::class)
            ->add('send', SubmitType::class, ['label' => 'Search'])
            ->getForm();

        return $this->render('home/index.html.twig', [
            'form'=>$form,
        ]);
    }
}