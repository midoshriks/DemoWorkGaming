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
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.orders.index') }}">{{ display('Order') }}</a>
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
                                        <th>{{ display('action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $index => $order)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $order->order_numper }}</td>
                                            <td>{{ $order->users->first_name }}</td>
                                            <td>{{ $order->payment_method_id }}</td>
                                            {{-- @dd($order->products->helper_id == null ? $order->products->type->name : $order->products->helper->name) --}}
                                            <td>
                                                {{ $order->products->helper_id == null ? $order->products->type->name : $order->products->helper->name }}
                                            </td>
                                            <td>{{ $order->type->name }}</td>
                                            <td> {{ $order->amount }} </td>
                                            <td> {{ $order->total }} </td>
                                            <td>
                                                <div class="mb-3">
                                                    <label class="form-check form-switch">
                                                        <!-- Rounded switch -->
                                                        <label class="switch">
                                                            <input class="form-check-input btn-active" type="checkbox"
                                                                {{ $order->type->name == 'confirm' ? 'checked' : '' }}
                                                                data-form-id="order-active-{{ $order->id }}"
                                                                data-name-item="{{ $order->order_numper }}">
                                                        </label>

                                                        <form id="order-active-{{ $order->id }}" style="display: none"
                                                            action="{{ route('dashboard.order.active', $order->id) }}"
                                                            {{-- action="{{ route('dashboard.users.update', $user->id) }}" --}} method="POST"
                                                            style="display: inline-block;">
                                                            @csrf
                                                            @method('PUT')
                                                            <input name="type_id"
                                                                value="{{ $order->type->name == 'confirm' ? 9 : 10 }}">
                                                            <input type="submit" value="save">
                                                        </form>
                                                    </label>
                                                </div>
                                            </td>
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
