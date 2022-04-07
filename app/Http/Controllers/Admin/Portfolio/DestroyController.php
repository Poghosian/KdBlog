<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DestroyController extends Controller
{
    public function __invoke(Portfolio $portfolio)
    {
        File::delete('storage/images/'.$portfolio->image);
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index');
    }
}
