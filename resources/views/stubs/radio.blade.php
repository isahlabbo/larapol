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
<form method="POST" action="{{ route('poll.vote', $poll->id) }}" >
    @csrf
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-arrow-right"></span> {{ $poll->question }}
            </h3>
        </div>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            @foreach($poll->options as $option)
                <li class="list-group-item">
                    <div class="radio">
                        <label>
                            <input value="{{ $option->id }}" type="radio" name="options">
                            {{ $option->name }}
                        </label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="panel-footer">
        <input type="submit" class="btn btn-primary btn-sm" value="Vote" />
    </div>
</form>
@endforeach
