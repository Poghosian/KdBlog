<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Portfolio $portfolio)
    {
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index');
    }
}
