<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Cart;
use App\Models\OrderItem;

final class CheckoutController extends \App\Core\Controller
{
    PUBLIC function addtocart(): void
    {
        $cart=new Cart();

         $CARTID =-1;
          $CARTID=$cart->getCartIdByUserId($_SESSION['user_id']);

        if($CARTID===0){

             $CARTID = $cart->createCart($_SESSION['user_id']);

        }
       
        $cart->addCartItem((int)$CARTID,(int)$_POST['product_id']);

    }

    public function checkout(): void
    {
        
        
    $this->view('customer/checkout');
       
    }
}
