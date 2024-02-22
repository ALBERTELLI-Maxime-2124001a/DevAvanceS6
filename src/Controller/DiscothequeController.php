<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Chanson;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ChansonRepository;

class DiscothequeController extends AbstractController
{
    public function __construct(public EntityManagerInterface $entityManager){

    }

    #[Route('/discotheque', name: 'app_discotheque')]
    public function displayDisco(Request $request): Response
    {
        $selection = null;
        $form = $this->createFormBuilder()
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Tout' => "tout",
                    'Artiste' => "artiste",
                    'Album' => "album",
                    'Chanson' => "chanson"
                ],
            ])
            ->add('submit', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            return $this->render('signup/index.html.twig', [
                'type' => $selection,
                'chansons' => $this->entityManager->getRepository(Chanson::class)->findAll(),
                'artistes' => $this->entityManager->getRepository(Artist::class)->findAll(),
                'albums' => $this->entityManager->getRepository(Album::class)->findAll(),
                'form' => $form
            ]);
        }

        return $this->render('discotheque/index.html.twig', [
            'type' => "tout",
            'chansons' => $this->entityManager->getRepository(Chanson::class)->findAll(),
            'artistes' => $this->entityManager->getRepository(Artist::class)->findAll(),
            'albums' => $this->entityManager->getRepository(Album::class)->findAll(),
            'form' => $form
        ]);

    }
}
