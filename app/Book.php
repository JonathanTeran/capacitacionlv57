<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\AuditTrait;

class Book extends Model
{
    use SoftDeletes, Sluggable, AuditTrait;


    protected $fillable=['title','description','vpath'
                            ,'price','category_id','date_publish'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
