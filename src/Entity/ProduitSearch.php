<?php
namespace App\Entity;

class ProduitSearch {

    /**
     * @var string|null
     */
    private $nom;

    /**
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string|null $nom
     * @return ProduitSearch
     */
    public function setNom(?string $nom): ProduitSearch
    {
        $this->nom = $nom;
        return $this;
    }



}