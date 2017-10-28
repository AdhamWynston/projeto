<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait ApiControllerTrait {
    public function index(Request $request)
    {
        $limit = $request->all()['limit'] ?? 15;
        $order = $request->all()['order'] ?? null;

        if($order  !== null){
            $order = explode(',', $order);
        }
        $order[0] = $order[0] ?? 'id';
        $order[1] = $order[1] ?? 'asc';

        $where = $request->all()['where'] ?? [];

        $like = $request->all()['like'] ?? null;

        if($like){
            $like = explode(',', $like);
            $like[1] = '%' . $like[1] . '%';
        }

        $result = $this->model->with($this->relationships())->orderBy($order[0],$order[1])
            ->where(function($query) use ($like){
                if($like){
                    return $query->where($like[0], 'like', $like[1]);
                }
                return $query;
            })
            ->with($this->relationships())
            ->where($where)
            ->get();
        return response()->json($result);
    }

    public function store(Request $request)
    {
        $result = $this->model->create($request->all());
        return response()->json($result);

    }
    public function show($id){
        $result = $this->model->with($this->relationships())
            ->findOrFail($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {
        $result = $this->model->findOrFail($id);
        $result->update($request->all());
        return response()->json($result);
    }
    function checkEmail($email, $id) {

        $result = $this->model->where('email','=',$email)
            ->where('id','<>',$id)
            ->count();

        if ($result) {
            return response()->json(false);
        }
        return response()->json(true);
    }
    public function unique(Request $request)
    {
        $where = $request->all()['where'] ?? [];
        $result = $this->model
            ->where($where)
            ->count();
        if ($result) {
           return response()->json(false);
        }
        return response()->json(true);
    }
    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);
        $result->delete();
        return response()->json($result);
    }
    protected function relationships(){
        if (isset($this->relationships)){
            return $this->relationships;
        }
        return [];
    }
}