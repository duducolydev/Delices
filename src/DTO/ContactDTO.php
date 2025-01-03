<?php
namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ContactDTO
{
    #[Assert\NotBlank()]
    #[Assert\Length(min: 5, max:200)]
    public string $name = '';

    #[Assert\NotBlank()]
    #[Assert\Email()]
    public string $email = '';

    #[Assert\NotBlank()]
    #[Assert\Length(min: 5, max:200)]
    public string $message = '';

    #[Assert\NotBlank()]
    public string $service = '';

}