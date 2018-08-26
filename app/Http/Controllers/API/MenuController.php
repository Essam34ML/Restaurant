<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Websitemenu;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Validator;


class MenuController extends Controller
{
  public $successStatus = 200;

  public function ShowMenu()
  {
    $user = Auth::Customer();

    $Menu = Websitemenu::all();

    return response()->json(['success' => $Menu], $this-> successStatus);
  }

}
