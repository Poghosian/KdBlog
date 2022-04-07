<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Portfolio;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $guarded = false;

    protected $fillable = ['title', 'image'];

    public function portfolio()
    {
        return $this->hasMany(Portfolio::class, 'category_id', 'id');
    }
}
