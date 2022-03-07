<?php
namespace App\Modules\Auth\Controller;
use App\Models\User;
use App\Modules\Auth\Requests\LoginRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(){
        # parent::__construct();
    }
    public function index(){
        return view('Auth::login');
    }
    public function login(LoginRequests $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only([
            'email',
            'password',
        ]);
        $result = Auth::attempt($data);
        if ($result === false) {
            return back();
        }
        $user = Auth::user();
        Auth::login($user);
                return redirect()->route('list-task');
    }

}
