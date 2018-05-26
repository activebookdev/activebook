@extends('layouts.activebook')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Awesome!</div>

            <div class="card-body" style="text-align:center;">
                Thanks for verifying your email address, {{$name}}! Your account now has access to all Active Book features.<br><br>
                <a type="button" class="btn btn-warning" href="/login">Login</a>
            </div>
        </div>
    </div>
</div>
@endsection