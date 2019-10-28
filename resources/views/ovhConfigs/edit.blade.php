@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ ucfirst($names['singular']) }}: {{ $element->nichandle ?? $element->conskey }}
        </div>
        <div class="card-body">
            <form class="form-horizontal form-material" action="/{{ $names['plural'] }}/{{ $element->id }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include($names['plural'] .'.form')
            </form>
        </div>
    </div>

@endsection