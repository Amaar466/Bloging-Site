<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $fillable=[
        'category_id',
        'user_id',
        'name',
        'slug',
       ' description',
       ' yt_iframe',
       ' meta_title',
       ' eta_description',
        'meta_keyword',
        'status',
    
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
     public function user(){
         return $this->belongsTo(User::class,'user_id','id');
 }
}
