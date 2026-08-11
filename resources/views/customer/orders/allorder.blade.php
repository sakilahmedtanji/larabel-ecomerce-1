@extends('customer.master')

@section('content')
<div class="body flex-grow-1">
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 fw-bold text-primary">Order List</h4>
                        <span class="badge bg-primary fs-6 px-3 py-2">Total Orders: 2</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0" style="width: 100%; min-width: 1000px;">
                                <thead class="table-light text-uppercase" style="font-size: 14px; letter-spacing: 0.5px;">
                                    <tr>
                                        <th scope="col" class="ps-4 py-3" style="width: 8%;">#ID</th>
                                        <th scope="col" class="py-3" style="width: 12%;">Invoice</th>
                                        <th scope="col" class="py-3" style="width: 25%;">Customer Info</th>
                                        <th scope="col" class="py-3" style="width: 25%;">Product Info</th>
                                        <th scope="col" class="py-3" style="width: 10%;">Delivery Charge</th>
                                        <th scope="col" class="py-3" style="width: 10%;">Total Price</th>
                                        <th scope="col" class="py-3" style="width: 10%;">Status</th>
                                        <th scope="col" class="text-end pe-4 py-3" style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 15px;">
                                    <!-- Order Row 1 -->
                                    <tr>
                                        <td class="ps-4 fw-bold">#1</td>
                                        <td>
                                            <span class="badge bg-secondary-subtle text-body border px-2 py-2 fs-6">XYZ-1001</span>
                                        </td>
                                        <td>
                                            {{-- text-dark এর পরিবর্তে text-body ব্যবহার করা হয়েছে যা ডার্ক মোডে স্বয়ংক্রিয়ভাবে সাদা দেখাবে --}}
                                            <div class="fw-bold text-body fs-6">Sakil Hossain</div>
                                            <div class="text-body-secondary small mt-1">
                                                <strong>Phone:</strong> 01700000000
                                            </div>
                                            <div class="text-body-secondary small">
                                                <strong>Address:</strong> Dhaka, Bangladesh
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <!-- Product Item 1 -->
                                            <div class="d-flex align-items-center mb-2 pb-2 border-bottom border-secondary-subtle">
                                                <div class="flex-shrink-0">
                                                    <img src="https://via.placeholder.com/100" 
                                                         alt="Product" 
                                                         class="rounded border border-secondary-subtle" 
                                                         style="width: 55px; height: 55px; object-fit: cover; display: block;">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <div class="fw-bold text-body" style="line-height: 1.2;">1x T-Shirt Classic</div>
                                                    <small class="text-body-secondary d-block mt-1">Color: Red | Size: M</small>
                                                </div>
                                            </div>
                                            <!-- Product Item 2 -->
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="https://via.placeholder.com/100" 
                                                         alt="Product" 
                                                         class="rounded border border-secondary-subtle" 
                                                         style="width: 55px; height: 55px; object-fit: cover; display: block;">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <div class="fw-bold text-body" style="line-height: 1.2;">1x Smart Watch</div>
                                                    <small class="text-body-secondary d-block mt-1">Color: Black | Size: Standard</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="fw-semibold text-body">৳60.00</td>
                                        <td class="fw-bold text-success fs-6">৳150.00</td>
                                        <td>
                                            <span class="badge bg-success-subtle text-success border border-success px-3 py-2 rounded-pill">Completed</span>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="#" class="btn btn-primary btn-sm px-3 shadow-sm">
                                                View
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Order Row 2 -->
                                    <tr>
                                        <td class="ps-4 fw-bold">#2</td>
                                        <td>
                                            <span class="badge bg-secondary-subtle text-body border px-2 py-2 fs-6">XYZ-1002</span>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-body fs-6">Rahim Ahmed</div>
                                            <div class="text-body-secondary small mt-1">
                                                <strong>Phone:</strong> 01800000000
                                            </div>
                                            <div class="text-body-secondary small">
                                                <strong>Address:</strong> Chittagong, Bangladesh
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="https://via.placeholder.com/100" 
                                                         alt="Product" 
                                                         class="rounded border border-secondary-subtle" 
                                                         style="width: 55px; height: 55px; object-fit: cover; display: block;">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <div class="fw-bold text-body" style="line-height: 1.2;">2x Running Shoes</div>
                                                    <small class="text-body-secondary d-block mt-1">Color: Blue | Size: 42</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="fw-semibold text-body">৳120.00</td>
                                        <td class="fw-bold text-success fs-6">৳320.00</td>
                                        <td>
                                            <span class="badge bg-warning-subtle text-warning border border-warning px-3 py-2 rounded-pill">Pending</span>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="#" class="btn btn-primary btn-sm px-3 shadow-sm">
                                                View
                                            </a>
                                        </td>
                                    </tr>
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