@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ ucfirst(__('app.' . $names['plural'])) }} <small>({{ count($elements) }} {{ __('app.elements') }})</small>
                </div>
                <div class="card-body">
                    @if(count($elements))
                        @foreach ($elements as $element)
                            <div class="row">
                                <div class="col-8">
                                    {{ $element->nichandle ?? $element->app_conskey }}<br />
                                </div>
                                <div class="col-4 text-right">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="/{{ $names['plural'] }}/{{ $element->id }}" class="btn btn-outline-success btn-sm" title="{{ ucfirst(__('app.show')) }}">
                                                <span class="ti-menu"></span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="/{{ $names['plural'] }}/{{ $element->id }}/edit" class="btn btn-outline-primary btn-sm" title="{{ ucfirst(__('app.edit')) }}">
                                                <span class="ti-pencil"></span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <form action="/{{ $names['plural'] }}/{{ $element->id }}" method="post" class="delete" title="{{ ucfirst(__('app.delete')) }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="delete">
                                                <button class="btn btn-outline-danger btn-sm">
                                                    <span class="ti-trash"></span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>{{ __('app.noData') }}</p>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ $names['plural'] }}/create" class="btn btn-primary" title="{{ __('app.add') }}">
                                <span class="ti-plus"></span>
                            </a>
                        </div>
                        <div class="col-6 text-right">
                            <ul class="pagination">
                                {{ $elements->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection