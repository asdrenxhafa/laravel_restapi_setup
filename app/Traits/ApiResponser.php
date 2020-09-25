<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{

    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }


    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message,'code' => $code], $code);
    }


    protected function showOne(Model $model, $code = 200)
    {
        return $this->successResponse($model, $code);
    }

    protected function showAll(\Illuminate\Database\Eloquent\Builder $collection, $code = 200)
    {
        if($collection->isEmpty()){
            return $this->successResponse($collection, $code);
        }

        return $this->successResponse($collection,$code);
    }


    protected function singleData(\Illuminate\Database\Eloquent\Builder $collection)
    {
        if(request()->has('where'))
        {
            $attribute = request()->where;


        }
    }


    protected function sortData(\Illuminate\Database\Eloquent\Builder $collection)
    {
        if(request()->has('sort_by')){
            $attribute = request()->sort_by;

            $collection  = $collection->orderByDesc($attribute);
        }

        return $collection;
    }


    public function cacheResponse($data)
    {
        $url = request()->url();

        $queryParams = request()->query();

        ksort($queryParams);

        $queryString = http_build_query($queryParams);

        $fullUrl = '{$url}?{$queryString}';

        return cache()->remember($fullUrl,60, function() use($data) {
            return $data;
        });

    }

}
