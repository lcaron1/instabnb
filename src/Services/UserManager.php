<?php


namespace App\Services;


use App\DTO\AnnoucementsDTO;
use App\Repository\AnnoucementsRepository;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Annoucements;

class UserManager
{
    /**
     * @var AnnoucementsRepository
     */
    private $annoucementsRepository;
    /**
     * @var ObjectManager
     */
    private $objectManager;

    public function  __construct(AnnoucementsRepository $annoucementsRepository , ObjectManager $objectManager)
    {
        $this->annoucementsRepository = $annoucementsRepository;
        $this->objectManager = $objectManager;
    }
    public function save(AnnoucementsDTO $AnnoucementsDTO)
    {
        $this->objectManager->persist(new Annoucements($AnnoucementsDTO));
        $this->objectManager->flush();

    }
    public function FindAnnoucements() :array
    {
        return $this->annoucementsRepository->FindAnnouncements();
    }
    public function Find2LastAnnoucements($limit) :array
    {
        return $this->annoucementsRepository->Find2LastAnnouncements($limit);

    }
    public function FindMoreAnnouncements($id) :array
    {
        return $this->annoucementsRepository->FindMoreAnnouncements($id);
    }

}