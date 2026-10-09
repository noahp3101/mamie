<?php

namespace App\Controller;

use App\Form\AjoutCafeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;



final class BaseController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [

        ]);
    }
    #[Route('/ajoutCafe', name: 'app_ajoutCafe')]
    public function ajoutCafe(Request $request, EntityManagerInterface $em): Response
    {
        $contact = new Contact();
        $form = $this->createForm(AjoutCafeType::class,  $contact);
        return $this->render('base/ajoutCafe.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
