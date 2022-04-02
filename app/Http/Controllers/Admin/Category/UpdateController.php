<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {

        $data = $request->validated();

        if (!empty($data['image'])){
            $data['image'] = basename(Storage::put('/public/images', $data['image']));
        }

        $category->update($data);

        return redirect()->route('admin.category.show', compact('category'));
    }
}
