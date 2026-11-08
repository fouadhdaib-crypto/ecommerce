<?php
declare(strict_types=1);

namespace App\Controllers;


final class ProductController extends \App\Core\Controller
{

  public function getAllProducts(): void
{
    $product = new \App\Models\Product();
    $products = $product->GetallProduct();

    $this->view('customer/products', ['products' => $products,]);
}

       
    
}


