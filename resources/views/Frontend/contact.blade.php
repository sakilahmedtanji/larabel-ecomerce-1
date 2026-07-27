@extends('Frontend.Include.master')
@section('content')
    <!-- Main wrapper with subtle modern soft background -->
    <main class="py-5" style="background: linear-gradient(180deg, #f8fafc 0%, #e2e8f0 100%); min-height: 80vh; display: flex; align-items: center;">
        <section class="return-process-section w-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-9 m-auto">
                        
                        <!-- High-Quality Premium Glassmorphism Card Effect -->
                        <div class="card border-0 shadow-lg position-relative" style="border-radius: 24px; background: #ffffff; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.06) !important;">
                            
                            <!-- Top Decorative Accent Bar -->
                            <div style="height: 6px; background: linear-gradient(90deg, #4f46e5, #06b6d4);"></div>
                            
                            <div class="card-body p-4 p-md-5">
                                <!-- Clean Elegant Header -->
                                <div class="text-center mb-5">
                                    <h3 class="return-process-form-title fw-bold text-dark mb-2" style="font-size: 28px; letter-spacing: -0.5px;">Get In Touch</h3>
                                    <p class="text-muted small">We'd love to hear from you. Please fill out the form below.</p>
                                </div>

                                <!-- EXACT SAME ACTION, METHOD & ENCTYPE -->
                                <form action="{{ url('/contact/massage') }}" method="POST" class="return-process-form form-group" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="row">
                                        <!-- Name Input -->
                                        <div class="col-md-12 mb-4">
                                            <div class="input-item-wrapper position-relative">
                                                <label for="name" class="form-label small fw-bold text-uppercase text-secondary tracking-wider" style="font-size: 11px;">Full Name</label>
                                                <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe" class="form-control custom-input @error('name') is-invalid @enderror" />
                                                @error('name') <div class="invalid-feedback-custom">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                        
                                        <!-- Phone Input -->
                                        <div class="col-md-12 mb-4">
                                            <div class="input-item-wrapper position-relative">
                                                <label for="phone" class="form-label small fw-bold text-uppercase text-secondary tracking-wider" style="font-size: 11px;">Phone Number</label>
                                                <input type="number" name="phone" value="{{ old('phone') }}" placeholder="01XXXXXXXXX" class="form-control custom-input @error('phone') is-invalid @enderror" />
                                                @error('phone') <div class="invalid-feedback-custom">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                        
                                        <!-- Email Input -->
                                        <div class="col-md-12 mb-4">
                                            <div class="input-item-wrapper position-relative">
                                                <label for="address" class="form-label small fw-bold text-uppercase text-secondary tracking-wider" style="font-size: 11px;">Email Address</label>
                                                <input type="email" name="email" value="{{ old('email') }}" placeholder="hello@example.com" class="form-control custom-input @error('email') is-invalid @enderror" />
                                                @error('email') <div class="invalid-feedback-custom">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                        
                                        <!-- Subject Input -->
                                        <div class="col-md-12 mb-4">
                                            <div class="input-item-wrapper position-relative">
                                                <label for="address" class="form-label small fw-bold text-uppercase text-secondary tracking-wider" style="font-size: 11px;">Subject</label>
                                                <input type="subject" name="subject" value="{{ old('subject') }}" placeholder="How can we help?" class="form-control custom-input @error('subject') is-invalid @enderror" />
                                                @error('subject') <div class="invalid-feedback-custom">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                        
                                        <!-- Message (massage) Textarea -->
                                        <div class="col-md-12 mb-5">
                                            <div class="input-item-wrapper position-relative">
                                                <label for="issue" class="form-label small fw-bold text-uppercase text-secondary tracking-wider" style="font-size: 11px;">Your Message</label>
                                                <textarea name="massage" cols="50" rows="4" placeholder="Type your message here..." class="form-control custom-input @error('massage') is-invalid @enderror" style="padding-top: 12px;" required>{{ old('massage') }}</textarea>
                                                @error('massage') <div class="invalid-feedback-custom">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Animated High-Conversion Submit Button -->
                                    <div class="return-process-btn-outer">
                                        <button type="submit" id="productReturnProcess" class="btn w-100 py-3 fw-bold return-process-btn-inner text-white btn-gradient-submit" style="border-radius: 12px; font-size: 16px; border: none; letter-spacing: 0.5px;">
                                            Send Message
                                        </button>
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>       
    </main>

    <!-- Extra Scoped Styles for Best Visual Quality and Animations -->
    <style>
        /* Custom Premium Input Fields Styling */
        .custom-input {
            border: 1.5px solid #e2e8f0 !important;
            border-radius: 12px !important;
            padding: 12px 16px;
            font-size: 15px;
            color: #334155;
            background-color: #f8fafc;
            transition: all 0.25s ease-in-out !important;
            box-shadow: none !important;
        }
        
        /* Smooth Input Focus State */
        .custom-input:focus {
            background-color: #ffffff;
            border-color: #4f46e5 !important;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1) !important;
        }

        /* Modern Custom Error Messages UI */
        .is-invalid {
            border-color: #ef4444 !important;
            background-color: #fff5f5;
        }
        .is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1) !important;
        }
        .invalid-feedback-custom {
            color: #ef4444;
            font-size: 12px;
            margin-top: 5px;
            font-weight: 500;
        }

        /* Luxury Gradient Button & Hover Effect */
        .btn-gradient-submit {
            background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
        }
        .btn-gradient-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.4);
            opacity: 0.95;
        }
        .btn-gradient-submit:active {
            transform: translateY(1px);
        }

        /* Tracking text styling */
        .tracking-wider {
            letter-spacing: 0.05em;
        }
    </style>
@endsection