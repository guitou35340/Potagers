<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ProduitRepository $produitRepository, CategorieRepository $categorieRepository)
    {
        $produits = $produitRepository->findAll();
        foreach ($produits as $produit) {
            $produit->setCategorie($categorieRepository->findOneBySomeField($produit->getCategorie()->getId()));
        }

        return $this->render('home/index.html.twig', [
            'produits' => $produits,
        ]);
    }
}
