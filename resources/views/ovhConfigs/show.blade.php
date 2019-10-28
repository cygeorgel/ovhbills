@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
           {{ ucfirst($names['singular']) }}: {{ $element->nichandle ?? $element->app_conskey }}
        </div>
        <div class="card-body">
            <p>{{ $element->nichandle ?? $element->app_conskey}}</p>
        </div>
        <div class="card-footer">
            <a href="/{{ $names['plural']}}/{{ $element->id }}/edit">
                <button type="button"  class="btn btn-info">Edit</button>
            </a>
        </div>
    </div>

@endsection