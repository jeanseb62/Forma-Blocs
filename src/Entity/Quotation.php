<?php

namespace App\Entity;

use App\Repository\QuotationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuotationRepository::class)
 */
class Quotation
{
    const SUCCES_REGISTRY = "Votre demande de devis a été bien envoyé !";
    const ERROR_REGISTRY = "Désolé, votre demande de devis n'a pas pu être envoyé !";

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstName;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberStreet;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $zip;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $country;

    

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;


    /**
     * @ORM\Column(type="text")
     */
    private $message;


    

    /**
     * @ORM\Column(type="array")
     */
    private $status = [];

    /**
     * @ORM\Column(type="array")
     */
    private $benefit = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $SendByEmail = [];

    /**
     * @ORM\Column(type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getNumberStreet(): ?int
    {
        return $this->numberStreet;
    }

    public function setNumberStreet(int $numberStreet): self
    {
        $this->numberStreet = $numberStreet;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }


    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
 
    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getStatus(): ?array
    {
        return $this->status;
    }

    public function setStatus(array $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getBenefit(): ?array
    {
        return $this->benefit;
    }

    public function setBenefit(array $benefit): self
    {
        $this->benefit = $benefit;

        return $this;
    }

    public function getSendByEmail(): ?array
    {
        return $this->SendByEmail;
    }

    public function setSendByEmail(?array $SendByEmail): self
    {
        $this->SendByEmail = $SendByEmail;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }


}
