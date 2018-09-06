<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseObject;
use App\Models\Topic;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiTopicController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        if(!$response = apiPermissionValidator()){
            $response = new ResponseObject();
            $response->success = $response::status_failed;
            $response->code = $response::code_failed;

            try {
                $this->user = JWTAuth::parseToken()->authenticate();

                $response->success = $response::status_ok;
                $response->code = $response::code_ok;
                $response->result = apiCollection(
                    Topic::query(),
                    ['id', 'topic', 'created_at', 'updated_at'],
                    ['topic']
                );
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

    public function store(Request $request)
    {
        if(!$response = apiPermissionValidator([], (new \App\Http\Requests\TopicRequest())->rules())){
            $response = new ResponseObject();
            $response->success = $response::status_failed;
            $response->code = $response::code_failed;

            try {
                $this->user = JWTAuth::parseToken()->authenticate();

                if($create = Topic::firstOrCreate([
                    'topic' => $request->topic,
                ]))
                {
                    $response->success = $response::status_ok;
                    $response->code = $response::code_ok;
                    $response->code = $response::code_ok;
                    $response->result = $create;
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

    public function show(Request $request, $id)
    {
        if(!$response = apiPermissionValidator()){
            $response = new ResponseObject();
            $response->success = $response::status_failed;
            $response->code = $response::code_failed;

            try {
                $this->user = JWTAuth::parseToken()->authenticate();

                $topic = Topic::find($id);

                if($topic){
                    $response->success = $response::status_ok;
                    $response->code = $response::code_ok;
                    $response->result = $topic;
                } else {
                    $response->code = $response::code_not_found;
                    $response->messages = ['Data not found'];
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

    public function update(Request $request, $id)
    {
        if(!$response = apiPermissionValidator([], (new \App\Http\Requests\TopicRequest())->rules())){
            $response = new ResponseObject();
            $response->success = $response::status_failed;
            $response->code = $response::code_failed;

            try {
                $this->user = JWTAuth::parseToken()->authenticate();

                if($topic = Topic::find($id)){
                    if($topic->update([
                        'topic' => $request->topic,
                    ]))
                    {
                        $response->success = $response::status_ok;
                        $response->code = $response::code_ok;
                        $response->code = $response::code_ok;
                        $response->result = Topic::find($id);
                    }
                } else {
                    $response->code = $response::code_not_found;
                    $response->messages = ['Data not found'];
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

    public function destroy(Request $request, $id)
    {
        if(!$response = apiPermissionValidator()){
            $response = new ResponseObject();
            $response->success = $response::status_failed;
            $response->code = $response::code_failed;

            try {
                $this->user = JWTAuth::parseToken()->authenticate();

                if($topic = Topic::doesntHave('news')->find($id)){
                    if($topic->delete()){
                        $response->success = $response::status_ok;
                        $response->code = $response::code_ok;
                        $response->code = $response::code_ok;
                    }
                } else if(Topic::find($id)){
                    $response->messages = ['Can\'t delete data'];
                } else {
                    $response->code = $response::code_not_found;
                    $response->messages = ['Data not found'];
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
