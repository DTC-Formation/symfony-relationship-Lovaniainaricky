<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrainingResponseController extends AbstractController
{
    /**
     * @Route("/training/response", name="app_training_response")
     */
    public function index(): Response
    {
        return $this->render('training_response/index.html.twig', [
            'controller_name' => 'TrainingResponseController',
        ]);
    }

    /**
     * @Route("/telecharger_livre", name="download_book")
     */
    public function telechargerLivre() : BinaryFileResponse 
    {
        
        return $this->file("Film/Sans titre.jpg");
    }

    /**
     * @Route("/download_redirection", name="download_redirection")
     */
    public function telechargerRedirection() : RedirectResponse 
    {

        return $this->redirectToRoute('app_user_index');
    }

    /**
     * @Route("/telecharger_api", name="telecharger_api")
     */
    public function telechargerApi() : JsonResponse 
    {

        return $this->json(['id'=>rand(0, 5000)],200);
    }
}
