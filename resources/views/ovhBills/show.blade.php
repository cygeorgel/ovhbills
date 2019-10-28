@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
           {{ ucfirst($names['singular']) }} {{ __('app.colon') }} {{ $element->billId }}
        </div>
        <div class="card-body">
            @foreach ($element->details as $detail)
                <div class="row">
                    <div class="col-2">
                        {{ $detail->billDetailId }}
                    </div>
                    <div class="col-2">
                        {{ $detail->description }}
                    </div>
                    <div class="col-2">
                        {{ $detail->domain }}
                    </div>
                    <div class="col-2">
                        {{ isset($detail->periodStart) ? $detail->periodStart->format('d/m/Y') : null }}
                    </div>
                    <div class="col-2">
                        {{ isset($detail->periodEnd) ? $detail->periodEnd->format('d/m/Y') : null }}
                    </div>
                    <div class="col-2 text-right">
                        {{ amount($detail->totalPrice) }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-6">
                    <a href="{{ url()->previous() }}">
                        <span class="ti-back-right"></span>
                    </a>
                </div>
                </div>
                </div>
                <div class="col-6 text-right">
                    <ul class="pagination">
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection