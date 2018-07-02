<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class FrMenu extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'frmenu';
    
    protected $fillable = [
          'name',
          'parent_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        FrMenu::observe(new UserActionsObserver);
    }
    
    
    
    
}