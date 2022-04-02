<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Portfolio\UpdateRequest;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Portfolio $portfolio)
    {

        $data = $request->validated();
        if (!empty($data['image'])){
            $data['image'] = basename(Storage::put('/public/images', $data['image']));
        }
        $portfolio->update($data);

        return view('admin.portfolio.show', compact('portfolio'));
    }
}
