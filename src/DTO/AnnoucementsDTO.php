<?php


namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class AnnoucementsDTO
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(max = 100)
     */
    public $title;
    /** @Assert\NotNull() */
    public $content;
    /** @Assert\Type("double") */
    public $price;
    /** @Assert\Type("datetime") */
    public $DateAt;

}