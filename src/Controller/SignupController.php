<?php

namespace App\Controller;

use App\Constraints\EmailExists;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Constraint\Callback;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Constraint;

class SignupController extends AbstractController
{
    #[Route('/signup', name: 'app_signup')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createFormBuilder()
            ->add('username', TextType::class, ['required' => true])
            ->add('mail', EmailType::class, ['required' => true,
                'constraints' => [
                    new EmailExists()
                ]])
            ->add('password', RepeatedType::class, [
                'required' => true,
                'invalid_message' => 'The password fields must match.',
                'type' => PasswordType::class,
                'options' => ['attr' => ['class' => 'password-field']],
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password'],
                'constraints' => [
                    new NotBlank(),
                    new Type('string'),
                    new Length(['min' => 6, 'minMessage' => "Mot de passe de au moins 6 caractères"]),
                    //regex -> au moins 1 chiffre
                    new Regex([
                        'pattern' => '/\d+/i',
                    ]),
                    //regex -> au moins 1 caractere special
                    //liste [#?!@$%^&*-]
                    new Regex([
                        'pattern' => '/[#?!@$%^&*-]+/i',
                    ]),
                ]
                ])
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

    public function validatePassword($value) {
        $uppercase = preg_match('@[A-Z]@', $value);
        $lowercase = preg_match('@[a-z]@', $value);
        $number    = preg_match('@[0-9]@', $value);
        $specialChars = preg_match('@[^\w]@', $value);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($value) < 8) {
            return false;
        }
        else {
            return true;
        }
    }
}