<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseObject;
use App\Models\News;
use App\Models\Topic;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiNewsController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        if(!$response = apiPermissionValidator([])){
            $response = new ResponseObject();
            $response->success = $response::status_failed;
            $response->code = $response::code_failed;

            try {
                $response->success = $response::status_ok;
                $response->code = $response::code_ok;
                $query = News::withTrashed();
                if($request->status){
                    if($request->status == 'deleted') $query->whereNotNull('deleted_at');
                    elseif($request->status == 'draft') $query->whereNull('published_at');
                    elseif($request->status == 'publish') $query->whereNotNull('published_at');
                }
                if($request->topic){
                    $topic_ids = \App\Models\Topic::where('topic', 'like', "%$request->topic%")->get()->pluck('id');
                    if(!$topic_ids) $query->where('id', 0);
                    else $query->whereHas('topics', function($query) use ($topic_ids){
                        return $query->whereIn('id', $topic_ids);
                    });
                }
                $response->result = apiCollection(
                    $query,
                    ['id', 'title', 'content', 'user_id', 'published_at', 'created_at', 'updated_at'],
                    ['title', 'content'],
                    ['like:location', 'bool:is_fixed_price', 'between:published_at,published_at,published_at', ':level_id'],
                    ['user', 'topics']
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
        if(!$response = apiPermissionValidator([], (new \App\Http\Requests\NewsRequest())->rules())){
            $response = new ResponseObject();
            $response->success = $response::status_failed;
            $response->code = $response::code_failed;

            try {
                $this->user = JWTAuth::parseToken()->authenticate();
                $published_at = null;
                if(!is_null($request->published) && ($request->published=='true' || $request->published=='1'))
                    $published_at = \Carbon\Carbon::now();

                if($create = $this->user->news()->create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'published_at' => $published_at,
                ]))
                {
                    if($request->topics){
                        $created_topics = Topic::whereIn('topic', $request->topics)->get()->pluck('topic')->toArray();
                        if(count($created_topics) < count($request->topics)){
                            $new_topics = ArrayDiff($created_topics, $request->topics);
                            $topic_inputs = [];
                            $date_now = \Carbon\Carbon::now();
                            foreach ($new_topics as $new_topic) array_push($topic_inputs, ['topic' => $new_topic, 'created_at' => $date_now, 'updated_at' => $date_now]);
                            Topic::insert($topic_inputs);
                        }

                        $create->topics()->sync(Topic::whereIn('topic', $request->topics)->get()->pluck('id'));
                    }

                    $response->success = $response::status_ok;
                    $response->code = $response::code_ok;
                    $response->code = $response::code_ok;
                    $response->result = News::with('topics')->find($create->id);
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
                if($news = News::with(['user', 'topics'])->find($id)){
                    $response->success = $response::status_ok;
                    $response->code = $response::code_ok;
                    $response->result = $news;
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
        if(!$response = apiPermissionValidator([], (new \App\Http\Requests\NewsRequest())->rules())){
            $response = new ResponseObject();
            $response->success = $response::status_failed;
            $response->code = $response::code_failed;

            try {
                $this->user = JWTAuth::parseToken()->authenticate();
                $published_at = null;
                if(!is_null($request->published) && ($request->published=='true' || $request->published=='1'))
                    $published_at = \Carbon\Carbon::now();

                if($news = $this->user->news->find($id)){
                    if($news->update([
                        'title' => $request->title,
                        'content' => $request->content,
                        'published_at' => $published_at,
                    ]))
                    {
                        if($request->topics){
                            $created_topics = Topic::whereIn('topic', $request->topics)->get()->pluck('topic')->toArray();
                            if(count($created_topics) < count($request->topics)){
                                $new_topics = ArrayDiff($created_topics, $request->topics);
                                $topic_inputs = [];
                                $date_now = \Carbon\Carbon::now();
                                foreach ($new_topics as $new_topic) array_push($topic_inputs, ['topic' => $new_topic, 'created_at' => $date_now, 'updated_at' => $date_now]);
                                Topic::insert($topic_inputs);
                            }
                            $news->topics()->sync(Topic::whereIn('topic', $request->topics)->get()->pluck('id'));
                        }

                        $response->success = $response::status_ok;
                        $response->code = $response::code_ok;
                        $response->code = $response::code_ok;
                        $response->result = News::with('topics')->find($news->id);
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

                if($news = $this->user->news->find($id)){
                    if($news->delete()){
                        $response->success = $response::status_ok;
                        $response->code = $response::code_ok;
                        $response->code = $response::code_ok;
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
}
