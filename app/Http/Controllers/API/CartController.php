<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Customer;
use App\Item;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;



class CartController extends Controller
{

  public $successStatus = 200;

  public function AddToCart (Request $request){
    $user = Auth::Customer();

    $validator = Validator::make($request->all(), [
        'id' => 'required'
        ]);

        $order =Order::with('Customer' , 'Item')->where('id' , '=' , $request->id)->get();

        foreach ($order as $order) {
          $final_quantity = 0;
          $final_price = 0;
          $final_total_price = 0;
          foreach ($order['item'] as $item) {


            $quantity = $item['pivot']['quantity'];
            $price = $item['pivot']['price'];
            $final_quantity += $quantity;
            $final_price += $price;
            $total_price = $final_quantity * $final_price;
          }
        }

        $cart = DB::table('carts')->insert(['total_price' => $total_price , 'order_id' => $request->id]);
        return response()->json(['success' => $cart], $this-> successStatus);


  }

  public function DeleteFromCart($id){
    $user = Auth::Customer();

    $cart = Cart::find($id)->delete();


    return response()->json(['success' => 'Delete Done'], $this-> successStatus);

  }

}
