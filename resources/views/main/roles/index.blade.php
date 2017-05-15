@extends('layouts.app')

@section('content')
    <div class="container">
        @if(\Cache::get('role_count'))
            @foreach(\Cache::get('roles') as $role)
                <div class="row">
                    <ul>
                        <li><span>Name:</span>           {{ $role->name }}</li>
                        <li><span>Display Name:</span>   {{ $role->display_name }}</li>
                        <li><span>Description:</span>    {{  $role->description }}</li>
                    </ul>
                </div>
            @endforeach
        @else
            No results for Role
        @endif
    </div>
@endsection

@push('scripts')
@endpush