@extends('layouts.admin')

@section('content')
    Bienvenue sur votre dashboard {{ Auth::user()->name }}
@endsection