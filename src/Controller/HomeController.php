<?php

namespace App\Controller;

use App\Entity\ErrorCode;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $em): Response
    {
        $codes = $em->getRepository(ErrorCode::class)->findAll();
        $http_codes = [];

        foreach ($codes as $key => $value) {
            array_push($http_codes, $value->getCode());
        }

        /**
         * le site utilise l'id de la base de données et non pas le code erreur pour la comparaison, l'url n'est donc pas conforme à la consigne 
         * 
         */
        return $this->render('home/index.html.twig', [
            'codes' => $http_codes,

        ]);
    }
}
