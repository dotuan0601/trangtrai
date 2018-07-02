<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'product';
    
    protected $fillable = [
          'name',
          'link',
          'image',
          'active',
          'priority',
          'is_feature'
    ];
    

    public static function boot()
    {
        parent::boot();

        Product::observe(new UserActionsObserver);
    }
    
    
    
    
}