<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        $title = 'Kategori Bangunan';

        return Inertia::render('Admin/Category/Index', compact('title'));
    }
}
