@extends('layouts.main')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @auth
                            Hello, {{ auth()->user()->fullName() }}
                        @endauth
                        @guest
                            Hi user, go to <a href="{{ route('login') }}">login</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
