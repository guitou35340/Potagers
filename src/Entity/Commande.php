<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LignePanierCommande", mappedBy="commande")
     */
    private $ligneDeCommande;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="commandes")
     */
    private $client;

    public function __construct()
    {
        $this->ligneDeCommande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|LignePanierCommande[]
     */
    public function getLigneDeCommande(): Collection
    {
        return $this->ligneDeCommande;
    }

    public function addLigneDeCommande(LignePanierCommande $ligneDeCommande): self
    {
        if (!$this->ligneDeCommande->contains($ligneDeCommande)) {
            $this->ligneDeCommande[] = $ligneDeCommande;
            $ligneDeCommande->setCommande($this);
        }

        return $this;
    }

    public function removeLigneDeCommande(LignePanierCommande $ligneDeCommande): self
    {
        if ($this->ligneDeCommande->contains($ligneDeCommande)) {
            $this->ligneDeCommande->removeElement($ligneDeCommande);
            // set the owning side to null (unless already changed)
            if ($ligneDeCommande->getCommande() === $this) {
                $ligneDeCommande->setCommande(null);
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
