@extends('layouts.app')

@section('content')
    @if(count($roles))
        @foreach($roles as $role)
            {{ $role->name }} {{ $role->display_name }} {{  $role->description }}
        @endforeach
    @else
        No results for Role
    @endif
@endsection

@push('scripts')
@endpush