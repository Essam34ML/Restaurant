<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Validator;


class BranchController extends Controller
{
  public $successStatus = 200;

  public function ShowBranch()
  {
    $user = Auth::Customer();

    $Branch = Branch::all();

    return response()->json(['success' => $Branch], $this-> successStatus);
  }

}
