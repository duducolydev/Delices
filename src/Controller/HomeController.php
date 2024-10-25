<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $em, UserPasswordHasherInterface $hasher) : Response {
        /*
        $user = new User();
        $user->setEmail('du@du.sn')
             ->setUsername('Dudu Coly')
             ->setPassword($hasher->hashPassword($user, '0000'))
             ->setRoles(['ROLE_USER'])
             ->setVerified('true');
        $em->persist($user);
        $em->flush();
        */
        return $this->render('home/index.html.twig');
    }
}
