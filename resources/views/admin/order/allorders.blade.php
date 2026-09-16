@extends('admin.master')

@section('maincontent')
<main class="app-main py-4">
    <!--begin::App Content Header-->
    <div class="app-content-header pb-3 mb-4 border-bottom border-light-subtle">
        <div class="container-fluid">
            <form action="{{ url('/order-management/'.$status) }}" method="GET">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control" placeholder="Search by Invoice or Phone">
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            Search
                        </button>

                        <a href="{{ url('/order-management/'.$status) }}" class="btn btn-secondary">
                            Reset
                        </a>
                    </div>
                </div>
            </form>
            <div class="row align-items-center col-mb-2">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center gap-2">
                        <div class="p-2 bg-primary bg-opacity-10 text-primary rounded-3">
                            <i class="bi bi-cart-check-fill fs-4"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold fs-4 text-dark">Order Management</h3>
                            <p class="text-muted small mb-0">Track, process, and manage customer shipments & orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none"><i class="bi bi-house-door-fill me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Orders</li>
                    </ol>
                </div>
            </div>
        </div>

    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <form action="{{url('/bulk-order-print')}}" method="post" class="mb-3">
                        @csrf
                        <div>
                            <button type="submit" class="btn btn-primary rounded-pill px-3 py-1 shadow-sm d-inline-flex align-items-center gap-1">
                                <i class="bi bi-download"></i>
                                <span>Print Orders</span>
                            </button>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 d-flex align-items-center p-3 mb-4" role="alert">
                            <div class="bg-success text-white rounded-circle p-1 me-3 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                                <i class="bi bi-check-lg fs-6"></i>
                            </div>
                            <div class="flex-grow-1 text-dark fw-medium fs-7">
                                {{ session('success') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <!-- Main Orders Table Card -->
                        <div class="card shadow-xs border border-light-subtle rounded-4 overflow-hidden mb-4">
                            <div class="card-header bg-white border-bottom border-light-subtle py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-primary-soft text-primary rounded-pill px-2.5 py-1.5 fw-semibold" style="font-size: 0.75rem;">
                                        Total: {{ count($orders) }} Orders
                                    </span>
                                    <h5 class="card-title mb-0 fw-bold text-dark fs-6">Recent Customer Orders</h5>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0 custom-table">
                                        <thead class="bg-body-tertiary text-uppercase text-secondary tracking-wider" style="font-size: 0.72rem; letter-spacing: 0.6px;">
                                            <tr>
                                                <th class="py-3"><input type="checkbox" id="select-all" class="form-check-input"></th>
                                                <th class="text-center py-3 ps-3" style="width: 50px;">#</th>
                                                <th class="py-3">Date</th>
                                                <th class="py-3">Invoice</th>
                                                <th class="py-3" style="min-width: 200px;">Customer Info</th>
                                                <th class="py-3" style="min-width: 220px;">Product(s)</th>
                                                <th class="text-center py-3">Delivery</th>
                                                <th class="text-center py-3">Total Amount</th>
                                                <th class="text-center py-3">Courier</th>
                                                <th class="text-center py-3">Status</th>
                                                <th class="text-end py-3 pe-4" style="width: 110px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="border-top-0">
                                            @forelse($orders as $order)
                                            <tr class="table-row-hover">
                                                <!-- Serial -->
                                                <td>
                                                    <input type="checkbox" name="order_ids[]" value="{{ $order->id }}" class="form-check-input">
                                                </td>
                                                <td class="text-center fw-semibold text-secondary ps-3 fs-7">
                                                    {{ $loop->iteration }}
                                                </td>

                                                <!-- Date -->
                                                <td class="text-nowrap">
                                                    <span class="d-block fw-semibold text-dark fs-7">{{ $order->created_at ? $order->created_at->format('d M, Y') : 'N/A' }}</span>
                                                    <small class="text-muted fs-8">{{ $order->created_at ? $order->created_at->format('h:i A') : '' }}</small>
                                                </td>

                                                <!-- Invoice Number -->
                                                <td>
                                                    <span class="badge bg-light border border-light-subtle text-dark fw-bold px-2 py-1 fs-8">
                                                        #{{ $order->invoice_number }}
                                                    </span>
                                                </td>

                                                <!-- Customer Info -->
                                                <td>
                                                    <div class="d-flex flex-column gap-1">
                                                        <span class="fw-bold text-dark fs-7">{{ $order->name }}</span>
                                                        <a href="tel:{{ $order->phone }}" class="text-muted text-decoration-none fs-8 d-flex align-items-center gap-1">
                                                            <i class="bi bi-telephone text-primary"></i> {{ $order->phone }}
                                                        </a>
                                                        <span class="text-muted fs-8 d-flex align-items-center gap-1 text-truncate" style="max-width: 220px;" title="{{ $order->adress }}">
                                                            <i class="bi bi-geo-alt text-danger"></i> {{ $order->adress }}
                                                        </span>
                                                        @if($order->ip_adress)
                                                        <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-1.5 py-0.5 rounded-pill align-self-start fs-9 mt-0.5">
                                                            IP: {{ $order->ip_adress }}
                                                        </span>
                                                        @endif
                                                    </div>
                                                </td>

                                                <!-- Products Ordered -->
                                                <td>
                                                    <div class="d-flex flex-column gap-2 py-1">
                                                        @if($order->orderdetails)
                                                        @foreach($order->orderdetails as $details)
                                                        <div class="d-flex align-items-center gap-2 p-1 rounded-2 bg-light-subtle border border-light-subtle">
                                                            @if(isset($details->product->image))
                                                            <img src="{{ asset($details->product->image) }}" alt="Product" class="rounded-2 border border-light-subtle object-fit-cover shadow-2xs" width="38" height="38">
                                                            @else
                                                            <div class="rounded-2 border bg-light d-flex align-items-center justify-content-center text-muted" style="width: 38px; height: 38px;">
                                                                <i class="bi bi-image fs-6 opacity-50"></i>
                                                            </div>
                                                            @endif
                                                            <div class="d-flex flex-column lh-1">
                                                                <span class="fs-8 fw-semibold text-dark text-truncate" style="max-width: 140px;" title="{{ $details->product->name ?? 'Product' }}">
                                                                    {{ $details->product->name ?? 'Product' }}
                                                                </span>
                                                                <span class="fs-9 text-muted mt-1">Qty: <strong class="text-primary">{{ $details->qty }}</strong></span>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                </td>

                                                <!-- Delivery Charge -->
                                                <td class="text-center font-monospace fs-7 text-secondary">
                                                    ৳{{ number_format((float)$order->charge, 2) }}
                                                </td>

                                                <!-- Total Price -->
                                                <td class="text-center">
                                                    <span class="fw-bold text-success font-monospace fs-6">৳{{ number_format((float)$order->price, 2) }}</span>
                                                </td>

                                                <!-- Courier -->
                                                <td class="text-center align-middle">
                                                    <div class="d-flex flex-column align-items-center justify-content-center gap-2">

                                                        {{-- Courier Selection or Display --}}
                                                        @if($order->status == 'pending')
                                                        <form action="{{ url('/order-curier/add/' . $order->id) }}" method="POST" class="w-100" style="max-width: 150px;">
                                                            @csrf
                                                            <div class="input-group input-group-sm">
                                                                <span class="input-group-text bg-light border-end-0 text-muted">
                                                                    <i class="bi bi-truck"></i>
                                                                </span>
                                                                <select name="curier" class="form-select form-select-sm border-start-0 shadow-none fw-medium" onchange="this.form.submit()">
                                                                    <option value="" disabled {{ empty($order->curier) ? 'selected' : '' }}>Select Courier</option>
                                                                    <option value="Steadfast" {{ $order->curier == 'Steadfast' ? 'selected' : '' }}>Steadfast</option>
                                                                    <option value="Pathao" {{ $order->curier == 'Pathao' ? 'selected' : '' }}>Pathao</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                        @elseif($order->consignment_id == null && !empty($order->curier))
                                                        <span class="badge bg-secondary-subtle text-secondary-emphasis border border-secondary-subtle rounded-pill px-3 py-1 fw-semibold">
                                                            <i class="bi bi-truck me-1"></i>{{ $order->curier }}
                                                        </span>
                                                        @endif

                                                        {{-- Tracking Action Buttons --}}
                                                        @if($order->curier != null && $order->tracking == null)
                                                        <a href="{{ url('/order-curier/update/' . $order->id) }}" class="btn btn-sm btn-primary rounded-pill px-3 py-1 shadow-sm d-inline-flex align-items-center gap-1">
                                                            <i class="bi bi-send-fill"></i>
                                                            <span>Send to Courier</span>
                                                        </a>
                                                        @elseif($order->curier != null && $order->tracking != null)
                                                        <a href="{{ $order->tracking }}" target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1 shadow-sm d-inline-flex align-items-center gap-1">
                                                            <i class="bi bi-geo-alt-fill"></i>
                                                            <span>Track Order</span>
                                                        </a>
                                                        @endif

                                                    </div>
                                                </td>

                                                <!-- Status Badge -->
                                                <td class="text-center">



                                                    <form action="{{ url('/order-status/update/' . $order->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        <select name="status" class="form-select form-select-sm text-capitalize" onchange="this.form.submit()">
                                                            <option value="" disabled>Select Status</option>
                                                            <option value="pending" @if($order->status == 'pending') selected @endif>Pending</option>
                                                            <option value="confirmed" @if($order->status == 'confirmed') selected @endif>Confirmed</option>
                                                            <option value="delivered" @if($order->status == 'delivered') selected @endif>Delivered</option>
                                                            <option value="cancelled" @if($order->status == 'cancel') selected @endif>Cancel</option>
                                                            <option value="return" @if($order->status == 'return') selected @endif>return</option>
                                                        </select>
                                                    </form>

                                                </td>

                                                <!-- Actions -->
                                                <td class="text-end pe-4">
                                                    <div class="d-inline-flex gap-1.5">
                                                        <a href="{{url('/order-management/edit/'.$order->id)}}" class="btn-action-icon btn-edit text-primary rounded-2 d-flex align-items-center justify-content-center text-decoration-none" data-bs-toggle="tooltip" title="Edit / View Order">
                                                            <i class="bi bi-pencil-square fs-6"></i>
                                                        </a>
                                                        <a href="{{url('/order-management/delete/'.$order->id)}}" class="btn-action-icon btn-delete text-danger rounded-2 d-flex align-items-center justify-content-center text-decoration-none" onclick="return confirm('Are you sure you want to delete this order?')" data-bs-toggle="tooltip" title="Delete Order">
                                                            <i class="bi bi-trash3-fill fs-6"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="10" class="text-center py-5 text-muted">
                                                    <div class="empty-state-box py-4">
                                                        <div class="bg-light rounded-circle p-3 d-inline-flex mb-3">
                                                            <i class="bi bi-cart-x fs-1 text-secondary opacity-50"></i>
                                                        </div>
                                                        <h6 class="fw-semibold text-dark mb-1">No Orders Found</h6>
                                                        <p class="text-muted small mb-0">There are currently no customer orders in this category.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Card Footer / Pagination -->
                            @if(method_exists($orders, 'links'))
                            <div class="card-footer bg-white border-top border-light-subtle py-3 px-4">
                                <div class="d-flex justify-content-end">
                                    {!! $orders->links() !!}
                                </div>
                            </div>
                            @endif
                        </div>
                    </form>
                    <!-- End Main Orders Table Card -->

                </div>
            </div>
        </div>
    </div>
</main>

<style>
    /* Consistent Admin Theme Styles */
    .bg-primary-soft {
        background-color: rgba(37, 99, 235, 0.1) !important;
    }

    .bg-warning-soft {
        background-color: rgba(245, 158, 11, 0.15) !important;
    }

    .shadow-xs {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04), 0 1px 2px -1px rgba(0, 0, 0, 0.04) !important;
    }

    .shadow-2xs {
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03) !important;
    }

    /* Table Hover & Transitions */
    .custom-table tbody tr {
        transition: background-color 0.15s ease-in-out;
    }

    .custom-table tbody tr:hover {
        background-color: #f8fafc !important;
    }

    /* Action Buttons */
    .btn-action-icon {
        width: 32px;
        height: 32px;
        border: 1px solid transparent;
        background-color: #f8fafc;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-edit:hover {
        background-color: rgba(37, 99, 235, 0.1) !important;
        border-color: rgba(37, 99, 235, 0.2);
        transform: translateY(-2px);
    }

    .btn-delete:hover {
        background-color: rgba(239, 68, 68, 0.1) !important;
        border-color: rgba(239, 68, 68, 0.2);
        transform: translateY(-2px);
    }

    .fs-7 {
        font-size: 0.84rem;
    }

    .fs-8 {
        font-size: 0.74rem;
    }

    .fs-9 {
        font-size: 0.68rem;
    }

</style>
@endsection
@push('java')
<script>
    document.getElementById('select-all').addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('.form-check-input');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

</script>

@endpush
