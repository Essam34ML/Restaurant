<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Events\SendEmail;
use Illuminate\Support\Facades\Event;


class CustomerController extends Controller
{
    public $successStatus = 200;

    public function login(){

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::Customer();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);

        }

        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'city'=>'required',
            'street'=>'required',
            'flat_number'=>'required',
        ]);

          if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
          }

          $input = $request->all();
          $input['password'] = bcrypt($input['password']);
          $input['forget_code'] = str_random(5);
          $user = Customer::create($input);
          $success['token'] =  $user->createToken('MyApp')-> accessToken;
          $success['name'] =  $user->name;
          return response()->json(['success'=>$success], $this-> successStatus);
    }

    public function ForgetPassword (Request $request){
      $validator = Validator::make($request->all(), [
          'email' => 'required|email',
      ]);
      $user = Customer::where('email', $request->input('email'))->first();
      $user->id;
      if (!$user){
        return response()->json(['Error'=>'Unauthorised'] , 401);
      }
      else{
        Event::fire(new SendEmail($user->id));
      }
    }

    public function ResetPassword (Request $request){

      $validator = Validator::make($request->all(), [
          'forget_code' => 'required',
          'password'=>'required',
      ]);

      $user = Customer::where('forget_code' , $request->input('forget_code'))->first();

      if (!$user){
        return response()->json(['Error'=>'Wrong information'] , 401);
      }

      else {
        $new_password = bcrypt($request['password']);

        $user = Customer::where('forget_code' , $request->input('forget_code'))->update(array('password' => $new_password , 'forget_code' => str_random(5)));
        return response()->json(['success'=>'Password has been changed'] , $this-> successStatus);

      }
    }

    public function ShowProfile (){

      $user = Auth::Customer();

      return response()->json(['success' => $user], $this-> successStatus);

    }

    public function EditProfile(Request $request){

      $user = Auth::Customer();

      $user->update($request->all());

      return response()->json(['success' => $user], $this-> successStatus);

    }


}
