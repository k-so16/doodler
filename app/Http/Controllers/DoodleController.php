<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

use App\Doodle;

class DoodleController extends Controller
{
  public function index(Request $request)
  {
    // dd(Doodle::all());
    if(isset($request->id)) {
      $data = Doodle::where('id', $request->id)->first();
      if($data === null) {
        return redirect('/');
      }
      return view('doodle.appreciation', ['data' => $data]);
    } else {
      $items = Doodle::orderBy('created_at', 'desc')->paginate(5);
      return view('doodle.list', ['items' => $items]);
    }
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

  public function register(Request $request)
  {
    $this->validate($request, [
      'doodle' => [
        'required',
        'image'
      ]
    ]);

    if($request->file('doodle')->isValid()) {
      $filename = $request->doodle->store('images', 'public');
      $doodle = new Doodle;
      $formData = [
        'title' => ($request->title) ? $request->title : "UNTITLED",
        'name' => ($request->name) ? $request->name : "No Name",
        'file_path' => $filename
      ];
      $doodle->fill($formData)->save();
      return redirect('/');
    } else {
      return 'Error occured.';
    }

  }
}
