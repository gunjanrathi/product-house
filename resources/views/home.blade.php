@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @auth
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ url('/products') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Product</a>
                    
                </div>
            </div>
        </div>
    @endauth
    </div>
</div>
@endsection
