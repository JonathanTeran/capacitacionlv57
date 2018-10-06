<?php

namespace App\Traits;

trait AuditTrait{
    public static function boot()
    {
        static::creating(function ($model) {
            $model->created_user = auth()->user()->id;
            $model->updated_user = auth()->user()->id;
        });
        static::updating(function ($model) {
            $model->updated_user = auth()->user()->id;
        });
        static::deleting(function ($model) {
        });
        parent::boot();
    }
}