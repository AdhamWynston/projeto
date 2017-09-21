<?php

namespace App\Http\Controllers\Admin;

use App\Forms\UserForm;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\Facades;
use Kris\LaravelFormBuilder\Form;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view ('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(UserForm::class, [
            'url' => route('admin.users.store'),
            'method'=> "POST"
        ]);
        return view ('admin.users.create',compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(UserForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        User::createFully($data);
        $notification = array(
            'message' => 'Usuário criado com sucesso',
            'alert-type' => 'success'
        );
        $request->session()->flash('message', 'Usuário criado com sucesso!');
        return redirect()->route('admin.users.index', compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view ('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(UserForm::class, [
            'url' => route('admin.users.update',['user'=> $user->id]),
            'method'=> "PUT",
            'model' => $user
        ]);
        return view ('admin.users.edit',compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(UserForm::class, [
            'data'=> ['id' => $user->id]
        ]);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        $user->update($data);
        session()->flash('message', 'Usuário editado com sucesso!');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('message', 'Usuário excluido com sucesso!');
        return redirect()->route('admin.users.index');
    }
}
