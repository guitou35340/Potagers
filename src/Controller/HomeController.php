<?php

namespace App\Controller;

use App\Entity\ProduitSearch;
use App\Form\ProduitSearchType;
use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    protected $produitRepository;
    protected $categorieRepository;

    public function __construct(ProduitRepository $produitRepository, CategorieRepository $categorieRepository)
    {
        $this->produitRepository= $produitRepository;
        $this->categorieRepository= $categorieRepository;
    }



    /**
     * @Route("/", name="home")
     */
    public function index(PaginatorInterface $pagination, Request $request)
    {

        // créer une entité qui représenter notre recherche
        $produitSearch = new ProduitSearch();
        //créer un formulaire
        $form= $this->createForm(ProduitSearchType::class,$produitSearch);
        $form->handleRequest($request);
        //Gérer le traitement dans le controller

        $produits = $pagination->paginate(
            $this->produitRepository->findAllVisibleQuery($produitSearch),
            $request->query->getInt('page',1),
            12
            );
        foreach ($produits as $produit) {
            if (!empty($produit->getCategorie())) {
                $produit->setCategorie($this->categorieRepository->findOneBySomeField($produit->getCategorie()->getId()));
            }
        }
        return $this->render('home/index.html.twig', [
            'produits' => $produits,
            'form'=> $form->createView()
        ]);
    }

    /**
     * @Route("/show/{id}" , name="home_show")
     */
    public function show($id){
    $produit = $this->produitRepository->find($id);
        if (!empty($produit->getCategorie())) {
            $produit->setCategorie($this->categorieRepository->findOneBySomeField($produit->getCategorie()->getId()));
        }

    return $this->render('home/show.html.twig',[
        'produit'=> $produit
    ]);
    }
}
