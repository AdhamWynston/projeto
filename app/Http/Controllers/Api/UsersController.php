<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\ApiControllerTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Notifications\UserCreated;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    protected $model;
    use ApiControllerTrait;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
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

    public function store(UserRequest $request)
    {
        $result = $request->all();
        $pass = str_random(6);
        $result['password'] = $pass;
        $user = User::create($result);
        $user->save();
        $token = \Password::broker()->createToken($user);
        $user->notify(new UserCreated($token));
        return response()->json($user);
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

    protected function relationships(){
        if (isset($this->relationships)){
            return $this->relationships;
        }
        return [];
    }
}
