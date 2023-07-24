@extends('master') 

@section('content')
    <div class="container text-center p-5 d-flex justify-content-center align-items-center" style="min-height: 50vh">
        <div class="">
            <h1>404 - Page Not Found</h1>
            <p>Oops! The page you are looking for does not exist.</p>
            <a href="{{ url('/') }}">Go back to the homepage</a>   
        </div>
        
    </div>
@endsection