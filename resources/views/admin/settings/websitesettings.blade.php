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
                            <i class="bi bi-gear-wide-connected fs-4"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold fs-4 text-dark">Website Settings</h3>
                            <p class="text-muted small mb-0">Configure and update your website's global information & branding</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none"><i class="bi bi-house-door-fill me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Settings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">General</li>
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
                <div class="col-12">
                    
                    {{-- Error Alert Box --}}
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

                    {{-- Success Alert Box --}}
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

                    <form method="POST" action="{{ url('/update/website-settings') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        
                        <div class="row g-4">
                            
                            {{-- Left Column: General Info & Social Media Links --}}
                            <div class="col-lg-8">
                                
                                <!-- 1. General Info Card -->
                                <div class="card shadow-xs border border-light-subtle rounded-4 overflow-hidden mb-4">
                                    <div class="card-header bg-white border-bottom border-light-subtle py-3 d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="section-icon-box bg-primary-soft text-primary rounded-2 d-flex align-items-center justify-content-center">
                                                <i class="bi bi-sliders fs-6"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold text-dark fs-6">General Information</h6>
                                                <small class="text-muted fs-8">Primary store contact details and location</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="row g-3">
                                            <div class="col-md-6 col-12">
                                                <label for="phone" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                    Phone Number <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-group custom-input-group">
                                                    <span class="input-group-text bg-light border-light-subtle text-secondary">
                                                        <i class="bi bi-telephone-fill fs-6"></i>
                                                    </span>
                                                    <input type="text" class="form-control fs-7 border-light-subtle shadow-none" 
                                                           id="phone" name="phone" 
                                                           value="{{ old('phone', $website_settings->phone ?? '') }}" 
                                                           placeholder="e.g. +8801700000000" required />
                                                </div>
                                                @error('phone') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <label for="email" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                    Email Address <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-group custom-input-group">
                                                    <span class="input-group-text bg-light border-light-subtle text-secondary">
                                                        <i class="bi bi-envelope-fill fs-6"></i>
                                                    </span>
                                                    <input type="email" class="form-control fs-7 border-light-subtle shadow-none" 
                                                           id="email" name="email" 
                                                           value="{{ old('email', $website_settings->email ?? '') }}" 
                                                           placeholder="e.g. support@domain.com" required />
                                                </div>
                                                @error('email') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-12">
                                                <label for="adress" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                    Office Address <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-group custom-input-group">
                                                    <span class="input-group-text bg-light border-light-subtle text-secondary">
                                                        <i class="bi bi-geo-alt-fill fs-6"></i>
                                                    </span>
                                                    <input type="text" class="form-control fs-7 border-light-subtle shadow-none" 
                                                           id="adress" name="adress" 
                                                           value="{{ old('adress', $website_settings->adress ?? '') }}" 
                                                           placeholder="e.g. Road-02, Block-A, Dhanmondi, Dhaka" required />
                                                </div>
                                                @error('adress') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 2. Social Media Links Card -->
                                <div class="card shadow-xs border border-light-subtle rounded-4 overflow-hidden mb-4">
                                    <div class="card-header bg-white border-bottom border-light-subtle py-3 d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="section-icon-box bg-info-soft text-info-emphasis rounded-2 d-flex align-items-center justify-content-center">
                                                <i class="bi bi-share-fill fs-6"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold text-dark fs-6">Social Media Channels</h6>
                                                <small class="text-muted fs-8">Direct customer engagement & profile URLs</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="row g-3">
                                            <div class="col-md-6 col-12">
                                                <label for="facebook" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                    Facebook Page / Profile
                                                </label>
                                                <div class="input-group custom-input-group">
                                                    <span class="input-group-text bg-primary-soft text-primary border-light-subtle">
                                                        <i class="bi bi-facebook fs-6"></i>
                                                    </span>
                                                    <input type="url" class="form-control fs-7 border-light-subtle shadow-none" 
                                                           id="facebook" name="facebook" 
                                                           value="{{ old('facebook', $website_settings->facebook ?? '') }}" 
                                                           placeholder="https://facebook.com/yourpage" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <label for="twitter" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                    X (Formerly Twitter)
                                                </label>
                                                <div class="input-group custom-input-group">
                                                    <span class="input-group-text bg-secondary-soft text-dark border-light-subtle">
                                                        <i class="bi bi-twitter-x fs-6"></i>
                                                    </span>
                                                    <input type="url" class="form-control fs-7 border-light-subtle shadow-none" 
                                                           id="twitter" name="twitter" 
                                                           value="{{ old('twitter', $website_settings->twitter ?? '') }}" 
                                                           placeholder="https://x.com/yourhandle" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <label for="instagram" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                    Instagram Profile
                                                </label>
                                                <div class="input-group custom-input-group">
                                                    <span class="input-group-text bg-danger-soft text-danger border-light-subtle">
                                                        <i class="bi bi-instagram fs-6"></i>
                                                    </span>
                                                    <input type="url" class="form-control fs-7 border-light-subtle shadow-none" 
                                                           id="instagram" name="instagram" 
                                                           value="{{ old('instagram', $website_settings->instagram ?? '') }}" 
                                                           placeholder="https://instagram.com/yourhandle" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <label for="youtube" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                    YouTube Channel
                                                </label>
                                                <div class="input-group custom-input-group">
                                                    <span class="input-group-text bg-danger-soft text-danger border-light-subtle">
                                                        <i class="bi bi-youtube fs-6"></i>
                                                    </span>
                                                    <input type="url" class="form-control fs-7 border-light-subtle shadow-none" 
                                                           id="youtube" name="youtube" 
                                                           value="{{ old('youtube', $website_settings->youtube ?? '') }}" 
                                                           placeholder="https://youtube.com/@yourchannel" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- Right Column: Media Branding & Action Controls --}}
                            <div class="col-lg-4">
                                
                                <!-- Logo Upload Card -->
                                <div class="card shadow-xs border border-light-subtle rounded-4 overflow-hidden mb-4">
                                    <div class="card-header bg-white border-bottom border-light-subtle py-3">
                                        <h6 class="mb-0 fw-bold text-dark fs-6 d-flex align-items-center gap-2">
                                            <i class="bi bi-image text-primary"></i> Website Logo
                                        </h6>
                                    </div>
                                    <div class="card-body p-4 text-center">
                                        <div class="preview-box-container mb-3 d-flex justify-content-center">
                                            <div class="preview-img-box rounded-3 border border-light-subtle p-2 d-flex align-items-center justify-content-center shadow-2xs" 
                                                 style="width: 100%; height: 95px; background-color: #f8fafc;">
                                                <img id="logo-preview" 
                                                     src="{{ !empty($website_settings->logo) ? asset($website_settings->logo) : asset('assets/images/default-logo.png') }}" 
                                                     class="img-fluid object-fit-contain" 
                                                     style="max-height: 75px; max-width: 100%;" 
                                                     alt="Logo Preview">
                                            </div>
                                        </div>
                                        <div class="input-group custom-input-group mb-1">
                                            <input type="file" class="form-control fs-8 border-light-subtle shadow-none" name="logo" id="logo-input" accept="image/*" />
                                        </div>
                                        <small class="text-muted fs-9 d-block text-start mt-1.5">
                                            <i class="bi bi-info-circle me-1 text-primary"></i> Transparent PNG or SVG (Max 2MB).
                                        </small>
                                    </div>
                                </div>

                                <!-- Hero Banner Upload Card -->
                                <div class="card shadow-xs border border-light-subtle rounded-4 overflow-hidden mb-4">
                                    <div class="card-header bg-white border-bottom border-light-subtle py-3">
                                        <h6 class="mb-0 fw-bold text-dark fs-6 d-flex align-items-center gap-2">
                                            <i class="bi bi-window text-primary"></i> Hero Banner
                                        </h6>
                                    </div>
                                    <div class="card-body p-4 text-center">
                                        <div class="preview-box-container mb-3">
                                            <div class="preview-img-box rounded-3 border border-light-subtle overflow-hidden shadow-2xs" 
                                                 style="width: 100%; height: 110px; background-color: #f8fafc;">
                                                <img id="hero-preview" 
                                                     src="{{ !empty($website_settings->hero_image) ? asset($website_settings->hero_image) : asset('assets/images/default-hero.jpg') }}" 
                                                     class="w-100 h-100 object-fit-cover" 
                                                     alt="Hero Preview">
                                            </div>
                                        </div>
                                        <div class="input-group custom-input-group mb-1">
                                            <input type="file" class="form-control fs-8 border-light-subtle shadow-none" name="hero_image" id="hero-input" accept="image/*" />
                                        </div>
                                        <small class="text-muted fs-9 d-block text-start mt-1.5">
                                            <i class="bi bi-info-circle me-1 text-primary"></i> Recommended size: 1920x1080px.
                                        </small>
                                    </div>
                                </div>

                                <!-- Form Submit Action Box -->
                                <div class="card shadow-xs border border-light-subtle rounded-4 p-3 bg-white">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary fw-semibold py-2.5 rounded-3 shadow-sm d-flex align-items-center justify-content-center gap-1.5 fs-7">
                                            <i class="bi bi-cloud-arrow-up-fill"></i>
                                            <span>Save All Changes</span>
                                        </button>
                                        <button type="reset" class="btn btn-light border fw-semibold py-2 rounded-3 text-secondary fs-8">
                                            Reset Form
                                        </button>
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

<style>
    /* Consistent Admin Theme Styles */
    .bg-primary-soft { background-color: rgba(37, 99, 235, 0.1) !important; }
    .bg-info-soft { background-color: rgba(6, 182, 212, 0.12) !important; }
    .bg-danger-soft { background-color: rgba(239, 68, 68, 0.1) !important; }
    .bg-secondary-soft { background-color: rgba(100, 116, 139, 0.1) !important; }

    .shadow-xs { box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04), 0 1px 2px -1px rgba(0, 0, 0, 0.04) !important; }
    .shadow-2xs { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03) !important; }

    .section-icon-box {
        width: 32px;
        height: 32px;
    }

    /* Custom Form Control States */
    .custom-input-group .form-control:focus {
        border-color: #2563eb !important;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12) !important;
    }

    .fs-7 { font-size: 0.85rem; }
    .fs-8 { font-size: 0.74rem; }
    .fs-9 { font-size: 0.68rem; }
</style>

<script>
    // Live Image Preview Functionality
    function setupImagePreview(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        
        if (input && preview) {
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
@endsection