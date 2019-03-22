<?php

// src/Controller/Task1Controller.php

namespace App\Controller;

use App\Entity\Gruppo;
use App\Entity\Utenti;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class Task1Controller extends AbstractController
{
    /**
    * @Route("prova-twig/{name}")
    */
    public function provaTwig($name)
    {
        return $this->render('prova-twig.twig', [
            'name' => $name,
        ]);
    }

}
