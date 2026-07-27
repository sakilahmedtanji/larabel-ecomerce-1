@extends('admin.master')
@section('maincontent')
<div class="card border-0 shadow-lg position-relative" style="border-radius: 16px; background: #ffffff; overflow: hidden; box-shadow: 0 20px 40px rgba(15, 23, 42, 0.05) !important;">
    
    <!-- Design Accent Strip line consistent with footer color scheme -->
    <div style="height: 4px; background-color: #0d6efd;"></div>

    <div class="card-body p-4 p-md-5">
        <!-- Header Section -->
        <div class="mb-4">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1.5 rounded-pill fw-bold text-uppercase fs-8 tracking-wider mb-2">Message View</span>
        </div>

        <!-- Meta Info Grid System -->
        <div class="row g-3 mb-4 p-3 bg-light rounded-3" style="border: 1px solid #e2e8f0;">
            <!-- Name -->
            <div class="col-sm-6 col-md-4">
                <span class="d-block text-muted small text-uppercase fw-bold tracking-wider mb-1" style="font-size: 11px;">Customer Name</span>
                <span class="text-dark fw-bold fs-7"><i class="bi bi-person me-1.5 text-primary"></i> {{ $massageshow->name }}</span>
            </div>
            <!-- Email -->
            <div class="col-sm-6 col-md-4">
                <span class="d-block text-muted small text-uppercase fw-bold tracking-wider mb-1" style="font-size: 11px;">Email Address</span>
                <span class="text-dark fw-semibold fs-7"><i class="bi bi-envelope me-1.5 text-primary"></i> {{ $massageshow->email }}</span>
            </div>
            <!-- Phone -->
            <div class="col-sm-6 col-md-4">
                <span class="d-block text-muted small text-uppercase fw-bold tracking-wider mb-1" style="font-size: 11px;">Phone Number</span>
                <span class="text-dark font-monospace fs-7"><i class="bi bi-telephone me-1.5 text-primary"></i> {{ $massageshow->phone }}</span>
            </div>
        </div>

        <!-- Subject - Mutamuti Box Ekhane -->
        <div class="mb-4">
            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider mb-2" style="font-size: 11px;">Subject</label>
            <div class="p-3 bg-white rounded-3 fs-7 text-dark fw-bold shadow-inner" style="border: 1px solid #cbd5e1; background-color: #f8fafc !important; border-radius: 8px;">
                {{ $massageshow->subject }}
            </div>
        </div>

        <!-- Message - Boro Box (Auto Expansion Content block) -->
        <div class="mb-5">
            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider mb-2" style="font-size: 11px;">Message Content</label>
            <!-- Ekhane dynamic display block deya holo jate height autogrow hoy text barle -->
            <div class="p-4 bg-white rounded-3 fs-7 text-dark line-height-relaxed shadow-inner" style="border: 1px solid #cbd5e1; min-height: 180px; height: auto; display: block; word-wrap: break-word; white-space: pre-line; background-color: #ffffff !important; border-radius: 8px;">
                {{ $massageshow->massage }}
            </div>
        </div>

        <!-- Bottom Actions Panel Container -->
      <!-- Bottom Actions -->
<div class="d-flex justify-content-between align-items-center pt-4 border-top">

    <a href="{{ url('/customer-massage') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>

    <a href="{{ url('/customer-massage/delete/'.$massageshow->id) }}"
       class="btn btn-danger"
       onclick="return confirm('Are you sure you want to delete this message?');">
        <i class="bi bi-trash3-fill"></i> Delete Message
    </a>

</div>

    </div>
</div>

<!-- Custom Utility Styles -->
<style>
    .fs-7 { font-size: 0.88rem; }
    .fs-8 { font-size: 0.76rem; }
    .me-1.5 { margin-right: 0.4rem !important; }
    .py-1.5 { padding-top: 0.35rem !important; padding-bottom: 0.35rem !important; }
    .py-2.5 { padding-top: 0.65rem !important; padding-bottom: 0.65rem !important; }
    .tracking-wider { letter-spacing: 0.05em; }
    .line-height-relaxed { line-height: 1.6; }
    .transition-all { transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1); }
    
    .btn-consistent-back {
        border: 1px solid #cbd5e1;
        border-radius: 8px;
    }
    .btn-consistent-back:hover {
        background-color: #f1f5f9 !important;
        color: #0f172a !important;
    }
    .btn:hover {
        transform: translateY(-1px);
    }
</style>
@endsection