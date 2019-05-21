@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('poll.create')}}" class="btn btn-primary btn-block">New Poll</a>
                    <a href="{{route('poll.home')}}" class="btn btn-primary btn-block">Vote</a>
                    <a href="{{route('poll.result')}}" class="btn btn-primary btn-block">View Result</a>
                    <a href="{{route('poll.index')}}" class="btn btn-primary btn-block">View Polls</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
