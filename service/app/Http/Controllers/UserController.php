<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use App\Student; 
use App\Major; 
use App\Skill; 
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
        $validatorStudent = Validator::make($request->all(), [ 
            'first_name' => 'required', 
            'last_name' => 'required', 
            'breif' => 'required', 
            'major' => 'required', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        if ($validatorStudent->fails()) { 
            return response()->json(['error'=>$validatorStudent->errors()], 401);            
        }
        $majorstr = $request['major'];
        try {
            $major = Major::firstOrFail()->where('major', '=', $majorstr)->get()->toArray()[0];
            $major_id = $major['id'];
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'تخصص غير موجود',
                'execption' => $exception
            ], 400);
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

        $data = $request->all();
        $student['first_name'] = $data['first_name'];
        $student['last_name'] = $data['last_name'];
        $student['breif'] = $data['breif'];
        $student['major_id'] = $major_id;
        $student['user_id'] = $user->id;

        $student = Student::create($student);

        $skills = $data['skills'];
        
        $skillsIds = Skill::whereIn('skill', $skills)->get();
        Student::find($student->id)->skills()->attach($skillsIds);
         
        $user = User::find($user->id);
        $success['token'] =  $user->createToken('authToken')->accessToken; 
        $success['username'] =  $user->username;
        $success['role'] = $user->role_id;
        return response()->json($success, $this->successStatus); 
    }

}