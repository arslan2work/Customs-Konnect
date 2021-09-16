@extends('layouts.master')

@section('content')
<div class="container">
          <div class="container-fluid">
        <div class="col-md-8">
            <div class="card">
            <h1>Home Page</h1>
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
