@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <hr>
            <h2>OvhBills</h2>
            <form action="/ovhBills" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <select name="month" class="form-control" onchange="form.submit()">
                        @foreach (pastMonths() as $element)
                            <option value="{{ $element->format('Y-m') }}" {{ $month->format('Y-m') == $element->format('Y-m') ? 'selected="selected' : null  }}>{{ $element->format('m/Y') }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="col-6">
            <div class="card mt-4">
                <div class="card-header text-right">
                    {{ ucfirst(__('app.summaryForMonth')) }} {{ __('app.colon') }} {{ $month->format('m/Y') }}
                </div>
                <div class="card-body text-right">
                    <p>
                        {{ __('app.numberOfInvoices') }} {{ __('app.colon') }} <strong>{{ $summary['count'] }}</strong><br />
                        {{ __('app.totalWithoutTax') }} {{ __('app.colon') }} <strong>{{ amount($summary['totalWithoutTax']) }}</strong><br />
                        {{ __('app.tax') }} {{ __('app.colon') }} <strong>{{ amount($summary['tax']) }}</strong><br />
                        {{ __('app.totalWithTax') }} {{ __('app.colon') }} <strong>{{ amount($summary['totalWithTax']) }}</strong><br />
                        {{ __('app.outConsumption') }} {{ __('app.colon') }} <strong>{{ amount($summary['outConsumption']) }}</strong><br />
                        {{ __('app.deposit') }} {{ __('app.colon') }} <strong>{{ amount($summary['deposit']) }}</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header">
                    {{ ucfirst(__('app.' . $names['plural'])) }} {{ __('app.colon') }} {{ $month->format('m/Y') }} <small>({{ count($elements) }} {{ __('app.elements') }})</small>
                </div>
                <div class="card-body">
                    @if(count($elements))
                        @foreach ($elements as $element)
                            <div class="row">
                                <div class="col-2">
                                    <a href="/ovhBills/{{ $element->id  }}">
                                        {{ $element->billId }}
                                    </a>
                                </div>
                                <div class="col-2">
                                    {{ $element->documentDate->format('d/m/Y') }}
                                </div>
                                <div class="col-2 text-right">
                                    <strong>
                                        {{ amount($element->priceWithoutTax) }}
                                    </strong>
                                </div>

                                <div class="col-1 text-right">
                                    {{ amount($element->tax) }}<br />
                                </div>

                                <div class="col-1 text-right">
                                    {{ amount($element->priceWithTax) }}
                                </div>

                                <div class="col-1 text-right">
                                    <small>
                                        {{ amount($element->deposit) }}
                                    </small>
                                </div>

                                <div class="col-1 text-right">
                                    <small>
                                        {{ amount($element->outConsumption) }}
                                    </small>
                                </div>
                                <div class="col-2 text-right">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">

                                            <a href="/{{ $names['plural'] }}/{{ $element->id }}" class="btn btn-outline-success btn-sm" title="{{ ucfirst(__('app.show')) }}">
                                                <span class="ti-eye"></span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">

                                            <a href="/{{ $names['plural'] }}/{{ $element->id }}/document" target="_blank" class="btn btn-outline-primary btn-sm" title="{{ ucfirst(__('app.download')) }}">
                                                <span class="ti-download"></span>
                                            </a>
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