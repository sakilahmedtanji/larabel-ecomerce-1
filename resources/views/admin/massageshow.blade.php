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
                            <i class="bi bi-envelope-open-fill fs-4"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold fs-4 text-dark">Customer Inquiry</h3>
                            <p class="text-muted small mb-0">Read and respond to customer message details</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none"><i class="bi bi-house-door-fill me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/customer-massage') }}" class="text-decoration-none">Messages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
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
                <div class="col-lg-9 col-12">
                    
                    <!-- Main Message View Card -->
                    <div class="card shadow-xs border border-light-subtle rounded-4 overflow-hidden mb-4">
                        <div class="card-header bg-white border-bottom border-light-subtle py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary-soft text-primary rounded-pill px-2.5 py-1.5 fw-semibold" style="font-size: 0.75rem;">
                                    Message Details
                                </span>
                                <h5 class="card-title mb-0 fw-bold text-dark fs-6">Inquiry from: <span class="text-primary">{{ $massageshow->name }}</span></h5>
                            </div>
                            <a href="{{ url('/customer-massage') }}" class="btn btn-light btn-sm fw-semibold px-3 py-1.5 rounded-3 border d-flex align-items-center gap-1">
                                <i class="bi bi-arrow-left"></i>
                                <span>Back to Inbox</span>
                            </a>
                        </div>
                        
                        <div class="card-body p-4 p-md-5">
                            
                            <!-- Customer Contact Info Grid -->
                            <div class="row g-3 mb-4 p-3 bg-light-subtle rounded-3 border border-light-subtle">
                                <!-- Customer Name -->
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="section-icon-box bg-primary-soft text-primary rounded-2 d-flex align-items-center justify-content-center flex-shrink-0">
                                            <i class="bi bi-person-fill fs-6"></i>
                                        </div>
                                        <div>
                                            <span class="d-block text-muted text-uppercase fw-bold fs-9 tracking-wider">Sender Name</span>
                                            <span class="fw-bold text-dark fs-7">{{ $massageshow->name }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="section-icon-box bg-info-soft text-info-emphasis rounded-2 d-flex align-items-center justify-content-center flex-shrink-0">
                                            <i class="bi bi-envelope-fill fs-6"></i>
                                        </div>
                                        <div>
                                            <span class="d-block text-muted text-uppercase fw-bold fs-9 tracking-wider">Email Address</span>
                                            <a href="mailto:{{ $massageshow->email }}" class="text-dark fw-semibold fs-7 text-decoration-none text-truncate d-block" style="max-width: 200px;" title="{{ $massageshow->email }}">
                                                {{ $massageshow->email }}
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Phone Number -->
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="section-icon-box bg-success-soft text-success rounded-2 d-flex align-items-center justify-content-center flex-shrink-0">
                                            <i class="bi bi-telephone-fill fs-6"></i>
                                        </div>
                                        <div>
                                            <span class="d-block text-muted text-uppercase fw-bold fs-9 tracking-wider">Phone Number</span>
                                            <a href="tel:{{ $massageshow->phone }}" class="text-dark font-monospace fs-7 text-decoration-none">
                                                {{ $massageshow->phone }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Subject Box -->
                            <div class="mb-4">
                                <label class="form-label fw-bold text-uppercase text-muted fs-8 tracking-wider mb-2">Subject</label>
                                <div class="p-3 bg-light-subtle rounded-3 fs-7 text-dark fw-bold border border-light-subtle">
                                    {{ $massageshow->subject }}
                                </div>
                            </div>

                            <!-- Message Content Box -->
                            <div class="mb-4">
                                <label class="form-label fw-bold text-uppercase text-muted fs-8 tracking-wider mb-2">Message Body</label>
                                <div class="p-4 bg-white rounded-3 fs-7 text-dark line-height-relaxed border border-light-subtle shadow-2xs" 
                                     style="min-height: 180px; word-wrap: break-word; white-space: pre-line;">
                                    {{ $massageshow->massage }}
                                </div>
                            </div>

                        </div>
                        
                        <!-- Card Footer Actions Panel -->
                        <div class="card-footer bg-light-subtle border-top border-light-subtle p-3 px-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <a href="{{ url('/customer-massage') }}" class="btn btn-light border px-4 fw-semibold rounded-3 text-secondary fs-7 d-flex align-items-center gap-1.5">
                                <i class="bi bi-arrow-left"></i>
                                <span>Back</span>
                            </a>

                            <a href="{{ url('/customer-massage/delete/'.$massageshow->id) }}"
                               class="btn btn-danger fw-semibold px-4 rounded-3 shadow-sm d-flex align-items-center gap-1.5 fs-7"
                               onclick="return confirm('Are you sure you want to delete this message?');">
                                <i class="bi bi-trash3-fill"></i>
                                <span>Delete Message</span>
                            </a>
                        </div>
                    </div>
                    <!-- End Main Message View Card -->

                </div>
            </div>
        </div>
    </div>
</main>

<style>
    /* Consistent Admin Theme Styles */
    .bg-primary-soft { background-color: rgba(37, 99, 235, 0.1) !important; }
    .bg-info-soft { background-color: rgba(6, 182, 212, 0.12) !important; }
    .bg-success-soft { background-color: rgba(16, 185, 129, 0.1) !important; }

    .shadow-xs { box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04), 0 1px 2px -1px rgba(0, 0, 0, 0.04) !important; }
    .shadow-2xs { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03) !important; }

    .section-icon-box {
        width: 34px;
        height: 34px;
    }

    .tracking-wider { letter-spacing: 0.05em; }
    .line-height-relaxed { line-height: 1.7; }

    .fs-7 { font-size: 0.85rem; }
    .fs-8 { font-size: 0.74rem; }
    .fs-9 { font-size: 0.68rem; }
</style>
@endsection