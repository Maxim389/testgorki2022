<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function addBookingView()
    {
        return view('booking.addBooking');
    }
    public function addBooking(BookingRequest $request)
    {
        $data = [
            'status' => 'Не подтверждена',
            'user_id' => Auth::id(),
        ];
        $data += $request->only('arrival_date');
        Booking::create($data);
        return redirect('lk');

    }

    public function deleteShow(Booking $id)
    {
        if($id -> status == 'Подтверждена' && auth()->user()->role != 'Admin')
        {
            return redirect('lk');
        }
        return view('booking.deleteBooking', compact('id'));
    }

    public function delete(Booking $id)
    {
        $id -> delete();
        return redirect('lk');
    }

    public function updateShow(Booking $id)
    {
        if($id -> status == 'Подтверждена' && auth()->user()->role != 'Admin')
        {
            return redirect('lk');
        }
        return view('booking.updateBooking', compact('id'));
    }

    public function update(Request $request,Booking $id)
    {
        $request->validate([
            'arrival_date' => 'required',
        ]);

        $id -> arrival_date = $request->input('arrival_date');
        if(auth()->user()->role == "Admin")
        {
            $id -> status = $request->input('status');
        }
        $id -> save();
        return redirect('lk');
    }

    public function searchId(Request $request)
    {
        $search = Booking::where('id', $request->input('id'))->get();
        return view('booking.searchId', compact('search'));
    }

    public function searchUser(Request $request)
    {
        $booking = Booking::all();
        $bookings = User::find($request->input('user'));
        $users = User::all();
        $search = Booking::where('user_id', $request->input('user'))->get();
        return view('booking.searchUser', compact('search', 'booking', 'users', 'bookings'));
    }
}
