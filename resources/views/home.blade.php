@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Online Users</div>

                    <div class="panel-body">
                        <div id="onlineStats" class="panel panel-default">
                            <div id="numberOfUsersOnline" class="col-xs-5">Number of Users
                                Online {{ $numberOfUsers }}</div>
                            <div id="numberOfUsersOnline" class="col-xs-5">Number of Guests
                                Online {{ $numberOfGuests }}</div>
                        </div>
                        <div id="onlineUsers" class="panel panel-default">
                            @foreach($activities as $activity)
                                <div id="online-user-{{ $activity->user->id  }}"
                                     class="col-xs-10"
                                     data-lastlogin="{{ $activity->user->last_logged_in_at  }}">{{ $activity->user->name }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
