<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use App\Models\Categories;

class Courses extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
