<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(): Response
    {
        $form = $this->createFormBuilder()
            ->add('username', TextType::class)
            ->add('password', TextType::class)
            ->add('submit', SubmitType::class, ['label' => 'Valider'])
            ->getForm();

        return $this->render('login/index.html.twig', [
            'form' => $form
        ]);
    }
}
