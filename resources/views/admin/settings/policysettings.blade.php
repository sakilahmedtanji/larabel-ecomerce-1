@extends('admin.master')

@section('maincontent')
<main class="app-main py-4">
    <!--begin::App Content Header-->
    <div class="app-content-header pb-3 mb-4 border-bottom border-light-subtle">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center gap-2">
                        <div class="p-2 bg-primary bg-opacity-10 text-primary rounded-3">
                            <i class="bi bi-shield-check fs-4"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold fs-4 text-dark">Policy & Legal Settings</h3>
                            <p class="text-muted small mb-0">Configure store terms, customer privacy policies, and about terms</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none"><i class="bi bi-house-door-fill me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Settings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Policy</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 p-3 mb-4" role="alert">
                            <div class="d-flex align-items-start">
                                <div class="bg-danger text-white rounded-circle p-1 me-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 26px; height: 26px;">
                                    <i class="bi bi-exclamation-triangle-fill fs-7"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-1 text-danger">Please fix the following errors:</h6>
                                    <ul class="mb-0 ps-3 fs-7">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

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

                    <!-- Main Form Card -->
                    <div class="card shadow-xs border border-light-subtle rounded-4 overflow-hidden mb-4">
                        <div class="card-header bg-white border-bottom border-light-subtle py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary-soft text-primary rounded-pill px-2.5 py-1.5 fw-semibold" style="font-size: 0.75rem;">
                                    Configuration
                                </span>
                                <h5 class="card-title mb-0 fw-bold text-dark fs-6">Legal & Policy Terms</h5>
                            </div>
                        </div>
                        
                        <form method="POST" action="{{ url('/Policy-settings/update') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            
                            <div class="card-body p-4">
                                
                                <!-- 1. Privacy Policy Section -->
                                <div class="section-divider mb-4">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <div class="section-icon-box bg-primary-soft text-primary rounded-2 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-shield-lock-fill fs-6"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark fs-6">Privacy Policy <span class="text-danger">*</span></h6>
                                            <small class="text-muted fs-8">Customer data collection, security, and usage guidelines</small>
                                        </div>
                                    </div>
                                    <textarea name="privacy_policy" id="privacy_policy" cols="30" rows="8" class="form-control border-light-subtle">{{ old('privacy_policy', $policy->privacy_policy) }}</textarea>
                                    @error('privacy_policy') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                </div>

                                <hr class="my-4 border-light-subtle">

                                <!-- 2. Terms and Conditions Section -->
                                <div class="section-divider mb-4">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <div class="section-icon-box bg-info-soft text-info-emphasis rounded-2 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-earmark-text-fill fs-6"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark fs-6">Terms & Conditions <span class="text-danger">*</span></h6>
                                            <small class="text-muted fs-8">Standard site terms, consumer agreements, and user rules</small>
                                        </div>
                                    </div>
                                    <textarea name="terms_conditions" id="terms_conditions" cols="30" rows="8" class="form-control border-light-subtle">{{ old('terms_conditions', $policy->terms_conditions) }}</textarea>
                                    @error('terms_conditions') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                </div>

                                <hr class="my-4 border-light-subtle">

                                <!-- 3. Refund Policy Section -->
                                <div class="section-divider mb-4">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <div class="section-icon-box bg-warning-soft text-warning-emphasis rounded-2 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-arrow-counterclockwise fs-6"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark fs-6">Refund & Return Policy <span class="text-danger">*</span></h6>
                                            <small class="text-muted fs-8">Rules regarding product returns, damages, and money-back requests</small>
                                        </div>
                                    </div>
                                    <textarea name="refund_policy" id="refund_policy" cols="30" rows="8" class="form-control border-light-subtle">{{ old('refund_policy', $policy->refund_policy) }}</textarea>
                                    @error('refund_policy') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                </div>

                                <hr class="my-4 border-light-subtle">

                                <!-- 4. Payment Policy Section -->
                                <div class="section-divider mb-4">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <div class="section-icon-box bg-success-soft text-success rounded-2 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-credit-card-fill fs-6"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark fs-6">Payment Policy <span class="text-danger">*</span></h6>
                                            <small class="text-muted fs-8">Accepted gateways, cash on delivery terms, and transaction safety</small>
                                        </div>
                                    </div>
                                    <textarea name="payment_plicy" id="payment_plicy" cols="30" rows="8" class="form-control border-light-subtle">{{ old('payment_plicy', $policy->payment_plicy) }}</textarea>
                                    @error('payment_plicy') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                </div>

                                <hr class="my-4 border-light-subtle">

                                <!-- 5. About Us Section -->
                                <div class="section-divider mb-3">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <div class="section-icon-box bg-secondary-soft text-secondary rounded-2 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-info-circle-fill fs-6"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark fs-6">About Us Details <span class="text-danger">*</span></h6>
                                            <small class="text-muted fs-8">Store story, company background, and brand vision</small>
                                        </div>
                                    </div>
                                    <textarea name="about_us" id="about_us" cols="30" rows="6" class="form-control border-light-subtle">{{ old('about_us', $policy->about_us) }}</textarea>
                                    @error('about_us') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                </div>
                                
                            </div>
                            
                            <!-- Card Footer Action Buttons -->
                            <div class="card-footer bg-light-subtle border-top border-light-subtle p-3 px-4 d-flex justify-content-end gap-2">
                                <button type="reset" id="resetBtn" class="btn btn-light border px-4 fw-semibold rounded-3 text-secondary fs-7">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary fw-semibold px-4 rounded-3 shadow-sm d-flex align-items-center gap-1.5 fs-7">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Save Policy Settings</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- End Main Form Card -->

                </div>
            </div>
        </div>
    </div>
</main>

<style>
    /* Consistent Micro-Styling System */
    .bg-primary-soft { background-color: rgba(37, 99, 235, 0.1) !important; }
    .bg-success-soft { background-color: rgba(16, 185, 129, 0.1) !important; }
    .bg-info-soft { background-color: rgba(6, 182, 212, 0.12) !important; }
    .bg-warning-soft { background-color: rgba(245, 158, 11, 0.15) !important; }
    .bg-secondary-soft { background-color: rgba(100, 116, 139, 0.1) !important; }

    .shadow-xs { box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04), 0 1px 2px -1px rgba(0, 0, 0, 0.04) !important; }
    .shadow-2xs { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03) !important; }

    .section-icon-box {
        width: 32px;
        height: 32px;
    }

    .fs-7 { font-size: 0.85rem; }
    .fs-8 { font-size: 0.74rem; }
</style>
@endsection

@push('java')
    <script>
        $(document).ready(function() {
            // Summernote Editors Initialization
            const editorConfig = {
                tabsize: 2,
                height: 200,
                placeholder: 'Write comprehensive terms and guidelines here...'
            };

            $('#privacy_policy').summernote(editorConfig);
            $('#terms_conditions').summernote(editorConfig);
            $('#refund_policy').summernote(editorConfig);
            $('#payment_plicy').summernote(editorConfig);
            $('#about_us').summernote({
                tabsize: 2,
                height: 180,
                placeholder: 'Write your company background and about details here...'
            });
        });
    </script>
@endpush