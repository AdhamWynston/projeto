<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Forms\UserSettingsForm;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\FormBuilder;

class UserSettingsController extends Controller
{
    public function edit(FormBuilder $formBuilder){
        /** @var Form $form */
        $form = $formBuilder->create(UserSettingsForm::class, [
            'url' => route('admin.users.settings.update'),
            'method' => 'PUT'
        ]);
        return view('admin.users.settings', compact('form'));
    }
    public function update(Request $request,FormBuilder $formBuilder){
        $form = $formBuilder->create(UserSettingsForm::class);
        if (!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();
        $data['password'] = bcrypt($data['password']);
        \Auth::user()->update($data);
        $request->session()->flash('message', 'Senha alterada com sucesso');
        return redirect()->route('admin.users.settings.edit');
    }
}
