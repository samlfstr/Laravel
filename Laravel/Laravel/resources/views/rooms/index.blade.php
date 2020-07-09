@extends('layouts.app')

@section('content')
    {{-- Simple Explination --
    Tr => Table Raw
    Th => Table Head It Is Horizontal
    Td => Table Data It goes from left to righ.
     --}}
    <table class="table">
        <thead>
        <tr>
            <th>
                Row Number
            </th>
            <th>
                Type
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($roomz as $room)
            <tr>
                <td>{{$room->number}}</td>
                <td>{{$room->room_type_id}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
