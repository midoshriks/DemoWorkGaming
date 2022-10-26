@extends('layouts.dashboard.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        {{-- @mido_shriks show errors --}}
        @include('partials._errors')

        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        {{ display('Smart bucks') }}
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ display('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.orders.index') }}">{{ display('Order') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ display('Data orders tables') }}</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page title actions -->
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ display('No.Orders') }}</th>
                                        <th>{{ display('name users') }}</th>
                                        <th>{{ display('payment') }}</th>
                                        <th>{{ display('product') }}</th>
                                        <th>{{ display('type') }}</th>
                                        <th>{{ display('amount') }}</th>
                                        <th>{{ display('product price') }}</th>
                                        <th>{{ display('total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $index => $order)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $order->order_numper }}</td>
                                            {{-- @dd($order->users->first_name) --}}
                                            <td>{{ $order->users->first_name }}</td>
                                            <td>{{ $order->payment_method_id }}</td>
                                            <td>{{ $order->products->type->name }}</td>
                                            <td>{{ $order->type->name }}</td>
                                            <td> {{ $order->amount }} </td>
                                            <td> {{ $order->product_price }} </td>
                                            <td> {{ $order->total }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
