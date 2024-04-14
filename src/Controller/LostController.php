<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LostController extends AbstractController
{

    #[Route('/lost', name: 'app_lost')]
    public function index(): Response
    {

        try {
            $content = file_get_contents("https://api.giphy.com/v1/gifs/random?api_key=" . $_ENV['APP_GIF_KEY'] . "&tag=i%27m+lost&rating=g");
            $response = json_decode($content, true);
            // dd($response['data']['images']['original']['url']);
            $url = $response['data']['images']['original']['url'];
            $bool = true;
        } catch (\Throwable $th) {
            $url = 'Une Erreur est survenue, Veuillez réesayer plus tard';
            $bool = false;
        }



        return $this->render('lost/index.html.twig', [
            'controller_name' => 'LostController',
            'bool' => $bool,
            'url' => $url,
        ]);
    }
}
