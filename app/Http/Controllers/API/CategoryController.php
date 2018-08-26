<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Validator;


class CategoryController extends Controller
{
  public $successStatus = 200;

  public function ShowCategory()
  {
    $user = Auth::Customer();

    $category = Category::with('Menu')->get();

    return response()->json(['success' => $category], $this-> successStatus);
  }

}
