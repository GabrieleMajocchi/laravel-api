@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ciao <strong>{{ Auth::user()->name }}</strong>! Here is your profile: </div>

                <div class="card-body">
                    <p>
                        Email: {{ Auth::user()->email }}
                    </p>
                    <p>
                        Address: {{ Auth::user()->userDetail->address }}
                    </p>
                    <p>
                        Office number: {{ Auth::user()->userDetail->office_number }}
                    </p>
                    <p>
                        Date of birth: {{ Auth::user()->userDetail->birth_date }}
                    </p>
                    <p>
                        Signature: {{ Auth::user()->userDetail->signature }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @auth
                <h1>
                    Welcome to the Admin control pannel homepage
                </h1>
                <a href="{{ route('projects.index') }}" class="btn btn-primary">See Project List</a>
            @else
            <h1 class="text-center">You must be logged first!</h1>
            @endauth
        </div>
    </div>
</div>
@endsection
