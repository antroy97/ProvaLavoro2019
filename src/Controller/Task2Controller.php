<?php
// src/Controller/Task2Controller.php
namespace App\Controller;

use App\Entity\Gruppo;
use App\Entity\Utenti;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class Task2Controller extends AbstractController
{

    /**
    * @Route("crea-utenti")
    */
    public function creaUtenti()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $group = new Gruppo();
        $group->setNome('gruppoProva'.rand(0,100000));

        $user1 = new Utenti();
        $user2 = new Utenti();
        $user3 = new Utenti();

        $user1->setNome('user1'.rand(0,100000))->setCognome('user1'.rand(0,100000))->setEmail('email1'.rand(0,100000))->setGruppo($group);
        $user2->setNome('user2'.rand(0,100000))->setCognome('user2'.rand(0,100000))->setEmail('email2'.rand(0,100000))->setGruppo($group);
        $user3->setNome('user3'.rand(0,100000))->setCognome('user3'.rand(0,100000))->setEmail('email3'.rand(0,100000))->setGruppo($group);

        $entityManager->persist($group);
        $entityManager->persist($user1);
        $entityManager->persist($user2);
        $entityManager->persist($user3);

        $entityManager->flush();
    
        return new Response('Saved new group with id '.$group->getId());
    }

    /**
    * @Route("prova-doctrine")
    */
    public function provaDoctrine(){

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        $user = $this->getDoctrine()
            ->getRepository(Utenti::class)
            ->getRandomUsers();
            
        return $this->render('task2.twig', [
            'user' => $user,
        ]);
        
    }

}
