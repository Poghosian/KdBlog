<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Portfolio\StoreRequest;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        if (!empty($data['image'])){
            $data['image'] = basename(Storage::put('/public/images', $data['image']));
        }

        Portfolio::firstOrCreate($data);

        return redirect()->route('admin.portfolio.index');
    }
}
