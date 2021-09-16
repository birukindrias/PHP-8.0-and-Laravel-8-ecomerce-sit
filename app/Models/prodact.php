<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodact extends Model
{
    use HasFactory;
    public $table = 'prodacts';
    protected $fillable = ['name','catagory','price'
    ,'gallery','name','description'];

}
