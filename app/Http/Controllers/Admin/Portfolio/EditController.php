<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Portfolio $portfolio)
    {
        $category = Category::all();

        return view('admin.portfolio.edit', compact('portfolio', 'category'));
    }
}
