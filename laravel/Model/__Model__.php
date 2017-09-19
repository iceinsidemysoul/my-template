<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class __Model__ extends Model;
{
  protected $guarded = [];
  // protected $fillable = [];
  // protected $hidden = [];
  
  public function __OneToOne__()
  {
    return $this->hasOne('');
  }

  public function __OneToMany__()
  {
    return $this->hasMany('');
  }

  public function __ManyToOne__()
  {
    return $this->belongsTo('');
  }

  public function __ManyToMany__()
  {
    return $this->belongsToMany('');
  }
 
 }
