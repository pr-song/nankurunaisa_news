@extends('layouts.admin_main')

@section('title', 'All Users - ')

@section('content')
@foreach ($users as $user)
    <p><a href="{{ route('manager.edit_user_role', $user->id) }}">{{ $user->name }}</a></p>
@endforeach
@endsection