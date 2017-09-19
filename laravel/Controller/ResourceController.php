<?php
 
namespace App\Http\Controllers;

use App\__Model__;
use App\__RelatedModel__;
// and others utilities service
use Image;

use App\Http\Requests\__FormRequest__;
// just in case you dont need custom requests
use Illuminate\Http\Request; 

// ----------------usage------------------------
// rename __*Model*__ to your model name
// rename __*Controller*__ to your ModelController name
// rename __*FormRequest*__ to your FormRequest name
// rename __*lists*__ in index
// rename __*list*__ in show,store,edit




class __Controller__ extends Controller
{

  public function index()
  {
    //generally
    
    //retrieve latest and paginated model lists from DB
    $__lists__ = __Model__::latest()->paginate(20);
    // $__lists__ = __Model__::orderBy('customDate')->paginate(20);
    // $__lists__ = __Model__::latest()->get();
    // $__lists__ = __Model__::all();
    
    
    //then return as json
    
    return response()->json($__lists__);
  }
  
  public function create()
  {
    // generally use Vue component for create form
  
  }
  
  public function store(__FormRequest__ $request)
  {
    // Data should be manage before sent via ajax
    // So this function can be so clean.
    
    // Enter your required field
    $fields = [];
    $__list__ = __Model__::create($request->only($fields));
    
    // return new row as json
    return response()->json($__list__);
  }
  
  public function show($id)
  {
    // return specific data row from DB
    $__list__ = __Model__::find($id);

    return response()->json($__list__);
  
  }
  
  public function edit()
  {
    // use Vue component
  
  }
  
  public function update(__FormRequest__ $request, $id)
  {
    $field = []; // your required field to update

    $__list__ = __Model__::find($id)->update($field);

    return response()->json($field);
  
  }
  
  public function delete($id)
  {
    $__list__ = __Model__::find($id)->delete();

    return $__list__;
  
  }
  
}
