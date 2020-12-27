<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use voku\helper\ASCII;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // This is called eloquent model
        $bookings = Booking::all();

        // This one uses facades
        //  $bookings = DB::table('bookings')->get();

        return view('bookings.index')->with('bookingz', $bookings);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $users = DB::table('users')->get()->pluck('name', 'id');

        $rooms = DB::table('rooms')->get()->pluck('number', 'id');

        // Send two tables to the view.
        return view('bookings.create')
            ->with('users', $users)
            ->with('rooms', $rooms);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $id = DB::table('bookings')->insertGetId([
            'room_id' => $request->input('room_id'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'is_reservation' => $request->input('is_reservation', false),
            'is_paid' => $request->input('is_paid', false),
            'notes' => $request->input('notes'),
        ]);
        DB::table('bookings_users')->insert([
            'booking_id' => $id,
            'user_id' => $request->input('user_id'),
        ]);
        return redirect()->action('BookingController@index');
    }

    /**
     * @param Booking $booking
     * @return Application|Factory|View
     */
    public function show(Booking $booking)
    {
        //dd($booking::all());
        return view('bookings.show') ->with('booking',$booking);
    }

    /**
     * @param Booking $booking
     * @return Application|Factory|View
     */
    public function edit(Booking $booking)
    {
        $users = DB::table('users')->get()->pluck('name', 'id');

        $rooms = DB::table('rooms')->get()->pluck('number', 'id');

        // Send two tables to the view.
        return view('bookings.edit')
            ->with('users', $users)
            ->with('rooms', $rooms)
            ->with('booking',$booking);
    }

    /**
     * @param Request $request
     * @param Booking $booking
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * @param Booking $booking
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
