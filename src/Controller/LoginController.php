<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('username', TextType::class)
            ->add('password', PasswordType::class)
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $data = $form->getData();
            $userRepository = $entityManager->getRepository(User::class);
            $existingUser = $userRepository->findOneBy(['pseudo' => $data['username']]);
            ;
            if (password_verify($data['password'], $existingUser->getMdp())) {
                $_SERVER['username'] = 'r';
                return $this->redirectToRoute('app_home');
            }
        }

        return $this->render('login/index.html.twig', [
            'form' => $form
            ]);
    }
}
