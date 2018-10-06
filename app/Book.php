<?php

namespace App;

use Cog\Contracts\Love\Likeable\Models\Likeable as LikeableContract;
use Cog\Laravel\Love\Likeable\Models\Traits\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\AuditTrait;
use Storage;
use File;
class Book extends Model implements LikeableContract
{
    use SoftDeletes, Sluggable, AuditTrait,Likeable;


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


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setVpathAttribute($vpath)
    {
        if (!empty($vpath)) {
            $name = uniqid() . '.' . $vpath->getClientOriginalExtension();
            if (!empty($this->vpath)) {
                Storage::disk('public')->delete('PORTADAS/'. $this->vpath);
            }
            $this->attributes['vpath'] = $name;
            Storage::disk('public')->put('PORTADAS/' . $name, File::get($vpath));
        }
    }

}
