<?php

namespace App\Models;

use App\Helper\DataViewer;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use DataViewer;


    public static $columns = ['id','title','body','created_at','updated_at'];
}
