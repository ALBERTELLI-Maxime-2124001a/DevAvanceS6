<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SignupController extends AbstractController
{
    #[Route('/signup', name: 'app_signup')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createFormBuilder()
            ->add('username', TextType::class, ['required' => true])
            ->add('mail', EmailType::class, ['required' => true])
            ->add('password', RepeatedType::class, [
                'required' => true,
                'invalid_message' => 'The password fields must match.',
                'type' => PasswordType::class,
                'options' => ['attr' => ['class' => 'password-field']],
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password'],])
            ->add('submit', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $user = new User($data['mail'], $data['username'], password_hash($data['password'][0], PASSWORD_DEFAULT));
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        }

        return $this->render('signup/index.html.twig', [
            'form' => $form
        ]);
    }
}