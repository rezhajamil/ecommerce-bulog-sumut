<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return back();
    }

    public function login_form()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->status == 0) {
                throw ValidationException::withMessages([
                    'email' => 'Akun anda tidak aktif. Hubungi administrator untuk mengaktifkan.',
                ]);
            }
        } else {
            throw ValidationException::withMessages([
                'email' => 'Akun tidak ditemukan / Email Salah',
            ]);
        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            throw ValidationException::withMessages([
                'email' => 'Email atau password salah',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended();
    }

    public function register_form()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'unique:users'],
            'whatsapp' => ['required', 'numeric', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'security_question' => ['required', 'string',],
            'security_question_answer' => ['required', 'string',],
        ]);

        if ($request->avatar && $request->hasFile('avatar')) {
            $url = $request->avatar->store('company-logo');
        } else {
            $url = '';
        }

        $user = User::create([
            'name' => ucwords($request->name),
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
            'security_question' => $request->security_question,
            'security_question_answer' => strtolower($request->security_question_answer)
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function toggle_status($id)
    {
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();

        return back();
    }

    public function forgot_password_form(Request $request)
    {
        if ($request->email) {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                throw ValidationException::withMessages([
                    'email' => 'Akun tidak ditemukan / Email Salah',
                ]);
            }
        } else {
            $user = null;
        }

        return view('forgot-password', compact('user'));
    }

    public function forgot_password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Password::defaults()],
            'security_question_answer' => ['required', 'string',],
        ]);

        $user = User::find($request->user);

        if (strtolower($request->security_question_answer) != $user->security_question_answer) {
            throw ValidationException::withMessages([
                'security_question_answer' => 'Jawaban Anda Salah',
            ]);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login');
    }
}
