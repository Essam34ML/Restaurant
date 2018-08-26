<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Validator;


class ItemController extends Controller
{
  public $successStatus = 200;

  public function ShowMenuItem()
  {
    $user = Auth::Customer();

    $Item = Item::with('Category')->get();

    return response()->json(['success' => $Item], $this-> successStatus);
  }

}
