<?php


namespace App\Controller;

use App\DTO\AnnoucementsDTO;
use App\Form\AnnoucementsTYPE;
use App\Services\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailAnnoucementsController extends AbstractController
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
     * @Route("/{_locale}/annoucements/detail/{id}", name="detail",
     *     requirements={"_locale"="fr|en"},
     *     requirements={"id"="[0-9]+"})
     */
    public function Detail(int $id): Response
    {
        $theAnnoucements = $this->userManager->FindMoreAnnouncements($id);
        return $this->render('Annoucements/Detail.html.twig', [
            'controller_name' => 'DetailAnnoucementsController',
            'theAnnoucements' => $theAnnoucements,
        ]);
    }

}