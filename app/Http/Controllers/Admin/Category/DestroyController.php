<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Portfolio;
use Illuminate\Support\Facades\DB;

class DestroyController extends Controller
{
    public function __invoke(Category $category, Request $request)
    {
        $port = $category->portfolio;

        if (!$request->get('check')){
            foreach ($port as $item){
                File::delete('storage/images/'.$item->image);
            }
            DB::table('portfolios')->where('category_id', $category->id)->delete();
        }
        File::delete('storage/images/'.$category->image);
        $category->delete();


        return redirect()->route('admin.category.index');
    }
}
