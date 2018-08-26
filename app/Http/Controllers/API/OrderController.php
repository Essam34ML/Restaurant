<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Customer;
use App\Item;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;



class OrderController extends Controller
{

  public $successStatus = 200;

  public function ShowOrdersHistory()
  {
    $user = Auth::Customer();

    $Order = Order::with('Customer','Item')->get();

    return response()->json(['success' => $Order], $this-> successStatus);
  }

  public function MakeOrder(Request $request)
  {

    $validator = Validator::make($request->all(), [
        'item_id' => 'required',
        'quantity' => 'required',
        ]);

        $user = Auth::Customer();


        DB::table('orders')->insert(['user_id' => $user->id]);

        $order =Order::all()->where('user_id' , '=' , $user->id)->first();

        $item_id = $request->item_id;

        $item =Item::all()->where('id' , '=' , $request->item_id)->first();

        $item_price = $item->price;

        $order->item()->attach($item_id ,['quantity' => $request->quantity ,'price' => $item->price]);


  }

  public function ShowOrder(){

    $user = Auth::Customer();

    $Order = Order::with('Customer','Item')->get()->last();

    return response()->json(['success' => $Order], $this-> successStatus);

  }

  public function DeleteOrder ($id){


    $user = Auth::Customer();

    $Order = Order::with('Customer','Item')->find($id)->delete();


    return response()->json(['success' => 'Delete Done'], $this-> successStatus);
  }

}
