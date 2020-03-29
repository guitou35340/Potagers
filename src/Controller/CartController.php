<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(CartService $cartService)
    {
      $panierWithData= $cartService->getFullCart();

        $total=$cartService->getTotal();
        return $this->render('cart/index.html.twig', [
            'items'=>$panierWithData,
            'total' => $total
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add($id, CartService $cartService){

        $cartService->add($id);
        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartService){

    $cartService->remove($id);
    return $this->redirectToRoute("cart_index");
    }
}
