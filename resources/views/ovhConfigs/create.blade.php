@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ ucfirst(__('app.' . $names['singular'])) }} {{ __('app.colon') }} {{ __('app.new') }}
        </div>
        <div class="card-body">
            <form class="form-horizontal form-material" action="/{{ $names['plural'] }}" method="post">
                @csrf
                @include($names['plural'] .'.form')
            </form>
        </div>
    </div>

@endsection