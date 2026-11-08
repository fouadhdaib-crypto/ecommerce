<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;
use App\Models\Product;
use Throwable;

final class HomeController extends Controller
{
    public function index(): void
    {

          $this->view('customer/index');
      
    }
}
