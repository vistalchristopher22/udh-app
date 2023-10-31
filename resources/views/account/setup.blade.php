@extends('layouts.app-vue')
@section('content')
    <account-setup :user="{{ json_encode($user) }}" />
@endsection
