<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;
    protected $table='categories';
    protected $fillable=['name'];

    public function books(){
        return $this->hasMany(Book::class,'category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function suscriptions(){
        return $this->hasMany(
            CategorySuscription::class,
            'category_id'
        );
    }
}
