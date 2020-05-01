@extends('layouts.main')

@section('title', 'All Roles - ')

@section('content')
@foreach($roles as $role)
<p>{{ $role->name }}</p>
@endforeach
@endsection