@extends('customer.master')

@section('content')

<div class="body flex-grow-1 customer-profile-page">

    <div class="container-fluid px-3 px-md-4 py-4">

        <!-- =====================================================
             PAGE HEADER
        ====================================================== -->

        <div class="profile-page-header mb-4">

            <div>

                <div class="profile-eyebrow">
                    ACCOUNT SETTINGS
                </div>

                <h4 class="profile-page-title mb-1">
                    Personal Information
                </h4>

                <p class="profile-page-subtitle mb-0">
                    Update your profile and contact information.
                </p>

            </div>


            <a href="{{ url('/customer/dashboard') }}"
               class="profile-back-btn">

                <i class="bi bi-arrow-left me-2"></i>

                Back to Dashboard

            </a>

        </div>



        <div class="row g-3">


            <!-- =================================================
                 MAIN PROFILE FORM
            ================================================== -->

            <div class="col-12 col-xl-8">

                <div class="profile-card">


                    <!-- CARD HEADER -->

                    <div class="profile-card-header">

                        <div class="profile-header-icon">

                            <i class="bi bi-person-badge"></i>

                        </div>


                        <div>

                            <div class="profile-card-eyebrow">
                                CUSTOMER PROFILE
                            </div>

                            <div class="profile-card-title">
                                Profile Information
                            </div>

                            <div class="profile-card-description">
                                Keep your personal information up to date.
                            </div>

                        </div>

                    </div>



                    <!-- ALERTS -->

                    <div class="profile-alerts">


                        {{-- Error Messages --}}

                        @if ($errors->any())

                            <div class="profile-alert profile-alert-danger">

                                <div class="profile-alert-icon">

                                    <i class="bi bi-exclamation-triangle"></i>

                                </div>


                                <div class="profile-alert-content">

                                    <div class="profile-alert-title">
                                        Please check the following
                                    </div>


                                    <ul class="mb-0 mt-1">

                                        @foreach ($errors->all() as $error)

                                            <li>
                                                {{ $error }}
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>


                                <button type="button"
                                        class="profile-alert-close"
                                        data-bs-dismiss="alert">

                                    <i class="bi bi-x"></i>

                                </button>

                            </div>

                        @endif



                        {{-- Success Message --}}

                        @if(session('success'))

                            <div class="profile-alert profile-alert-success">

                                <div class="profile-alert-icon">

                                    <i class="bi bi-check-circle"></i>

                                </div>


                                <div class="profile-alert-content">

                                    <div class="profile-alert-title">
                                        Profile updated successfully
                                    </div>

                                    <div class="profile-alert-message">
                                        {{ session('success') }}
                                    </div>

                                </div>


                                <button type="button"
                                        class="profile-alert-close"
                                        data-bs-dismiss="alert">

                                    <i class="bi bi-x"></i>

                                </button>

                            </div>

                        @endif


                    </div>



                    <!-- FORM -->

                    <div class="profile-card-body">

                        <form action="{{ url('/customer/profile-update') }}"
                              method="POST"
                              enctype="multipart/form-data"
                              novalidate>

                            @csrf



                            <!-- =================================================
                                 PROFILE PICTURE
                            ================================================== -->

                            <div class="profile-picture-section">


                                <div class="section-heading">

                                    <div class="section-icon section-blue">

                                        <i class="bi bi-image"></i>

                                    </div>


                                    <div>

                                        <div class="section-title">
                                            Profile Picture
                                        </div>

                                        <div class="section-description">
                                            Choose a photo for your account
                                        </div>

                                    </div>

                                </div>



                                <div class="profile-picture-box">


                                    <div class="profile-picture-preview">


                                        <div class="profile-image-wrapper">


                                            @if(!empty($authuserid->image))

                                                <img id="currentAvatar"
                                                     src="{{ asset($authuserid->image) }}"
                                                     class="profile-avatar-image"
                                                     alt="Profile Avatar">

                                            @else

                                                <img id="currentAvatar"
                                                     src="{{ asset('Customer/Image/Logo.png') }}"
                                                     class="profile-avatar-image"
                                                     alt="Default Avatar">

                                            @endif


                                            <img id="newAvatarPreview"
                                                 src="#"
                                                 class="profile-avatar-image profile-new-preview d-none"
                                                 alt="New Profile Picture">


                                            <div class="profile-image-badge">

                                                <i class="bi bi-camera"></i>

                                            </div>


                                        </div>

                                    </div>



                                    <div class="profile-upload-content">


                                        <label for="profileImageInput"
                                               class="profile-upload-label">

                                            Profile Picture

                                        </label>


                                        <div class="profile-upload-row">

                                            <label for="profileImageInput"
                                                   class="choose-image-btn">

                                                <i class="bi bi-upload me-2"></i>

                                                Choose Image

                                            </label>


                                            <input type="file"
                                                   name="image"
                                                   id="profileImageInput"
                                                   class="profile-file-input"
                                                   accept="image/*">

                                        </div>


                                        <div class="profile-upload-help">

                                            <i class="bi bi-info-circle me-1"></i>

                                            PNG, JPG or WebP. Maximum 2MB.

                                        </div>

                                    </div>


                                </div>

                            </div>



                            <div class="profile-section-divider"></div>



                            <!-- =================================================
                                 PERSONAL INFORMATION
                            ================================================== -->

                            <div class="form-section">


                                <div class="section-heading">

                                    <div class="section-icon section-blue">

                                        <i class="bi bi-person"></i>

                                    </div>


                                    <div>

                                        <div class="section-title">
                                            Personal Details
                                        </div>

                                        <div class="section-description">
                                            Your basic customer information
                                        </div>

                                    </div>

                                </div>



                                <!-- FULL NAME -->

                                <div class="profile-form-group">

                                    <label for="name"
                                           class="profile-label">

                                        Full Name

                                        <span class="required-mark">*</span>

                                    </label>


                                    <div class="profile-input-group">

                                        <div class="profile-input-icon">

                                            <i class="bi bi-person"></i>

                                        </div>


                                        <input type="text"
                                               name="name"
                                               id="name"
                                               value="{{ old('name', $authuserid->name) }}"
                                               class="profile-input"
                                               placeholder="Enter your full name"
                                               required>

                                    </div>


                                    @error('name')

                                        <div class="profile-field-error">

                                            <i class="bi bi-exclamation-circle me-1"></i>

                                            {{ $message }}

                                        </div>

                                    @enderror

                                </div>



                                <!-- EMAIL -->

                                <div class="profile-form-group">

                                    <label for="email"
                                           class="profile-label">

                                        Email Address

                                        <span class="required-mark">*</span>

                                    </label>


                                    <div class="profile-input-group">

                                        <div class="profile-input-icon">

                                            <i class="bi bi-envelope"></i>

                                        </div>


                                        <input type="email"
                                               name="email"
                                               id="email"
                                               value="{{ old('email', $authuserid->email) }}"
                                               class="profile-input"
                                               placeholder="Enter your email address"
                                               required>

                                    </div>


                                    @error('email')

                                        <div class="profile-field-error">

                                            <i class="bi bi-exclamation-circle me-1"></i>

                                            {{ $message }}

                                        </div>

                                    @enderror

                                </div>



                                <!-- PHONE -->

                                <div class="profile-form-group mb-0">

                                    <label for="phone"
                                           class="profile-label">

                                        Phone Number

                                        <span class="profile-label-note">
                                            (For delivery updates)
                                        </span>

                                    </label>


                                    <div class="profile-input-group">

                                        <div class="profile-input-icon">

                                            <i class="bi bi-telephone"></i>

                                        </div>


                                        <input type="text"
                                               name="phone"
                                               id="phone"
                                               value="{{ old('phone', $authuserid->phone) }}"
                                               class="profile-input"
                                               placeholder="e.g. +8801700000000">

                                    </div>


                                    @error('phone')

                                        <div class="profile-field-error">

                                            <i class="bi bi-exclamation-circle me-1"></i>

                                            {{ $message }}

                                        </div>

                                    @enderror


                                    <div class="profile-help">

                                        <i class="bi bi-info-circle me-1"></i>

                                        Your phone number may be used for
                                        delivery and order-related updates.

                                    </div>

                                </div>


                            </div>



                            <!-- =================================================
                                 FORM ACTIONS
                            ================================================== -->

                            <div class="profile-form-actions">


                                <a href="{{ url('/customer/dashboard') }}"
                                   class="profile-cancel-btn">

                                    <i class="bi bi-arrow-left me-1"></i>

                                    Cancel

                                </a>


                                <button type="submit"
                                        class="profile-save-btn">

                                    <i class="bi bi-check2-circle me-1"></i>

                                    Save Changes

                                </button>


                            </div>


                        </form>

                    </div>

                </div>

            </div>



            <!-- =================================================
                 SIDE INFORMATION
            ================================================== -->

            <div class="col-12 col-xl-4">

                <div class="profile-side-card">


                    <!-- CUSTOMER -->

                    <div class="profile-side-user">


                        <div class="side-user-avatar">


                            @if(!empty($authuserid->image))

                                <img src="{{ asset($authuserid->image) }}"
                                     alt="Profile">

                            @else

                                <img src="{{ asset('Customer/Image/Logo.png') }}"
                                     alt="Profile">

                            @endif


                        </div>


                        <div class="side-user-info">

                            <div class="side-user-name">

                                {{ $authuserid->name }}

                            </div>


                            <div class="side-user-email">

                                {{ $authuserid->email }}

                            </div>


                            <div class="side-user-status">

                                <span></span>

                                Active Customer

                            </div>

                        </div>

                    </div>



                    <div class="side-divider"></div>



                    <!-- INFORMATION -->

                    <div class="side-section-title">
                        PROFILE INFORMATION
                    </div>



                    <div class="side-info-item">

                        <div class="side-info-icon side-blue">

                            <i class="bi bi-person"></i>

                        </div>


                        <div>

                            <div class="side-info-label">
                                NAME
                            </div>

                            <div class="side-info-value">
                                {{ $authuserid->name }}
                            </div>

                        </div>

                    </div>



                    <div class="side-info-item">

                        <div class="side-info-icon side-purple">

                            <i class="bi bi-envelope"></i>

                        </div>


                        <div class="side-info-content">

                            <div class="side-info-label">
                                EMAIL
                            </div>

                            <div class="side-info-value side-email">
                                {{ $authuserid->email }}
                            </div>

                        </div>

                    </div>



                    <div class="side-info-item">

                        <div class="side-info-icon side-green">

                            <i class="bi bi-telephone"></i>

                        </div>


                        <div>

                            <div class="side-info-label">
                                PHONE
                            </div>

                            <div class="side-info-value">

                                {{ $authuserid->phone ?: 'Not added' }}

                            </div>

                        </div>

                    </div>



                    <div class="side-divider"></div>



                    <!-- SECURITY NOTE -->

                    <div class="profile-security-note">

                        <div class="security-note-icon">

                            <i class="bi bi-shield-check"></i>

                        </div>


                        <div>

                            <div class="security-note-title">
                                Your information is private
                            </div>

                            <div class="security-note-text">
                                We only use your information to manage
                                your account and process orders.
                            </div>

                        </div>

                    </div>


                </div>

            </div>


        </div>

    </div>

</div>



<style>

/* =========================================================
   CUSTOMER PROFILE PAGE
========================================================= */

.customer-profile-page {
    color: #cbd5e1;
}


/* =========================================================
   PAGE HEADER
========================================================= */

.profile-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.profile-eyebrow {
    color: #60a5fa;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.3px;
    margin-bottom: 5px;
}

.profile-page-title {
    color: #f8fafc !important;
    font-size: 24px;
    font-weight: 700;
}

.profile-page-subtitle {
    color: #64748b !important;
    font-size: 12px;
}

.profile-back-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 9px 14px;
    border-radius: 8px;
    background: #242b38;
    border: 1px solid #334155;
    color: #cbd5e1;
    font-size: 11px;
    font-weight: 600;
    text-decoration: none;
    white-space: nowrap;
    transition: all .18s ease;
}

.profile-back-btn:hover {
    color: #fff;
    background: #2b3442;
    border-color: #475569;
}


/* =========================================================
   MAIN CARD
========================================================= */

.profile-card {
    background: #202733;
    border: 1px solid rgba(255,255,255,.055);
    border-radius: 10px;
    overflow: hidden;
}


/* =========================================================
   CARD HEADER
========================================================= */

.profile-card-header {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 20px 22px;
    border-bottom: 1px solid rgba(255,255,255,.055);
}

.profile-header-icon {
    width: 45px;
    height: 45px;
    flex-shrink: 0;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(59,130,246,.1);
    border: 1px solid rgba(59,130,246,.12);
    color: #60a5fa;
    font-size: 19px;
}

.profile-card-eyebrow {
    color: #64748b;
    font-size: 8px;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 3px;
}

.profile-card-title {
    color: #f1f5f9;
    font-size: 14px;
    font-weight: 700;
}

.profile-card-description {
    color: #64748b;
    font-size: 10px;
    margin-top: 2px;
}


/* =========================================================
   ALERTS
========================================================= */

.profile-alerts {
    padding: 15px 22px 0;
}

.profile-alert {
    display: flex;
    align-items: flex-start;
    gap: 11px;
    padding: 12px 13px;
    border-radius: 8px;
    position: relative;
}

.profile-alert-danger {
    background: rgba(239,68,68,.08);
    border: 1px solid rgba(239,68,68,.16);
    color: #fca5a5;
}

.profile-alert-success {
    background: rgba(16,185,129,.08);
    border: 1px solid rgba(16,185,129,.16);
    color: #6ee7b7;
}

.profile-alert-icon {
    font-size: 15px;
    margin-top: 1px;
}

.profile-alert-content {
    flex: 1;
    min-width: 0;
}

.profile-alert-title {
    font-size: 11px;
    font-weight: 700;
}

.profile-alert-message {
    color: #94a3b8;
    font-size: 10px;
    margin-top: 2px;
}

.profile-alert-content ul {
    color: #94a3b8;
    font-size: 10px;
    padding-left: 17px;
}

.profile-alert-close {
    background: transparent;
    border: 0;
    color: #64748b;
    padding: 0;
    font-size: 14px;
    line-height: 1;
}

.profile-alert-close:hover {
    color: #cbd5e1;
}


/* =========================================================
   CARD BODY
========================================================= */

.profile-card-body {
    padding: 23px 22px 21px;
}


/* =========================================================
   SECTION
========================================================= */

.section-heading {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 18px;
}

.section-icon {
    width: 34px;
    height: 34px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
}

.section-blue {
    color: #60a5fa;
    background: rgba(59,130,246,.1);
}

.section-title {
    color: #e2e8f0;
    font-size: 12px;
    font-weight: 700;
}

.section-description {
    color: #64748b;
    font-size: 9px;
    margin-top: 2px;
}

.profile-section-divider {
    height: 1px;
    background: rgba(255,255,255,.055);
    margin: 24px 0;
}


/* =========================================================
   PROFILE PICTURE
========================================================= */

.profile-picture-box {
    display: flex;
    align-items: center;
    gap: 17px;
    padding: 15px;
    background: #1b222d;
    border: 1px solid rgba(255,255,255,.045);
    border-radius: 9px;
}

.profile-picture-preview {
    flex-shrink: 0;
}

.profile-image-wrapper {
    width: 76px;
    height: 76px;
    position: relative;
    border-radius: 50%;
    overflow: visible;
}

.profile-avatar-image {
    width: 76px;
    height: 76px;
    object-fit: cover;
    border-radius: 50%;
    display: block;
    border: 2px solid #334155;
    background: #202733;
}

.profile-new-preview {
    position: absolute;
    inset: 0;
    z-index: 2;
}

.profile-image-badge {
    position: absolute;
    right: -2px;
    bottom: -2px;
    width: 25px;
    height: 25px;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #2563eb;
    border: 2px solid #1b222d;
    color: #fff;
    font-size: 10px;
    z-index: 4;
}

.profile-upload-content {
    flex: 1;
    min-width: 0;
}

.profile-upload-label {
    display: block;
    color: #cbd5e1;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 8px;
}

.profile-upload-row {
    display: flex;
    align-items: center;
}

.profile-file-input {
    display: none;
}

.choose-image-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 8px 12px;
    border-radius: 7px;
    background: #252d39;
    border: 1px solid #334155;
    color: #cbd5e1;
    font-size: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all .18s ease;
}

.choose-image-btn:hover {
    color: #60a5fa;
    background: #293548;
    border-color: #3b82f6;
}

.profile-upload-help {
    color: #64748b;
    font-size: 8px;
    margin-top: 7px;
}


/* =========================================================
   FORM
========================================================= */

.profile-form-group {
    margin-bottom: 17px;
}

.profile-label {
    display: block;
    color: #cbd5e1;
    font-size: 10px;
    font-weight: 600;
    margin-bottom: 7px;
}

.required-mark {
    color: #f87171;
}

.profile-label-note {
    color: #64748b;
    font-size: 9px;
    font-weight: 400;
    margin-left: 4px;
}

.profile-input-group {
    width: 100%;
    min-height: 42px;
    display: flex;
    align-items: stretch;
    overflow: hidden;
    background: #1b222d;
    border: 1px solid #334155;
    border-radius: 8px;
    transition: border-color .18s ease,
                box-shadow .18s ease;
}

.profile-input-group:focus-within {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59,130,246,.08);
}

.profile-input-icon {
    width: 42px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #64748b;
    background: #202733;
    border-right: 1px solid rgba(255,255,255,.045);
    font-size: 13px;
}

.profile-input {
    width: 100%;
    min-width: 0;
    border: 0 !important;
    outline: 0 !important;
    box-shadow: none !important;
    background: transparent !important;
    color: #e2e8f0 !important;
    padding: 9px 12px;
    font-size: 11px;
}

.profile-input::placeholder {
    color: #475569;
}

.profile-input:-webkit-autofill,
.profile-input:-webkit-autofill:hover,
.profile-input:-webkit-autofill:focus {
    -webkit-text-fill-color: #e2e8f0;
    -webkit-box-shadow: 0 0 0 1000px #1b222d inset;
    transition: background-color 5000s ease-in-out 0s;
}

.profile-field-error {
    color: #f87171;
    font-size: 9px;
    margin-top: 6px;
}

.profile-help {
    color: #64748b;
    font-size: 9px;
    line-height: 1.6;
    margin-top: 7px;
}

.profile-help i {
    color: #60a5fa;
}


/* =========================================================
   FORM ACTIONS
========================================================= */

.profile-form-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    border-top: 1px solid rgba(255,255,255,.055);
    margin-top: 25px;
    padding-top: 18px;
}

.profile-cancel-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 9px 14px;
    border-radius: 7px;
    background: #252d39;
    border: 1px solid #334155;
    color: #94a3b8;
    font-size: 10px;
    font-weight: 600;
    text-decoration: none;
    transition: all .18s ease;
}

.profile-cancel-btn:hover {
    color: #e2e8f0;
    border-color: #475569;
    background: #2b3442;
}

.profile-save-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 9px 17px;
    border-radius: 7px;
    background: #2563eb;
    border: 1px solid #2563eb;
    color: #fff;
    font-size: 10px;
    font-weight: 600;
    transition: all .18s ease;
}

.profile-save-btn:hover {
    background: #1d4ed8;
    border-color: #1d4ed8;
    color: #fff;
}


/* =========================================================
   SIDE CARD
========================================================= */

.profile-side-card {
    background: #202733;
    border: 1px solid rgba(255,255,255,.055);
    border-radius: 10px;
    padding: 20px;
}

.profile-side-user {
    display: flex;
    align-items: center;
    gap: 11px;
}

.side-user-avatar {
    width: 48px;
    height: 48px;
    flex-shrink: 0;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid #334155;
    background: #29313e;
}

.side-user-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.side-user-info {
    min-width: 0;
}

.side-user-name {
    color: #f1f5f9;
    font-size: 12px;
    font-weight: 700;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.side-user-email {
    color: #64748b;
    font-size: 9px;
    margin-top: 3px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.side-user-status {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    color: #34d399;
    font-size: 8px;
    font-weight: 600;
    margin-top: 5px;
}

.side-user-status span {
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #34d399;
}

.side-divider {
    height: 1px;
    background: rgba(255,255,255,.055);
    margin: 19px 0;
}

.side-section-title {
    color: #475569;
    font-size: 8px;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 13px;
}

.side-info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 14px;
}

.side-info-icon {
    width: 34px;
    height: 34px;
    flex-shrink: 0;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
}

.side-blue {
    color: #60a5fa;
    background: rgba(59,130,246,.1);
}

.side-purple {
    color: #a78bfa;
    background: rgba(139,92,246,.1);
}

.side-green {
    color: #34d399;
    background: rgba(16,185,129,.1);
}

.side-info-content {
    min-width: 0;
}

.side-info-label {
    color: #475569;
    font-size: 7px;
    font-weight: 700;
    letter-spacing: .7px;
    margin-bottom: 2px;
}

.side-info-value {
    color: #cbd5e1;
    font-size: 10px;
    font-weight: 600;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 245px;
}

.side-email {
    max-width: 210px;
}


/* =========================================================
   SECURITY NOTE
========================================================= */

.profile-security-note {
    display: flex;
    align-items: flex-start;
    gap: 9px;
    padding: 11px;
    border-radius: 8px;
    background: rgba(59,130,246,.06);
    border: 1px solid rgba(59,130,246,.1);
}

.security-note-icon {
    width: 28px;
    height: 28px;
    flex-shrink: 0;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(59,130,246,.1);
    color: #60a5fa;
    font-size: 12px;
}

.security-note-title {
    color: #cbd5e1;
    font-size: 9px;
    font-weight: 600;
    margin-bottom: 3px;
}

.security-note-text {
    color: #64748b;
    font-size: 8px;
    line-height: 1.5;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1199.98px) {

    .profile-side-card {
        margin-top: 0;
    }

}


@media (max-width: 767.98px) {

    .profile-page-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .profile-back-btn {
        width: 100%;
    }

    .profile-page-title {
        font-size: 21px;
    }

    .profile-card-header {
        padding: 17px;
    }

    .profile-card-body {
        padding: 19px 17px;
    }

    .profile-alerts {
        padding-left: 17px;
        padding-right: 17px;
    }

}


@media (max-width: 480px) {

    .profile-picture-box {
        align-items: flex-start;
        flex-direction: column;
    }

    .profile-picture-preview {
        margin: 0 auto;
    }

    .profile-upload-content {
        width: 100%;
    }

    .profile-form-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .profile-cancel-btn,
    .profile-save-btn {
        width: 100%;
    }

}

</style>



<script>

document.addEventListener('DOMContentLoaded', function () {

    const imageInput = document.getElementById('profileImageInput');

    const preview = document.getElementById('newAvatarPreview');


    if (!imageInput || !preview) {
        return;
    }


    imageInput.addEventListener('change', function (event) {

        const file = event.target.files[0];


        if (!file) {

            preview.classList.add('d-none');

            return;

        }


        const reader = new FileReader();


        reader.onload = function (e) {

            preview.src = e.target.result;

            preview.classList.remove('d-none');

        };


        reader.readAsDataURL(file);

    });

});

</script>

@endsection