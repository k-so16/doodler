<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class DoodleController extends Controller
{
  public function index()
  {
    $items = [
      (object)[
        'src' => 'http://azuki-penguin.org/drawing/crowbar.png',
        'title' => 'crowbar',
        'doodler' => 'so16',
        'created' => '2018/2/27'
      ],
      (object)[
        'src' => 'http://azuki-penguin.org/drawing/sakura.png',
        'title' => 'cherry blossoms',
        'doodler' => 'so16',
        'created' => '2018/2/27'
      ]
    ];
    return view('doodle.list', ['items' => $items]);
  }

  public function draw()
  {
    // dd(Config::get('css.colors'));
    $config = [
      'width' => Config::get('css.width'),
      'height' => Config::get('css.height'),
      'colors' => Config::get('css.colors')
    ];
    return view('doodle.draw', $config);
  }
}
