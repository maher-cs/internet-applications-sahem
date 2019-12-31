<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;

class UserController extends Controller 
{
    public $successStatus = 200;
    
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] = $user->createToken('authToken')->accessToken;
            $success['username'] = $user->username;
            $success['role'] = $user->role_id;
            return response()->json($success, $this->successStatus); 
        } 
        else{ 
            return response()->json([
                'error'=>'Unauthorised',
                'message' => 'كلمة المرور غير متطابقة مع البريد المدخل'
            ], 401); 
        } 
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->token()->revoke();
        return response()->json([
            'message' => 'تم تسجيل الخروج بنجاح'
        ]);
    }

    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'username' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        try{
            $user = User::create($input);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'هذا الحساب موجود',
                'execption' => $exception
            ], 400);
        }
         
        $user = User::find($user->id);
        $success['token'] =  $user->createToken('authToken')->accessToken; 
        $success['username'] =  $user->username;
        $success['role'] = $user->role_id;
        return response()->json($success, $this->successStatus); 
    }

    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this->successStatus); 
    } 
}