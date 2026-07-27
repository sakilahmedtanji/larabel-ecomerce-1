@extends('customer.master')

@section('content')
<!-- min-vh-80 manually layout container ke viewport ensure korbe footer push korar jonno -->
<div class="container-fluid mt-4 mb-5" style="min-height: 75vh;">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 col-12">
            
            <!--begin::Profile Form Card-->
            <div class="card bg-dark text-light border-0 shadow-lg rounded-3">
                <div class="card-header border-secondary border-opacity-25 py-3">
                    <h5 class="mb-0 fw-bold tracking-wide"><i class="bi bi-person-gear me-2 text-primary"></i>Profile Information Form</h5>
                </div>

                <div class="card-body p-4">
                    <form action="{{ url('/customer/cradentialupdate') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf

                        <!-- Name Input Block -->
                        

                        <!-- Email Input Block -->
                        <div class="mb-3">
                            <label class="form-label fw-medium text-muted small">Email Address</label>
                            <input type="email" name="old_password" value="{{ $authuser->email }}" class="form-control bg-transparent text-light border-secondary border-opacity-50 shadow-none py-2 focus-primary" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium text-muted small">Old password </label>
                            <input type="password" name="password" value="{{ $authuser->password }}" class="form-control bg-transparent text-light border-secondary border-opacity-50 shadow-none py-2 focus-primary" placeholder="Enter your old password" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium text-muted small">New Password</label>
                            <input type="Password" name="email" value="" class="form-control bg-transparent text-light border-secondary border-opacity-50 shadow-none py-2 focus-primary" placeholder="Enter your new password" >
                        </div>

                       

                        <!-- Profile Media Upload Matrix -->
                        

                        <!-- Form Submit Button Trigger -->
                        <button type="submit" class="btn btn-primary w-100 fw-bold py-2.5 shadow-sm rounded-2 transition-all">
                            <i class="bi bi-check-circle me-1"></i> Save changes
                        </button>
                    </form>
                </div>
            </div>
            <!--end::Profile Form Card-->

        </div>
    </div>
</div>



<style>
    /* Focus highlights styling setup for flawless custom dark layouts mapping */
    .focus-primary:focus {
        border-color: #0d6efd !important;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15) !important;
    }
    .transition-all { transition: all 0.2s ease-in-out; }
</style>
@endsection