@extends('customer.master')

@section('content')

<div class="body flex-grow-1 customer-security-page">

    <div class="container-fluid px-3 px-md-4 py-4">

        <!-- PAGE HEADER -->
        <div class="security-page-header mb-4">

            <div>

                <div class="security-eyebrow">
                    ACCOUNT SETTINGS
                </div>

                <h4 class="security-title mb-1">
                    Security & Credentials
                </h4>

                <p class="security-subtitle mb-0">
                    Manage your email address and account password securely.
                </p>

            </div>


            <a href="{{ url('/customer/dashboard') }}"
               class="security-back-btn">

                <i class="bi bi-arrow-left me-2"></i>

                Back to Dashboard

            </a>

        </div>



        <div class="row g-3 justify-content-center">


            <!-- MAIN SECURITY CARD -->

            <div class="col-12 col-xl-8">

                <div class="security-card">


                    <!-- CARD HEADER -->

                    <div class="security-card-header">

                        <div class="security-header-icon">

                            <i class="bi bi-shield-lock"></i>

                        </div>


                        <div>

                            <div class="security-card-eyebrow">
                                ACCOUNT SECURITY
                            </div>

                            <div class="security-card-title">
                                Email & Password
                            </div>

                            <div class="security-card-description">
                                Keep your account information up to date.
                            </div>

                        </div>

                    </div>



                    <!-- ALERTS -->

                    <div class="security-alerts">


                        {{-- Error Messages --}}

                        @if ($errors->any())

                            <div class="security-alert security-alert-danger">

                                <div class="alert-icon">

                                    <i class="bi bi-exclamation-triangle"></i>

                                </div>


                                <div class="alert-content">

                                    <div class="alert-title">
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
                                        class="alert-close"
                                        data-bs-dismiss="alert">

                                    <i class="bi bi-x"></i>

                                </button>

                            </div>

                        @endif



                        {{-- Success Message --}}

                        @if(session('success'))

                            <div class="security-alert security-alert-success">

                                <div class="alert-icon">

                                    <i class="bi bi-check-circle"></i>

                                </div>


                                <div class="alert-content">

                                    <div class="alert-title">
                                        Changes saved successfully
                                    </div>

                                    <div class="alert-message">
                                        {{ session('success') }}
                                    </div>

                                </div>


                                <button type="button"
                                        class="alert-close"
                                        data-bs-dismiss="alert">

                                    <i class="bi bi-x"></i>

                                </button>

                            </div>

                        @endif


                    </div>



                    <!-- FORM -->

                    <div class="security-card-body">

                        <form action="{{ url('/customer/cradentialupdate') }}"
                              method="POST"
                              enctype="multipart/form-data"
                              novalidate>

                            @csrf



                            <!-- EMAIL SECTION -->

                            <div class="form-section">


                                <div class="section-heading">

                                    <div class="section-icon section-icon-blue">

                                        <i class="bi bi-envelope"></i>

                                    </div>


                                    <div>

                                        <div class="section-title">
                                            Email Address
                                        </div>

                                        <div class="section-description">
                                            Your primary account email
                                        </div>

                                    </div>

                                </div>



                                <label for="email"
                                       class="security-label">

                                    Email Address

                                    <span class="required-mark">*</span>

                                </label>


                                <div class="security-input-group">

                                    <div class="security-input-icon">

                                        <i class="bi bi-envelope"></i>

                                    </div>


                                    <input type="email"
                                           name="email"
                                           id="email"
                                           value="{{ old('email', $authuser->email) }}"
                                           class="security-input"
                                           placeholder="Enter your email address"
                                           required>

                                </div>


                                <div class="security-help">

                                    <i class="bi bi-info-circle me-1"></i>

                                    This email is used for order updates,
                                    tracking and signing into your account.

                                </div>

                            </div>



                            <div class="section-divider"></div>



                            <!-- PASSWORD SECTION -->

                            <div class="form-section">


                                <div class="section-heading">

                                    <div class="section-icon section-icon-orange">

                                        <i class="bi bi-key"></i>

                                    </div>


                                    <div>

                                        <div class="section-title">
                                            Change Password
                                        </div>

                                        <div class="section-description">
                                            Update your account password
                                        </div>

                                    </div>

                                </div>


                                <div class="password-note">

                                    <i class="bi bi-info-circle"></i>

                                    Leave the password fields blank if you
                                    don't want to change your password.

                                </div>



                                <!-- CURRENT PASSWORD -->

                                <div class="password-field mb-3">

                                    <label for="old_password"
                                           class="security-label">

                                        Current Password

                                    </label>


                                    <div class="security-input-group">

                                        <div class="security-input-icon">

                                            <i class="bi bi-lock"></i>

                                        </div>


                                        <input type="password"
                                               name="old_password"
                                               id="old_password"
                                               class="security-input security-password"
                                               placeholder="Enter current password">


                                        <button type="button"
                                                class="password-toggle toggle-password"
                                                data-target="old_password"
                                                aria-label="Show password">

                                            <i class="bi bi-eye-slash"></i>

                                        </button>

                                    </div>

                                </div>



                                <!-- NEW PASSWORD -->

                                <div class="password-field">

                                    <label for="new_password"
                                           class="security-label">

                                        New Password

                                    </label>


                                    <div class="security-input-group">

                                        <div class="security-input-icon">

                                            <i class="bi bi-shield-check"></i>

                                        </div>


                                        <input type="password"
                                               name="new_password"
                                               id="new_password"
                                               class="security-input security-password"
                                               placeholder="Enter new password">


                                        <button type="button"
                                                class="password-toggle toggle-password"
                                                data-target="new_password"
                                                aria-label="Show password">

                                            <i class="bi bi-eye-slash"></i>

                                        </button>

                                    </div>


                                    <div class="security-help">

                                        <i class="bi bi-shield-check me-1"></i>

                                        Recommended: at least 8 characters
                                        using letters and numbers.

                                    </div>

                                </div>

                            </div>



                            <!-- ACTIONS -->

                            <div class="form-actions">


                                <a href="{{ url('/customer/dashboard') }}"
                                   class="cancel-btn">

                                    <i class="bi bi-arrow-left me-1"></i>

                                    Cancel

                                </a>


                                <button type="submit"
                                        class="save-btn">

                                    <i class="bi bi-check2-circle me-1"></i>

                                    Save Changes

                                </button>


                            </div>


                        </form>

                    </div>

                </div>

            </div>



            <!-- SECURITY SIDE PANEL -->

            <div class="col-12 col-xl-4">

                <div class="security-side-card">


                    <div class="side-card-icon">

                        <i class="bi bi-shield-check"></i>

                    </div>


                    <h6 class="side-card-title">
                        Keep Your Account Secure
                    </h6>


                    <p class="side-card-text">
                        Follow these simple practices to help protect
                        your customer account.
                    </p>



                    <div class="security-tips">


                        <div class="security-tip">

                            <div class="tip-icon">

                                <i class="bi bi-check2"></i>

                            </div>


                            <div>

                                <div class="tip-title">
                                    Use a strong password
                                </div>

                                <div class="tip-text">
                                    Use a password that is difficult to guess.
                                </div>

                            </div>

                        </div>



                        <div class="security-tip">

                            <div class="tip-icon">

                                <i class="bi bi-check2"></i>

                            </div>


                            <div>

                                <div class="tip-title">
                                    Keep your email updated
                                </div>

                                <div class="tip-text">
                                    Make sure your account email is accessible.
                                </div>

                            </div>

                        </div>



                        <div class="security-tip">

                            <div class="tip-icon">

                                <i class="bi bi-check2"></i>

                            </div>


                            <div>

                                <div class="tip-title">
                                    Never share your password
                                </div>

                                <div class="tip-text">
                                    Your password should remain private.
                                </div>

                            </div>

                        </div>


                    </div>


                    <div class="security-status">

                        <span class="security-status-dot"></span>

                        Account Security

                        <span class="security-status-text">
                            Protected
                        </span>

                    </div>


                </div>

            </div>


        </div>

    </div>

</div>



<style>

/* =========================================================
   SECURITY PAGE
========================================================= */

.customer-security-page {
    color: #cbd5e1;
}


/* =========================================================
   PAGE HEADER
========================================================= */

.security-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.security-eyebrow {
    color: #60a5fa;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.3px;
    margin-bottom: 5px;
}

.security-title {
    color: #f8fafc !important;
    font-size: 24px;
    font-weight: 700;
}

.security-subtitle {
    color: #64748b !important;
    font-size: 12px;
}

.security-back-btn {
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

.security-back-btn:hover {
    color: #fff;
    background: #2b3442;
    border-color: #475569;
}


/* =========================================================
   MAIN CARD
========================================================= */

.security-card {
    background: #202733;
    border: 1px solid rgba(255,255,255,.055);
    border-radius: 10px;
    overflow: hidden;
}


/* =========================================================
   CARD HEADER
========================================================= */

.security-card-header {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 20px 22px;
    border-bottom: 1px solid rgba(255,255,255,.055);
}

.security-header-icon {
    width: 45px;
    height: 45px;
    flex-shrink: 0;
    border-radius: 10px;
    background: rgba(59,130,246,.1);
    border: 1px solid rgba(59,130,246,.12);
    color: #60a5fa;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
}

.security-card-eyebrow {
    color: #64748b;
    font-size: 8px;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 3px;
}

.security-card-title {
    color: #f1f5f9;
    font-size: 14px;
    font-weight: 700;
}

.security-card-description {
    color: #64748b;
    font-size: 10px;
    margin-top: 2px;
}


/* =========================================================
   ALERTS
========================================================= */

.security-alerts {
    padding: 15px 22px 0;
}

.security-alert {
    display: flex;
    align-items: flex-start;
    gap: 11px;
    padding: 12px 13px;
    border-radius: 8px;
    position: relative;
}

.security-alert-danger {
    background: rgba(239,68,68,.08);
    border: 1px solid rgba(239,68,68,.16);
    color: #fca5a5;
}

.security-alert-success {
    background: rgba(16,185,129,.08);
    border: 1px solid rgba(16,185,129,.16);
    color: #6ee7b7;
}

.alert-icon {
    font-size: 15px;
    margin-top: 1px;
}

.alert-content {
    flex: 1;
    min-width: 0;
}

.alert-title {
    font-size: 11px;
    font-weight: 700;
}

.alert-message {
    color: #94a3b8;
    font-size: 10px;
    margin-top: 2px;
}

.alert-content ul {
    color: #94a3b8;
    font-size: 10px;
    padding-left: 17px;
}

.alert-close {
    background: transparent;
    border: 0;
    color: #64748b;
    padding: 0;
    font-size: 14px;
    line-height: 1;
}

.alert-close:hover {
    color: #cbd5e1;
}


/* =========================================================
   FORM BODY
========================================================= */

.security-card-body {
    padding: 23px 22px 21px;
}

.form-section {
    padding: 1px 0;
}

.section-heading {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 19px;
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

.section-icon-blue {
    color: #60a5fa;
    background: rgba(59,130,246,.1);
}

.section-icon-orange {
    color: #fbbf24;
    background: rgba(245,158,11,.1);
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

.section-divider {
    height: 1px;
    background: rgba(255,255,255,.055);
    margin: 24px 0;
}


/* =========================================================
   FORM LABEL
========================================================= */

.security-label {
    display: block;
    color: #cbd5e1;
    font-size: 10px;
    font-weight: 600;
    margin-bottom: 7px;
}

.required-mark {
    color: #f87171;
}


/* =========================================================
   INPUT
========================================================= */

.security-input-group {
    display: flex;
    align-items: stretch;
    width: 100%;
    min-height: 42px;
    background: #1b222d;
    border: 1px solid #334155;
    border-radius: 8px;
    overflow: hidden;
    transition: border-color .18s ease,
                box-shadow .18s ease;
}

.security-input-group:focus-within {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59,130,246,.08);
}

.security-input-icon {
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

.security-input {
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

.security-input::placeholder {
    color: #475569;
}

.security-input:-webkit-autofill,
.security-input:-webkit-autofill:hover,
.security-input:-webkit-autofill:focus {
    -webkit-text-fill-color: #e2e8f0;
    -webkit-box-shadow: 0 0 0px 1000px #1b222d inset;
    transition: background-color 5000s ease-in-out 0s;
}


/* =========================================================
   PASSWORD TOGGLE
========================================================= */

.password-toggle {
    width: 42px;
    flex-shrink: 0;
    border: 0;
    border-left: 1px solid rgba(255,255,255,.045);
    background: #202733;
    color: #64748b;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    transition: all .18s ease;
}

.password-toggle:hover {
    color: #60a5fa;
    background: #252d39;
}


/* =========================================================
   HELP TEXT
========================================================= */

.security-help {
    color: #64748b;
    font-size: 9px;
    line-height: 1.6;
    margin-top: 7px;
}

.security-help i {
    color: #60a5fa;
}

.password-note {
    display: flex;
    align-items: flex-start;
    gap: 7px;
    color: #64748b;
    background: #1b222d;
    border: 1px solid rgba(255,255,255,.045);
    border-radius: 7px;
    padding: 9px 10px;
    font-size: 9px;
    line-height: 1.5;
    margin-bottom: 18px;
}

.password-note i {
    color: #60a5fa;
    margin-top: 1px;
}


/* =========================================================
   ACTION BUTTONS
========================================================= */

.form-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    border-top: 1px solid rgba(255,255,255,.055);
    margin-top: 25px;
    padding-top: 18px;
}

.cancel-btn {
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

.cancel-btn:hover {
    color: #e2e8f0;
    border-color: #475569;
    background: #2b3442;
}

.save-btn {
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

.save-btn:hover {
    background: #1d4ed8;
    border-color: #1d4ed8;
    color: #fff;
}


/* =========================================================
   SIDE SECURITY CARD
========================================================= */

.security-side-card {
    background: #202733;
    border: 1px solid rgba(255,255,255,.055);
    border-radius: 10px;
    padding: 23px;
}

.side-card-icon {
    width: 43px;
    height: 43px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(16,185,129,.1);
    color: #34d399;
    font-size: 18px;
    margin-bottom: 15px;
}

.side-card-title {
    color: #f1f5f9;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 7px;
}

.side-card-text {
    color: #64748b;
    font-size: 10px;
    line-height: 1.6;
    margin-bottom: 21px;
}


/* =========================================================
   SECURITY TIPS
========================================================= */

.security-tips {
    border-top: 1px solid rgba(255,255,255,.055);
    border-bottom: 1px solid rgba(255,255,255,.055);
    padding: 5px 0;
}

.security-tip {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 11px 0;
}

.tip-icon {
    width: 25px;
    height: 25px;
    flex-shrink: 0;
    border-radius: 6px;
    background: rgba(16,185,129,.09);
    color: #34d399;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
}

.tip-title {
    color: #cbd5e1;
    font-size: 10px;
    font-weight: 600;
}

.tip-text {
    color: #64748b;
    font-size: 8px;
    line-height: 1.5;
    margin-top: 2px;
}


/* =========================================================
   SECURITY STATUS
========================================================= */

.security-status {
    display: flex;
    align-items: center;
    margin-top: 17px;
    color: #34d399;
    font-size: 9px;
    font-weight: 600;
}

.security-status-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #34d399;
    margin-right: 7px;
}

.security-status-text {
    margin-left: auto;
    color: #64748b;
    font-weight: 500;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 767.98px) {

    .security-page-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .security-back-btn {
        width: 100%;
    }

    .security-title {
        font-size: 21px;
    }

    .security-card-header {
        padding: 17px;
    }

    .security-card-body {
        padding: 19px 17px;
    }

    .security-alerts {
        padding-left: 17px;
        padding-right: 17px;
    }

    .security-side-card {
        padding: 19px;
    }

}


@media (max-width: 480px) {

    .form-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .cancel-btn,
    .save-btn {
        width: 100%;
    }

}

</style>



<script>

document.querySelectorAll('.toggle-password').forEach(function(button) {

    button.addEventListener('click', function() {

        const targetId = this.getAttribute('data-target');
        const input = document.getElementById(targetId);
        const icon = this.querySelector('i');

        if (!input || !icon) {
            return;
        }

        if (input.type === 'password') {

            input.type = 'text';

            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');

            this.setAttribute('aria-label', 'Hide password');

        } else {

            input.type = 'password';

            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');

            this.setAttribute('aria-label', 'Show password');

        }

    });

});

</script>

@endsection