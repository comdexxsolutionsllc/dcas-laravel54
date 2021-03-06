@extends('Internal::layouts.master')

@section('title', $ticket->title)

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                </div>

                <div class="panel-body">
                    @include('Internal::includes.flash')

                    <div class="ticket-info">
                        <p>Category: &nbsp; {{ $category->name }}</p>
                        <div style="float: left; width: auto;">
                            @if ($ticket->status === 'Open')
                                Status: &nbsp; &nbsp; &nbsp; &nbsp; <span class="label label-success"
                                                                          style="float: right; width: 100px;">{{ $ticket->status }}</span>
                            @else
                                Status: &nbsp; &nbsp; &nbsp; &nbsp; <span class="label label-danger"
                                                                          style="float: right; width: 100px;">{{ $ticket->status }}</span>
                            @endif
                        </div>
                        <p style="clear: both"></p>
                        <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
                        <p style="padding-top: 25px">{{ $ticket->message }}</p>
                    </div>

                    <hr>

                    @if (count($ticket['comments']))
                        <div class="comments">
                            @foreach ($ticket['comments'] as $comment)
                                <div class="panel panel-@if($ticket->user->id === $comment->user_id) {{"default"}}@else{{"success"}}@endif">
                                    <div class="panel panel-heading">
                                        {{ $comment->user->name }}
                                        <span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
                                    </div>

                                    <div class="panel panel-body">
                                        {{ $comment->comment }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="comment-form">
                        <form action="{{ url('comment') }}" method="POST" class="form">
                            {!! csrf_field() !!}

                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection