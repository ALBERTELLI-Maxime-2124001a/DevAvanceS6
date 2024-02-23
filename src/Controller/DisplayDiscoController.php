<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Chanson;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DisplayDiscoController extends AbstractController
{
    public function __construct(public EntityManagerInterface $entityManager){

    }

    #[Route('/displayDisco/{type}', name: 'app_display_disco')]
    public function index(Request $request): Response
    {

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
            $data = $form ->getData();
            $selection = $data['type'];
            return $this->redirectToRoute('app_display_disco',array(
                'type'=>$selection
            ));
        }

        $typeShow = $request -> get('type');

        return $this->render('display_disco/index.html.twig', [
            'type'=> $typeShow,
            'chansons' => $this->entityManager->getRepository(Chanson::class)->findAll(),
            'artistes' => $this->entityManager->getRepository(Artist::class)->findAll(),
            'albums' => $this->entityManager->getRepository(Album::class)->findAll(),
            'typeSelect' => $form
        ]);
    }
}
