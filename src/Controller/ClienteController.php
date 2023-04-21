<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClienteController extends AbstractController
{
    #[Route('/cliente', name: 'app_cliente')]
    public function showCliente(EntityManagerInterface $doctrine, $id)
    {
        $repository = $doctrine->getRepository(Cliente::class);
        $cliente = $repository->find($id);

        return $this->render("index.html.twig", ["cliente"=>$cliente]);

    }
    
    public function index(): Response
    {
        return $this->render('cliente/index.html.twig', [
            'controller_name' => 'ClienteController',
        ]);
    }
}
