<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowRoomsController extends Controller
{
    public function __invoke(Request $request)
    {
        $rooms = DB::table('rooms')->get();

        // if I want to return specific values
        if($request->query('id') !== null){
            $rooms = $rooms ->where('room_type_id', $request->query('id'));
        }
        // we are sending the data to the views/rooms/index.blade.php file and use there
        // return view('rooms.index',['roomz'=>$rooms]);
        return view('rooms.index')->with('roomz',$rooms);

    }
}
