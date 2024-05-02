<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Education;
use App\Models\ChoosedPlan;
use App\Models\MstAuthorization;
use App\Models\MstUser;
use App\Models\Occupation;
use App\Models\SponsoredAccount;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use DB;
use Google\Cloud\Storage\Connection\Rest;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\JWT\IdTokenVerifier;
class PassportAuthController extends Controller
{
    public function register(Request $request)
    {

    try {
        $validator = Validator::make($request->all(), [
            'userName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:mstuser',
            'password' => 'required|string|min:6',
            'martialStatus' => 'required',
            'DOB' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'city' => 'bail',
            'postCode' => 'bail',
            'country' => 'bail',
            'lat' => 'required',
            'long' => 'required',
            'address' => 'bail',
            'userTypeId' => 'required',
            'phoneNo' => 'required',
            'hairColor' =>  'required',
            'height' => 'required',
            'profileImageUrl' => 'bail|image|mimes:png,jpg,jpeg',

            'education_title' => 'bail',
            'education_level' => 'bail',
            'education_location' => 'bail',
            'education_startDate' => 'bail',
            'education_endDate' => 'bail',
            'currently_studying' => 'bail',

            'work_title' => 'bail',
            'work_description' => 'bail',
            'work_location' => 'bail',
            'work_startDate' => 'bail',
            'work_endDate' => 'bail',
            'current_working' => 'bail|in:0,1',
            'workspace_name'=>'bail',
            'refferal_code' => 'bail'

        ]);

                    //   dd($request->all());

        if ($validator->fails()) {
        	if($validator->errors()->first('email')=='The email has already been taken.'){
            		return response(['status' => '422', 'message' => 'The email has already been taken.', 'error' => $validator->messages()], 422);
            	}else{
             		return response(['status_code' => '422','status'=>'Error', 'message' => 'required fields are missing', 'error' => $validator->messages()], 422);
		}
        }

        if($request->type != 'social'){
            $checkUserExistFirstStep = MstAuthorization::where('email', $request->email)->first();
            if (empty($checkUserExistFirstStep)) {
                return response(['status_code' => '422','status'=>'Error', 'message' => 'sorry email not completed first step data not found'], 422);
            }
        }
        //check email exist in authorization

        $length = 10;
        $randomUserIdGenerate = substr(base_convert(uniqid(mt_rand()), 16, 36), 0, $length);


        $imageName="";
        $fourRandomDigit = mt_rand(1000, 9999);
        if ($request->hasFile('profileImageUrl')) {
            $file = $request->file('profileImageUrl');
            $imageName = time() . '.' . $request->profileImageUrl->extension();
            // $url = $request->profileImageUrl->move('../../userdoc', $imageName,'public_html');
            $url = $request->profileImageUrl->move(public_path('userdoc'), $imageName);
           // $imageName->storeAs('userdoc', $imageName, 'public_html');
        //   $request->file('profileImageUrl')->storeAs('userdoc',  $imageName );

        }
        $flatColor=$request->flatColor ?? 0;
        $firstgredientcolor=$request->firstgredientcolor ?? 0;
        $secondgredientcolor=$request->secondgredientcolor ?? 0;
        $stealthtime=$request->stealthtime ?: date('Y-m-d H:i:s', time());

        // dd()
        $user = User::create([
            'userId' => $randomUserIdGenerate,
            'email' => $request->email,
            'userName' => $request->userName,
            'martialStatus' => $request->martialStatus,
            'DOB' => $request->DOB,
            'gender' => $request->gender,
            'city' =>  $request->city,
            'postCode' =>  $request->postCode,
            'country' =>$request->country,
            'lat' => $request->lat,
            'long' => $request->long,
            'address' =>    $request->address,
            'userTypeId' => $request->userTypeId,
            'phoneNo' =>  $request->phoneNo,
            'hairColor' => $request->hairColor,
            'height' => $request->height,
            'religion' => $request->religion,
            'password' =>bcrypt($request->password),
            'profileImageUrl' =>'userdoc/'. $imageName,
            'flatColor' =>  $flatColor,
            'firstgredientcolor' =>  $firstgredientcolor ,
            'secondgredientcolor'=>$secondgredientcolor  ,
            'stealthtime'=> $stealthtime,
            'state' => $request->state,
            'weight' => $request->weight,
            'occupation_type' => $request->occupation_type,
            'user_type' => 1
        ]);
        MstUser::create([
            'userId' => $randomUserIdGenerate,
            'email' => $request->email,
            'userName' => $request->userName,
            'martialStatus' => $request->martialStatus,
            'DOB' => $request->DOB,
            'gender' => $request->gender,
            'city' =>  $request->city,
            'postCode' =>  $request->postCode,
            'country' =>$request->country,
            'lat' => $request->lat,
            'long' => $request->long,
            'address' =>    $request->address,
            'userTypeId' => $request->userTypeId,
            'phoneNo' =>  $request->phoneNo,
            'hairColor' => $request->hairColor,
            'height' => $request->height,
            'religion' => $request->religion,
            'password' => bcrypt($request->password),
            'profileImageUrl' =>'userdoc/'. $imageName,
            'flatColor' =>  $flatColor,
            'firstgredientcolor' =>  $firstgredientcolor ,
            'secondgredientcolor'=>$secondgredientcolor  ,
            'stealthtime'=> $stealthtime,
            'state' => $request->state,
            'weight' => $request->weight,
            'occupation_type' => $request->occupation_type
        ]);
        $token = $user->createToken('Hapiverse-Auth')->accessToken;

        $authorization= MstAuthorization::where('email', $request->email)->update([
            'token'=>$token->token,
            'userId'=>$randomUserIdGenerate,
            'email'=>$request->email,
            'password' =>hash('md5',$request->password),
            'phoneNo' => $request->phoneNo
        ]);

        $education = Education::create([
            'userId' => $randomUserIdGenerate,
            'title' => $request->education_title,
            'level' => $request->education_level,
            'location' => $request->education_location,
            'startDate' => $request->education_startDate,
            'endDate' => $request->education_endDate,
            'currently_studying'=>1
        ]);
        $occupation = Occupation::create([
            'userId' => $randomUserIdGenerate,
            'title' => $request->work_title,
            'description' => $request->work_description,
            'location' => $request->work_location,
            'startDate' => $request->work_startDate,
            'endDate' => $request->work_endDate,
            'current_working' => $request->current_working,
            'workSpaceName'=>$request->workspace_name,
            'occupation_id' => $request->occupation_type
        ]);
        //  DB::table('users')->insert([
        //         'email' => $request->email,
        //         'password' => bcrypt($request->password),
        //         'user_type' => '1'
        //     ]);
        // $refferalCode = SponsoredAccount::where('refferalCode', $request->refferal_code)->where('alreadyAccountCreated',0)->first();

        // if (!empty($refferalCode)) {

        //     $refferalCode->alreadyAccountCreated = 1;
        //      $refferalCode->save();

        // }
        $response = array(
            "userId" => $randomUserIdGenerate,
            "status" => 1,
            "message" =>"Data successfuly save"
        );
        return response(['status_code' => '200','status'=>'Success', 'message' => 'registered successfully', 'data' => $response], 200);
        } catch (\Exception $e) {
        return response(['status_code' => '500','status'=>'Server error', 'message' => 'something went wrong'.$e->getMessage()], 500);
        }
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'deviceUUID' => 'bail',
            'fcmToken' => 'bail',
            'deviceName' => 'bail',
            'deviceOS' => 'bail',
            'osVersion' => 'bail',

        ]);
        if ($validator->fails()) {
            return response(['status' => 'Error', 'result' => $validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $user['token'] =  $user->createToken('Hapiverse-Auth')->accessToken;
                $success['name'] =  $user->name;
                $auth = MstAuthorization::where('email', $request->email)->update(['token'=>$user['token']]);

                return response(['status' => 'Success', 'result' => $user], 200);
            } else {
                return response(['status' => 'Error', 'result' => 'Password mismatch'], 422);
            }
        } else {
            return response(['status' => 'Error', 'result' => 'User not exist'], 422);
        }
    }

    public function userInfo()
    {

        $user = auth()->user();

        return response()->json(['user' => $user], 200);
    }

    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();

        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['data' => 'User logged out.'], 200);
    }
    public function updateEducation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => 'required',
            'title' => 'required',
            'startDate' => 'bail',
            'endDate' => 'bail',
            'location' => 'required',
            'level' => 'required',
            'currently_studying' => 'bail',

        ]);
        if ($validator->fails()) {
            return response(['status' => 'Error', 'result' => $validator->errors()->all()], 422);
        }
        $user = Education::where('userId', $request->userId)->update($request->all());
        return response(['status_code' => '200', 'status' => 'Success', 'message' => 'Education updated successfully'], 200);
    }

    public function updateOccupdation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => 'required',
            'title' => 'required',
            'description' => 'bail',

            'startDate' => 'bail',
            'endDate' => 'bail',
            'location' => 'required',
            'currently_working' => 'bail',

        ]);
        if ($validator->fails()) {
            return response(['status' => 'Error', 'result' => $validator->errors()->all()], 422);
        }
        $user = Occupation::where('userId', $request->userId)->update($request->all());
        return response(['status_code' => '200', 'status' => 'Success', 'message' => 'Occupdation updated successfully'], 200);
    }

    public function social_login(Request $request)
    {
        $email = $request->email;
        try {

            $email = $request->email;
            return  $this->loginOrCreateUser($email);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function loginOrCreateUser($email)
    {
        $length = 10;
        $randomUserIdGenerate = substr(base_convert(uniqid(mt_rand()), 16, 36), 0, $length);
        $user = User::where('email', $email)->first();
        if (!$user) {
            $user = User::create([
                'userId' => $randomUserIdGenerate,
                'email' => $email,
                'user_type' => 1
            ]);
            // MstUser::create([
            //     'userId' => $randomUserIdGenerate,
            //     'email' => $email
            // ]);
            Auth::login($user);
            $token = $user->createToken('Hapiverse-Auth')->accessToken;
            $user['token'] = $token['token'];

            $authorization= MstAuthorization::create([
                'token'=>$user['token'],
                'userId'=>$randomUserIdGenerate,
                'email' => $email
            ]);
            $user['payment'] = (object)[];
            $payment = ChoosedPlan::where('email',$email)->first();
            if($payment){
                $user['payment'] = $payment;
            }
            $user['business'] = (object)[];
            $business = Business::where('email',$email)->first();
            if($business){
                $user['business'] = $business;
            }
            $user['mstuser'] = (object)[];
            $mstuser = MstUser::where('email',$email)->first();
            if($mstuser){
                $user['mstuser'] = $mstuser;
            }

            return response(['status' => 'Success', 'result' => $user], 200);
        }else{

            Auth::login($user);
            $token = $user->createToken('Hapiverse-Auth')->accessToken;
            $user['payment'] = (object)[];
            $payment = ChoosedPlan::where('email',$email)->first();
            if($payment){
                $user['payment'] = $payment;
            }
            $user['business'] = (object)[];
            $business = Business::where('email',$email)->first();
            if($business){
                $user['business'] = $business;
            }
            $user['mstuser'] = (object)[];
            $mstuser = MstUser::where('email',$email)->first();
            if($mstuser){
                $user['mstuser'] = $mstuser;
            }
            $user['token'] = $token->token;
            return response()->json([
                'status' => 'Success',
                'result' => $user
            ], 200);
        }
    }

    public function update_education(Request $request){

        $education = Education::find($request->id);

        $education->title = $request->title;
        $education->location = $request->location;
        $education->level = $request->level;
        $education->currently_studying = $request->currently_studying;
        $education->startDate = $request->startDate;
        $education->endDate = $request->endDate;
        $education->userId = $request->userId;
        $education->save();
        return response()->json([
            'status' => 'Success',
            'message' => 'Education updated sucessfully'
        ], 200);
    }

    // Reset Password
    public function reset_password(Request $request){
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required|string|min:5',
            ]);
            // dd($request->password);
            $user = MstAuthorization::where('email', $request->email)->update(['password'=>hash('md5', $request->password)]);
            return response(['message' =>'Password has been successfully reset'], 200);
        } catch (\Throwable $th) {
            return response(['error' =>$th->getMessage()], 200);
        }
    }
}
