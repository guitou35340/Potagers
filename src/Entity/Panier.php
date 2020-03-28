<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PanierRepository")
 */
class Panier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbArticles;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $total;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LignePanierCommande", mappedBy="panier")
     */
    private $lignePanierCommande;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Client", cascade={"persist", "remove"})
     */
    private $client;

    public function __construct()
    {
        $this->lignePanierCommande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbArticles(): ?int
    {
        return $this->nbArticles;
    }

    public function setNbArticles(?int $nbArticles): self
    {
        $this->nbArticles = $nbArticles;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(?int $total): self
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return Collection|LignePanierCommande[]
     */
    public function getLignePanierCommande(): Collection
    {
        return $this->lignePanierCommande;
    }

    public function addLignePanierCommande(LignePanierCommande $lignePanierCommande): self
    {
        if (!$this->lignePanierCommande->contains($lignePanierCommande)) {
            $this->lignePanierCommande[] = $lignePanierCommande;
            $lignePanierCommande->setPanier($this);
        }

        return $this;
    }

    public function removeLignePanierCommande(LignePanierCommande $lignePanierCommande): self
    {
        if ($this->lignePanierCommande->contains($lignePanierCommande)) {
            $this->lignePanierCommande->removeElement($lignePanierCommande);
            // set the owning side to null (unless already changed)
            if ($lignePanierCommande->getPanier() === $this) {
                $lignePanierCommande->setPanier(null);
            }
        }

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
