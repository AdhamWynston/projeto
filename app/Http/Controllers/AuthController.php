<?php

namespace App\Http\Controllers {
    use Session;
    use Auth;
    use Illuminate\Http\Request;

    class AuthController extends Controller
    {
        public function getLogout()
        {
            Auth::logout();
            Session::flush();
            return redirect('/login');
        }
    }
}
