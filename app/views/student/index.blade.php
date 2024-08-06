@extends('layout.main')
@section('content')

@php
    if (isset($_SESSION["success"])) {
        echo '<script>alert("Thao tac thanh cong")</script>';
    }
    unset($_SESSION["success"]);
@endphp

<button>
    <a href="{{route('add')}}">Add new</a>
</button>

<table border="1">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Year of Birth</th>
        <th>Phone Number</th>
        <th>Action</th>

    </thead>
    <tbody>
         @foreach($data as $st)
            <tr>
                <td>{{ $st->id }}</td>
                <td>{{ $st->name }}</td>
                <td>{{ $st->year_of_birth }}</td>
                <td>{{ $st->phone_number }}</td>
                <th>
                    <a href="{{route('edit/'.$st->id)}}">Sửa</a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('destroy/'.$st->id)}}">Xóa</a>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
