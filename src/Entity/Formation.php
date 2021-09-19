<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $type;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $NbBlocs;

    /**
     * @ORM\Column(type="integer")
     */
    private $PriceMin;

    /**
     * @ORM\Column(type="integer")
     */
    private $PriceMax;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $documentPDF;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished;

    /**
     * @ORM\ManyToOne(targetEntity=Block::class, cascade={"persist", "remove"})
     */
    private $blocks;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNbBlocs(): ?int
    {
        return $this->NbBlocs;
    }

    public function setNbBlocs(int $NbBlocs): self
    {
        $this->NbBlocs = $NbBlocs;

        return $this;
    }
    
    public function getPriceMin(): ?int
    {
        return $this->PriceMin;
    }

    public function setPriceMin(int $PriceMin): self
    {
        $this->PriceMin = $PriceMin;

        return $this;
    }

    public function getPriceMax(): ?int
    {
        return $this->PriceMax;
    }

    public function setPriceMax(int $PriceMax): self
    {
        $this->PriceMax = $PriceMax;

        return $this;
    }

    public function getDocumentPDF(): ?string
    {
        return $this->documentPDF;
    }

    public function setDocumentPDF(string $documentPDF): self
    {
        $this->documentPDF = $documentPDF;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getBlocks(): ?Block
    {
        return $this->blocks;
    }

    public function setBlocks(?Block $block): self
    {
        $this->blocks = $block;

        return $this;
    }
     
}
