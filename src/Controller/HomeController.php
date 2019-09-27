<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\UserManager;

class HomeController extends AbstractController
{
    /**
     * @var UserManager
     */
    private $userManager;

    public function __construct(UserManager $userManager)
    {

        $this->userManager = $userManager;
    }

    /**
     * @Route("/{_locale}/", name="home",
     *     requirements={"_locale"="fr|en"})
     */
    public function Find2LastAnnouncements() : Response
    {
        $theAnnoucements = $this->userManager->Find2LastAnnoucements(2);
        return $this->render('Annoucements/Home.html.twig', [
            'controller_name' => 'HomeController',
            'theAnnoucements' => $theAnnoucements
        ]);
    }

}