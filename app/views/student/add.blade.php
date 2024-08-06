@extends('layout.main')
@section('content')

@php
    if (isset($_SESSION["success"])) {
        echo '<script>alert("Them moi thanh cong")</script>';
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

<form action="{{route('store')}}" method="POST">
    <input type="text" name="name" placeholder="name">
    <input type="number" name="year" placeholder="year">
    <input type="text" name="phone" placeholder="phone">
    <button type="submit" name="btn-add">Add</button>
</form>
@endsection
