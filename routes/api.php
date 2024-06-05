<?php

use App\Http\Controllers\ProduitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/produits', [ProduitController::class, 'get_all_cathegory_products']);