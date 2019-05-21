@if(Session::has('errors'))
    <div class="alert alert-danger">
            {{ session('errors') }}
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@foreach($polls as $poll)
    <h5>Poll: {{ $poll->question }}</h5>

    @foreach($poll->options as $option)
        <div class='result-option-id'>
            <strong>{{ $option->name }}</strong><span class='pull-right'>{{ $option->votes }}%</span>
            <div class='progress'>
                <div class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='{{ $option->percent }}' aria-valuemin='0' aria-valuemax='100' style='width: {{ $option->votes }}%'>
                    <span class='sr-only'>{{ $option->votes }}% Complete</span>
                </div>
            </div>
        </div>
    @endforeach
@endforeach
