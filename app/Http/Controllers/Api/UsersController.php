<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\ApiControllerTrait;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\RecoveryPassword;
use App\Notifications\UserCreated;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;


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

    public function confirmation($token){
        $user = User::where('confirmed_token', $token)->first();
        if ($user === null) {
//            return response()->json(false);
            abort(422);
        }
        return response()->json($user);
    }

    public function recovery(Request $request) {
        $this->validate($request, [
            'email' => 'email|required'
        ]);
        $data = $request->all();
        $user = User::where('email', $data['email'])->firstOrFail();
        if (!is_null($user)){
            $token = Uuid::uuid();
            $user->confirmed_token = Uuid::uuid();
            $user->notify(new RecoveryPassword($token));
        }
        $user->save();
        return response()->json($user);
    }

    public function updatePassword (Request $request, $id) {
        $this->validate($request, [
            'password' => 'string|required',
            'confirmed_token' => 'string|required'
        ]);
        $data = $request->all();
        $user = User::where('id', $id)
            ->where('confirmed_token', $data['confirmed_token'])
            ->firstOrFail();
        $user->password = Hash::make($data['password']);
        $user->confirmed_token = !is_null($user->password) ? null  : $user->confirmed_token;
        $user->confirmed_at = Carbon::create();
        $user->save();
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=> 'required|email|unique:users',
            'name' => 'required'
        ]);
        $result = $request->all();
        $result['password'] = null;
        $result['confirmed_token'] = Uuid::uuid();
        $user = User::create($result);
        $user->save();
        $token = Uuid::uuid();
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
