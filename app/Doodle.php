<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doodle extends Model
{
  protected $guarded = ['id'];

  public static $rules = [
    'title' => 'required',
    'name' => 'required',
    'file_path' => 'required',
  ];
}
