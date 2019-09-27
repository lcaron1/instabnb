<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Services\RegistrationManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @var RegistrationManager
     */
    private $registrationManager;


    public function  __construct(RegistrationManager $registrationManager)
    {
        $this->registrationManager = $registrationManager;
    }
    /**
     * @Route("/registration", name="registration")
     */
    public function index(Request $request) :Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->registrationManager->save($user);

            return  $this->redirectToRoute('home');
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'RegistrationController',
        ]);
    }
}
