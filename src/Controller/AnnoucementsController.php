<?php


namespace App\Controller;

use App\Entity\Annoucements;
use App\Repository\AnnoucementsRepository;
use App\Services\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnoucementsController extends AbstractController
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
     * @Route("/{_locale}/annoucements/{page}", name="annoucements",
     *     requirements={"page"="\d+"},
     *     requirements={"_locale"="fr|en"},
     *     defaults={"page"="1"})
     */
    public function list(): Response
    {
        $theAnnoucements = $this->userManager->FindAnnoucements();
        dump($theAnnoucements);

        return $this->render('Annoucements/annoucements.html.twig', [
            'controller_name' => 'Annoucements',
            'theAnnoucements' => $theAnnoucements
        ]);
    }

}