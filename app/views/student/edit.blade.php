@extends('layout.main')
@section('content')

@php
    if (isset($_SESSION["success"])) {
        echo '<script>alert("Cap nhat thanh cong")</script>';
    }
    unset($_SESSION["success"]);
@endphp

@if (isset($_SESSION["errors"]) && isset($_GET["msg"]))
    <ul>
        @foreach ($_SESSION["errors"] as $msg)
            <li>{{$msg}}</li>
        @endforeach
    </ul>
@endif

<button>
    <a href="{{route('index')}}">List</a>
</button>

<form action="{{route('update/'.$data->id)}}" method="POST">
    <input type="text" name="name" value="{{$data->name}}" placeholder="name">
    <input type="number" name="year" value="{{$data->year_of_birth}}" placeholder="year">
    <input type="text" name="phone" value="{{$data->phone_number}}" placeholder="phone">
    <button type="submit" name="btn-save">Save</button>
</form>
@endsection
