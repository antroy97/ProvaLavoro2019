<?php

// src/Controller/Task3Controller.php

namespace App\Controller;


use App\Service\RandomService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class Task3Controller extends AbstractController
{
    /**
    * @Route("prova-symfony")
    */
    public function data()
    {
        $r = new RandomService();
        return $this->render('prova-symfony.twig',['number' => $r->getRandom()]);
    }

}
