<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterRequester;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function RegistrView()
    {
        return view('users.register');
    }

    public function Register(RegisterRequest $request)
    {
        if(empty($request->photo))
        {
            $name_photo = 'avatar.png';
        }
        else{
            $name_photo = explode('/', $request->file('photo') -> store('public'))[1];
        }
        $data = [
            'photo' => $name_photo
        ];
        $request -> merge(['password' => Hash::make($request->password)]);
        $data += $request->only('name', 'login', 'email', 'password');
        User::create($data);
        return redirect('auth');
    }

    public function AuthView()
    {
        return view('users.auth');
    }

    public function Auth(AuthRequest $request)
    {
        if(Auth::attempt($request->validated()))
        {
            $request->session()->regenerate();
            return redirect('lk');
        }
        return back()->withErrors(['authError' => 'Неверный логин или пароль']);
    }

    public function lk(Request $request)
    {
        $filetr = Booking::where('user_id', Auth::id());
        if ($request->filled('status')) {
            $filetr->where('status', $request->get('status'));
        }
        $orders = $filetr->paginate(4);
        return view('users.lk', compact('orders'));
    }

    public function admin(Request $request)
    {
        $allBooking = Booking::all();
        foreach($allBooking as $ab)
        {
            $i = $ab->id;
        }
        if(empty($request->input('status')))
        {
            $limit = 10;
        }
        else
        {
            $limit = 100;
        }
        if(empty($request->input('offset')) || $request->input('offset') >= $i)
        {
            $offset = 0;
        }
        else
        {
            $offset = $request->input('offset');
        }
        $filetr = Booking::limit($limit)->offset($offset);
        if ($request->filled('status')) {
            $filetr->where('status', $request->get('status'));
        }
        $booking = $filetr->get();
        return view('users.admin', compact('booking', 'offset'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect('auth');
    }
}
  