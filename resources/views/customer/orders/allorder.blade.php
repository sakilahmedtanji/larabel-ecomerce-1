@extends('customer.master')

@section('content')
<div class="body flex-grow-1">
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-12">

                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 fw-bold text-primary">
                            Order List
                        </h4>

                        <span class="badge bg-primary-subtle text-primary border border-primary fs-6 px-3 py-2">
                            Total Orders: {{ $orders->count() }}
                        </span>
                    </div>

                    <div class="card-body p-0">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0"
                                   style="width: 100%; min-width: 1100px;">

                                <thead class="table-light text-uppercase"
                                       style="font-size: 14px; letter-spacing: 0.5px;">

                                    <tr>
                                        <th scope="col"
                                            class="ps-4 py-3"
                                            style="width: 7%;">
                                            #ID
                                        </th>

                                        <th scope="col"
                                            class="py-3"
                                            style="width: 12%;">
                                            Invoice
                                        </th>

                                        <th scope="col"
                                            class="py-3"
                                            style="width: 23%;">
                                            Customer Info
                                        </th>

                                        <th scope="col"
                                            class="py-3"
                                            style="width: 28%;">
                                            Product Info
                                        </th>

                                        <th scope="col"
                                            class="py-3"
                                            style="width: 10%;">
                                            Delivery Charge
                                        </th>

                                        <th scope="col"
                                            class="py-3"
                                            style="width: 10%;">
                                            Total Price
                                        </th>

                                        <th scope="col"
                                            class="py-3"
                                            style="width: 10%;">
                                            Status
                                        </th>

                                        <th scope="col"
                                            class="text-end pe-4 py-3"
                                            style="width: 10%;">
                                            Action
                                        </th>
                                    </tr>

                                </thead>

                                <tbody style="font-size: 15px;">

                                    @forelse ($orders as $order)

                                        <tr>

                                            {{-- Order ID --}}
                                            <td class="ps-4 fw-bold">
                                                #{{ $order->id }}
                                            </td>


                                            {{-- Invoice --}}
                                            <td>
                                                <span class="badge bg-secondary-subtle text-body border px-2 py-2 fs-6">
                                                    {{ $order->invoice_number }}
                                                </span>
                                            </td>


                                            {{-- Customer Info --}}
                                            <td>

                                                <div class="fw-bold text-body fs-6">
                                                    {{ $order->name }}
                                                </div>

                                                <div class="text-body-secondary small mt-1">
                                                    <strong>Phone:</strong>
                                                    {{ $order->phone }}
                                                </div>

                                                <div class="text-body-secondary small">
                                                    <strong>Address:</strong>
                                                    {{ $order->adress }}
                                                </div>

                                            </td>


                                            {{-- Product Info --}}
                                            <td class="py-3">

                                                @forelse ($order->orderdetails as $detail)

                                                    <div class="d-flex align-items-center mb-2 pb-2 border-bottom border-secondary-subtle">

                                                        {{-- Product Image --}}
                                                        <div class="flex-shrink-0">

                                                            @if ($detail->product && $detail->product->image)

                                                                <img src="{{ $detail->product->image }}"
                                                                     alt="{{ $detail->product->name }}"
                                                                     class="rounded border border-secondary-subtle"
                                                                     style="width: 55px; height: 55px; object-fit: cover; display: block;">

                                                            @else

                                                                <div class="rounded border border-secondary-subtle d-flex align-items-center justify-content-center"
                                                                     style="width: 55px; height: 55px;">

                                                                    <span class="text-body-secondary small">
                                                                        N/A
                                                                    </span>

                                                                </div>

                                                            @endif

                                                        </div>


                                                        {{-- Product Details --}}
                                                        <div class="flex-grow-1 ms-3">

                                                            @if ($detail->product)

                                                                <div class="fw-bold text-body"
                                                                     style="line-height: 1.2;">

                                                                    {{ $detail->qty ?? 1 }}x
                                                                    {{ $detail->product->name }}

                                                                </div>

                                                            @else

                                                                <div class="fw-bold text-danger"
                                                                     style="line-height: 1.2;">

                                                                    Product Not Found

                                                                </div>

                                                            @endif


                                                            <small class="text-body-secondary d-block mt-1">

                                                                <strong>Color:</strong>
                                                                {{ $detail->color ?? 'N/A' }}

                                                                |

                                                                <strong>Size:</strong>
                                                                {{ $detail->size ?? 'N/A' }}

                                                            </small>


                                                            <small class="text-body-secondary d-block mt-1">

                                                                <strong>Price:</strong>
                                                                ৳{{ number_format($detail->price ?? 0, 2) }}

                                                            </small>

                                                        </div>

                                                    </div>

                                                @empty

                                                    <span class="text-body-secondary">
                                                        No product found
                                                    </span>

                                                @endforelse

                                            </td>


                                            {{-- Delivery Charge --}}
                                            <td class="fw-semibold text-body">

                                                ৳{{ number_format($order->charge ?? 0, 2) }}

                                            </td>


                                            {{-- Total Price --}}
                                            <td class="fw-bold text-success fs-6">

                                                ৳{{ number_format($order->price ?? 0, 2) }}

                                            </td>


                                            {{-- Status --}}
                                            <td>

                                                @if ($order->status == 'pending')

                                                    <span class="badge bg-warning-subtle text-warning border border-warning px-3 py-2 rounded-pill">
                                                        Pending
                                                    </span>

                                                @elseif ($order->status == 'processing')

                                                    <span class="badge bg-info-subtle text-info border border-info px-3 py-2 rounded-pill">
                                                        Processing
                                                    </span>

                                                @elseif ($order->status == 'confirmed')

                                                    <span class="badge bg-primary-subtle text-primary border border-primary px-3 py-2 rounded-pill">
                                                        Confirmed
                                                    </span>

                                                @elseif ($order->status == 'shipped')

                                                    <span class="badge bg-info-subtle text-info border border-info px-3 py-2 rounded-pill">
                                                        Shipped
                                                    </span>

                                                @elseif ($order->status == 'completed')

                                                    <span class="badge bg-success-subtle text-success border border-success px-3 py-2 rounded-pill">
                                                        Completed
                                                    </span>

                                                @elseif ($order->status == 'cancelled')

                                                    <span class="badge bg-danger-subtle text-danger border border-danger px-3 py-2 rounded-pill">
                                                        Cancelled
                                                    </span>

                                                @else

                                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary px-3 py-2 rounded-pill">
                                                        {{ ucfirst($order->status) }}
                                                    </span>

                                                @endif

                                            </td>


                                            {{-- Action --}}
                                            <td class="text-end pe-4">

                                                @if ($order->status == 'pending' || $order->status == 'confirmed')

                                                    <a href="{{ url('/order-cancel/' . $order->id) }}"
                                                       class="btn btn-sm btn-danger"
                                                       onclick="return confirm('Are you sure you want to cancel this order?');">
                                                        Cancel
                                                    </a>
                                                    @else
                                                    <a class="btn btn-sm btn-secondary disabled">
                                                        {{ ucfirst($order->status) }}
                                                    </a>
                                                @endif

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td colspan="8"
                                                class="text-center py-5">

                                                <div class="text-body-secondary">

                                                    <div class="fs-5 fw-semibold">
                                                        No Orders Found
                                                    </div>

                                                    <small>
                                                        You don't have any orders in this section.
                                                    </small>

                                                </div>

                                            </td>

                                        </tr>

                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection