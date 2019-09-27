<?php


namespace App\Controller;


use App\Services\UserManager;
use App\Entity\Annoucements;
use App\DTO\AnnoucementsDTO;
use App\Form\AnnoucementsTYPE;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AnnoucementsAddController extends AbstractController
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
     * @Route("/{_locale}/annoucements/add",
     *     requirements={"_locale"="fr|en"},
     *     name="add")
     */
    public function Create(Request $request)
    {
        $AnnoucementsDTO = new AnnoucementsDTO();
        $form = $this->createForm(AnnoucementsTYPE::class, $AnnoucementsDTO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->userManager->save($AnnoucementsDTO);
            return $this->redirectToRoute('home');

        }
        return $this->render('Annoucements/Add.html.twig', [
            'controller_name' => 'Create',
            'form' => $form->createView(),
        ]);
    }



}