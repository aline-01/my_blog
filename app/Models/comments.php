<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $table = "comments";
    protected $fillable = ["blog_id","text","writer_name","email","is_accepted"];
}
