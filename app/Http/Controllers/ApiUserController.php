<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseObject;
use App\Models\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiUserController extends Controller
{
    public $loginAfterSignUp = true;
    protected $user;

    public function register(Request $request)
    {
        if(!$response = apiPermissionValidator([], (new \App\Http\Requests\RegisterRequest())->rules())){
            $response = new ResponseObject();
            $response->success = $response::status_failed;
            $response->code = $response::code_failed;

            try {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();

                $this->dispatch(new \App\Jobs\SendWelcomeEmail($user->name, $user->email));

                if ($this->loginAfterSignUp)
                    return $this->login($request);
                else {
                    $response->success = $response::status_ok;
                    $response->code = $response::code_ok;
                    $response->result = $user;
                }
            } catch (\Exception $e) {
                $response->messages = [$e->getMessage().' on '.$e->getFile().' line '.$e->getLine()];
                $response->code = $response::code_error;
            }
        }

        return response()->json($response, $response->code);
    }

    public function login(Request $request)
    {
        if(!$response = apiPermissionValidator([], [])){
            $response = new ResponseObject();
            $response->success = $response::status_failed;
            $response->code = $response::code_failed;

            try {
                $input = $request->only('email', 'password');
                $jwt_token = null;

                if ($jwt_token = JWTAuth::attempt($input)) {
                    $response->success = $response::status_ok;
                    $response->code = $response::code_ok;
                    $response->result = $jwt_token;
                } else if(User::where('email', $request->email)->count()==0)
                    $response->messages = ['Email not found'];
                else
                    $response->messages = ['Email and password did not match'];
            } catch (\Exception $e) {
                $response->messages = [$e->getMessage().' on '.$e->getFile().' line '.$e->getLine()];
                $response->code = $response::code_error;
            }
        }

        return response()->json($response, $response->code);
    }

    public function logout(Request $request)
    {
        if(!$response = apiPermissionValidator()){
            $response = new ResponseObject();
            $response->success = $response::status_failed;
            $response->code = $response::code_failed;

            try {
                JWTAuth::invalidate($request->token);

                $response->success = $response::status_ok;
                $response->code = $response::code_ok;
                $response->messages = ['User logged out successfully'];
            } catch (JWTException $e) {
                $response->messages = ['Token problem'];
                $response->code = $response::code_error;
            } catch (\Exception $e) {
                $response->messages = [$e->getMessage().' on '.$e->getFile().' line '.$e->getLine()];
                $response->code = $response::code_error;
            }
        }

        return response()->json($response, $response->code);
    }

    public function profile(Request $request)
    {
        if(!$response = apiPermissionValidator()){
            $response = new ResponseObject();
            $response->success = $response::status_failed;
            $response->code = $response::code_failed;

            try {
                $response->success = $response::status_ok;
                $response->code = $response::code_ok;
                $response->result = JWTAuth::parseToken()->authenticate();
            } catch (JWTException $e) {
                $response->messages = ['Token problem'];
                $response->code = $response::code_error;
            } catch (\Exception $e) {
                $response->messages = [$e->getMessage().' on '.$e->getFile().' line '.$e->getLine()];
                $response->code = $response::code_error;
            }
        }

        return response()->json($response, $response->code);
    }

    public function profileUpdate(Request $request)
    {
        if(!$response = apiPermissionValidator([], (new \App\Http\Requests\ProfileRequest())->rules())){
            $response = new ResponseObject();
            $response->success = $response::status_failed;
            $response->code = $response::code_failed;

            try {
                $this->user = JWTAuth::parseToken()->authenticate();
                $inputs = [
                    'name' => $request->name,
                    'email' => $request->email,
                ];
                if($request->password) $inputs['password'] = bcrypt($request->password);

                if($this->user->update($inputs))
                {
                    $response->success = $response::status_ok;
                    $response->code = $response::code_ok;
                    $response->code = $response::code_ok;
                    $response->result = $this->user;
                }
            } catch (JWTException $e) {
                $response->messages = ['Token problem'];
                $response->code = $response::code_error;
            } catch (\Exception $e) {
                $response->messages = [$e->getMessage().' on '.$e->getFile().' line '.$e->getLine()];
                $response->code = $response::code_error;
            }
        }

        return response()->json($response, $response->code);
    }
}
