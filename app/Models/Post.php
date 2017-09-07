<?php

namespace App\Models;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use DataViewer;


    protected $fillable = ['title','body'];
}
