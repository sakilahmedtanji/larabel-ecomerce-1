@extends('admin.master')
@section('maincontent')

<main class="app-main py-4 bg-light-subtle">
    <div class="app-content-header mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0 text-dark fw-bold">⚙️ Settings Management</h3>
                    <p class="text-muted small mb-0">Configure and update your website's global information</p>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0 small">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item text-muted">Settings</li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-11 col-12">
                    
                    {{-- অ্যালার্ট মেসেজ --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-exclamation-triangle-fill fs-5 me-2"></i>
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill fs-5 me-2"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/update/website-settings') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        
                        <div class="row g-4">
                            {{-- বাম পাশের কলাম: সাধারণ ও সোশ্যাল সেটিংস --}}
                            <div class="col-lg-8">
                                <div class="card shadow-sm border-0 rounded-3 mb-4">
                                    <div class="card-header bg-white border-bottom py-3">
                                        <h5 class="card-title mb-0 fw-bold text-secondary">
                                            <i class="bi bi-sliders text-primary me-2"></i> General Info
                                        </h5>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="phone" class="form-label fw-semibold text-secondary small">Phone Number <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light text-muted"><i class="bi bi-telephone"></i></span>
                                                    <input type="text" class="form-control shadow-none" id="phone" name="phone" 
                                                           value="{{ old('phone', $website_settings->phone ?? '') }}" placeholder="e.g. +88017..." required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="form-label fw-semibold text-secondary small">Email Address <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light text-muted"><i class="bi bi-envelope"></i></span>
                                                    <input type="email" class="form-control shadow-none" id="email" name="email" 
                                                           value="{{ old('email', $website_settings->email ?? '') }}" placeholder="e.g. info@domain.com" required />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="adress" class="form-label fw-semibold text-secondary small">Office Address <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light text-muted"><i class="bi bi-geo-alt"></i></span>
                                                    <input type="text" class="form-control shadow-none" id="adress" name="adress" 
                                                           value="{{ old('adress', $website_settings->adress ?? '') }}" placeholder="e.g. Road-2, Block-A, Dhaka" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-sm border-0 rounded-3">
                                    <div class="card-header bg-white border-bottom py-3">
                                        <h5 class="card-title mb-0 fw-bold text-secondary">
                                            <i class="bi bi-share text-primary me-2"></i> Social Media Links
                                        </h5>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="facebook" class="form-label fw-semibold text-secondary small">Facebook Profile/Page</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-primary-soft text-primary border-end-0"><i class="bi bi-facebook"></i></span>
                                                    <input type="url" class="form-control shadow-none" id="facebook" name="facebook" 
                                                           value="{{ old('facebook', $website_settings->facebook ?? '') }}" placeholder="https://facebook.com/..." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="twitter" class="form-label fw-semibold text-secondary small">Twitter (X)</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-dark-soft text-dark border-end-0"><i class="bi bi-twitter-x"></i></span>
                                                    <input type="url" class="form-control shadow-none" id="twitter" name="twitter" 
                                                           value="{{ old('twitter', $website_settings->twitter ?? '') }}" placeholder="https://x.com/..." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="instagram" class="form-label fw-semibold text-secondary small">Instagram</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-danger-soft text-danger border-end-0"><i class="bi bi-instagram"></i></span>
                                                    <input type="url" class="form-control shadow-none" id="instagram" name="instagram" 
                                                           value="{{ old('instagram', $website_settings->instagram ?? '') }}" placeholder="https://instagram.com/..." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="youtube" class="form-label fw-semibold text-secondary small">YouTube Channel</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-danger-soft text-danger border-end-0"><i class="bi bi-youtube"></i></span>
                                                    <input type="url" class="form-control shadow-none" id="youtube" name="youtube" 
                                                           value="{{ old('youtube', $website_settings->youtube ?? '') }}" placeholder="https://youtube.com/..." />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- ডান পাশের কলাম: মিডিয়া আপলোড ও অ্যাকশন বাটন --}}
                            <div class="col-lg-4">
                                {{-- লোগো আপলোড কার্ড --}}
                                <div class="card shadow-sm border-0 rounded-3 mb-4">
                                    <div class="card-header bg-white border-bottom py-3">
                                        <h5 class="card-title mb-0 fw-bold text-secondary"><i class="bi bi-image text-primary me-2"></i> Website Logo</h5>
                                    </div>
                                    <div class="card-body text-center p-4">
                                        <div class="mb-3">
                                            <img id="logo-preview" 
                                                 src="{{ $website_settings->logo ?? asset('assets/images/default-logo.png') }}" 
                                                 class="img-thumbnail rounded-2 shadow-sm p-2 bg-light" 
                                                 style="max-height: 100px; object-fit: contain; width: 100%;" 
                                                 alt="Logo Preview">
                                        </div>
                                        <div class="input-group small">
                                            <input type="file" class="form-control shadow-none" name="logo" id="logo-input" accept="image/*" />
                                        </div>
                                        <small class="text-muted d-block mt-2 text-start">
                                            <i class="bi bi-info-circle me-1"></i> Transparent PNG max 2MB.
                                        </small>
                                    </div>
                                </div>

                                {{-- হিরো ইমেজ আপলোড কার্ড --}}
                                <div class="card shadow-sm border-0 rounded-3 mb-4">
                                    <div class="card-header bg-white border-bottom py-3">
                                        <h5 class="card-title mb-0 fw-bold text-secondary"><i class="bi bi-window text-primary me-2"></i> Hero Banner</h5>
                                    </div>
                                    <div class="card-body text-center p-4">
                                        <div class="mb-3">
                                            <img id="hero-preview" 
                                                 src="{{ $website_settings->hero_image ?? asset('assets/images/default-hero.jpg') }}" 
                                                 class="img-fluid rounded-2 shadow-sm border" 
                                                 style="max-height: 120px; width: 100%; object-fit: cover;" 
                                                 alt="Hero Preview">
                                        </div>
                                        <div class="input-group small">
                                            <input type="file" class="form-control shadow-none" name="hero_image" id="hero-input" accept="image/*" />
                                        </div>
                                        <small class="text-muted d-block mt-2 text-start">
                                            <i class="bi bi-info-circle me-1"></i> Recommended size: 1920x1080px.
                                        </small>
                                    </div>
                                </div>

                                {{-- সাবমিট বাটন গ্রুপ --}}
                                <div class="card shadow-sm border-0 rounded-3 bg-white p-3">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary fw-semibold py-2 shadow-sm">
                                            <i class="bi bi-cloud-arrow-up me-1"></i> Save All Changes
                                        </button>
                                        <button type="reset" class="btn btn-light border fw-semibold py-2 small">Reset Form</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

{{-- ইমেজ লাইভ প্রিভিউ করার জন্য ছোট্ট একটা জাভাস্ক্রিপ্ট কোড --}}
<script>
    function setupImagePreview(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        
        if(input && preview) {
            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        setupImagePreview('logo-input', 'logo-preview');
        setupImagePreview('hero-input', 'hero-preview');
    });
</script>

{{-- বুটস্ট্র্যাপের সফট-কালার কুয়েরি ইফেক্টের জন্য কাস্টম ক্লাসের স্টাইল --}}
<style>
    .bg-primary-soft { background-color: rgba(13, 110, 253, 0.1); }
    .bg-danger-soft { background-color: rgba(220, 53, 69, 0.1); }
    .bg-dark-soft { background-color: rgba(33, 37, 41, 0.1); }
</style>

@endsection