<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $portfolios = Portfolio::with('category')->latest('created_at')->paginate(4);

        return view('admin.portfolio.index', compact('portfolios'));
    }
}
