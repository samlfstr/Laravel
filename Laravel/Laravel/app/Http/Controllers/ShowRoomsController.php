<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowRoomsController extends Controller
{
    public function __invoke(Request $request)
    {
        return response('A listing of rooms',200);
    }
}
