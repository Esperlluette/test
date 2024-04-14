<?php

namespace App\Controller;

use App\Entity\ErrorCode;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HttpCodeController extends AbstractController
{
    #[Route('/$', name: 'app_http_code')]
    public function index(EntityManagerInterface $em): Response
    {
        if (!isset($_GET['http_code'])) {
            return $this->redirectToRoute('app_home');
        }
        $codes = $em->getRepository(ErrorCode::class)->findAll();
        $http_codes = [];

        foreach ($codes as $key => $value) {
            array_push($http_codes, $value->getCode());
        }
        $output_message = [];
        array_push($output_message, "No correspondance");
        foreach ($codes as $key => $value) {
            if ($_GET['http_code'] === $value->getCode()) {
                $output_message = [];
                array_push($output_message, $value->getCode(), $value->getTag(), $value->getMessage());
            }
            /**
             * je dois check si le $_GET['http_code'] est pareil que le $value->getHttpCode()
             * 
             * si oui alors j'ajoute le code et le message dans output 
             */
        }

        /**
         * J'ai : 
         * - un code dans la base de données. 
         * - un code dans le $_GET
         * 
         * si les deux correspondent j'affiche le message correspondant au code. 
         */

        return $this->render('http_code/index.html.twig', [
            'controller_name' => 'ErrorController',
            'output_message' => $output_message,
            'codes' => $http_codes,
        ]);
    }
}
