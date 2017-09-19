<?php

namespace App\Http\Controllers;

use App\__Model__;
use App\__RelatedModel__;
use Image;
use App\Http\Requests\__FormRequest__;
use Illuminate\Http\Request;

class ForumController extends Controller
{
  // TODO:: store data with file
  // TODO:: Show at specific date, month
  // TODO:: Show at specific Model Relationships


  // store data with image
  public function storeImage(__FormRequest__ $request)
  {
    //
    $field = []; // update your required field
    $forum = __Model__::create($request->only($field));

    if ($request->image){
      // as base 64 image
      $img = Image::make($request->image);
      $extension = substr($request->image, 11, strpos($request->image, ";base64")-11);
      $filename = preg_replace('/\./', '-', microtime(true)).'-forum.'.$extension;
      // edit path
      $img->save(public_path('path\\to\\store')."\\{$filename}", 85);
      $forum->image = "/path/to/store/".$filename;

      $forum->save();
    }

    return $forum;
  }

  // delete many form selected
  public function deleteMany(Request $request)
  {
    $selected = $request->selected;
    $__countLists__ = Forum::destroy($selected);
    return $__countLists__;
  }

}
