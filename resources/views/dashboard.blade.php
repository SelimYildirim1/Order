@extends('layouts.app') 

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-light">
                        <h2 class="mb-0">{{ __('Dashboard') }}</h2>
                    </div>
                    <div class="card-body">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
