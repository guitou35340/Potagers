<?php
namespace App\Service\Cart;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService {

    protected $session;
    protected $ProduitRepossitory;

    public function __construct(SessionInterface $session, ProduitRepository $produitRepository)
    {
        $this->session = $session;
        $this->ProduitRepossitory= $produitRepository;
    }

    public function add(int $id){
        $panier=  $this->session->get('panier',[]);

        if(!empty($panier[$id])){
            $panier[$id]++;
        }else{
            $panier[$id]=1;
        }
        $this->session->set('panier', $panier);
    }

    public function remove(int $id){
        $panier =$this->session->get('panier',[]);

        if (!empty($panier[$id]) && $panier[$id]!= 1){
            //unset($panier[$id]);
            $panier[$id]--;
        }elseif($panier[$id]>=1) {
            unset($panier[$id]);
        }
        $this->session->set('panier',$panier);
    }

    public function getFullCart() : array {
        $panier=  $this->session->get('panier',[]);

        $panierWithData =[];

        foreach ($panier as $id => $quantity){
            $panierWithData[]= [
                'product'=> $this->ProduitRepossitory->find($id),
                'quantity' => $quantity
            ];
        }
        return $panierWithData;
    }

    public function getTotal() : float {
        $total=0;
        foreach ($this->getFullCart() as $item){
            $total += $item['product']->getPrix() * $item['quantity'];
        }
        return $total;
    }
}