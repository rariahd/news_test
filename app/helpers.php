<?php

function apiPermissionValidator($permissions = [], $validator_rules = []){
    $response = new \App\Http\Controllers\ResponseObject();

    if($validator_rules)
        $validator = Validator::make(\Request::all(), $validator_rules);

    $has_permission = true;
    if($permissions){
        $has_permission = false;
        foreach ($permissions as $key => $permission) {
            if(JWTAuth::parseToken()->authenticate()->getAllPermissions()->where('name', $permission)->count()){
                $has_permission = true;
                break;
            }
        }
    }

    if(!$has_permission){
        $response->success = $response::status_failed;
        $response->code = $response::code_unauthorized;

        return $response;
    } else if($validator_rules && $validator->fails()){
        $response->success = $response::status_failed;
        $response->code = $response::code_failed;
        foreach ($validator->errors()->getMessages() as $item)
            foreach ($item as $key => $message)
                array_push($response->messages, $message);

        return $response;
    }
    return null;
}

function apiCollection($query, $sortable_fields = [], $searchable_fields = [], $conditions = [], $with = [], $default_sort_by = 'id', $default_sort_type = 'DESC', $default_limit = 25){
    $request = app('request');
    $limit = $request->input('limit', $default_limit);
    $page = $request->input('page', 1);
    $sort_type = $request->input('sort_type', $default_sort_type);

    if($request->input('sort_by') && $sortable_fields && in_array($request->input('sort_by'), $sortable_fields))
        $sort_by = $request->input('sort_by');
    else $sort_by = $default_sort_by;

    $q = $request->input('q');
    if($q && $searchable_fields){
        $query = $query->where(function($query) use ($q, $searchable_fields){
            foreach ($searchable_fields as $field) {
                $query = $query->orWhere($field, 'like', '%'.$q.'%');
            }
        });
    }

    if($conditions){
        foreach ($conditions as $ttr) {
            $exp = explode(':', $ttr);
            $type = $exp[0];
            $field = $exp[1];
            $input = $request->input($field);
            if($type=='bool' && $input) $input = (bool)$input;
            if(!is_null($input)){
                if($type=='like') $query = $query->where($field, 'like', '%'.$input.'%');
                else if($type=='gte') $query = $query->where($field, '<=', (int)$input);
                else if($type=='lte') $query = $query->where($field, '>=', (int)$input);
                else $query = $query->where($field, $input);
            } else if($type=='between'){
                $exp = explode(',', $field);
                $input = (int)$request->input($exp[0]);
                $field_start = $exp[1];
                $field_upto = $exp[2];
                if($input) $query = $query->where($field_start, '<=', $input)->where($field_upto, '>=', $input);
            }
        }
    }

    if($with){
        foreach ($with as $relations) {
            if(!is_array($relations))
                $query = $query->with($relations);
            else
                foreach ($relations as $relation)
                    $query = $query->with($relations);
        }
    }

    return [
        'data' => $query->forPage($page, $limit)->orderBy($sort_by, $sort_type)->get(),
        'total' => $query->count()
    ];
}

function ArrayDiff($Array_1, $Array_2){
    $Compare_1_To_2 = array_diff($Array_1,$Array_2);
    $Compare_2_To_1 = array_diff($Array_2,$Array_1);
    $Difference_Array = array_merge($Compare_1_To_2,$Compare_2_To_1);
    if(count($Difference_Array)>0)
        $Difference_Array = array_where($Difference_Array, function ($value, $key) {
            return is_null($value) == false;
        });
    return $Difference_Array;

}
