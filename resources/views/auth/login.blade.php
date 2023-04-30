@extends('layouts.auth')
@section('content')
    <login-page csrf_token="{{ @csrf_token() }}"></login-page>
@endsection
