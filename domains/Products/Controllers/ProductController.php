<?php

namespace Domains\Products\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;

class ProductController extends BaseController
{
    public function index()
    {
        return Inertia::render('Products/TheProducts');
    }
}
