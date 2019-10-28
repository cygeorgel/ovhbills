@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            {{ ucfirst(__('app.welcome')) }}
        </div>
        <div class="card-body">
            <p>
                <a href="ovhConfigs">
                    {{ ucfirst(__('app.settings')) }}
                </a>
            </p>
            <p>
                <a href="ovhBills">
                    OvhBills
                </a>
            </p>
            <p>
                <a href="https://bluerocktel.com">
                    BlueRockTEL
                </a>
            </p>
        </div>
    </div>
</div>

@endsection
