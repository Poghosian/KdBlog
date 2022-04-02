<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }
}
