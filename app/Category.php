<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  /**
   * The attributes that are mass assignable.
   * @var array
   */
  protected $fillable = ['name'];

  public function books()
  {
    return $this->hasMany('App\Book');
  }  
}