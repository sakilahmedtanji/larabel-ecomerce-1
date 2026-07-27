@extends('Frontend.Include.master')

@section('content')
<!-- FontAwesome for Premium Icons & Confetti Effects -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<style>
    .thankyou-section {
        background: #f8fafc;
        padding: 80px 0;
    }
    .thankyou-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
        padding: 50px 40px;
        border-top: 5px solid #28a745; /* আপনার থিমের গ্রিন কালার */
    }
    .success-icon-wrap {
        width: 100px;
        height: 100px;
        background: #e8f5e9;
        color: #28a745;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 45px;
        margin: 0 auto 25px;
        animation: scaleIn 0.5s ease-in-out forwards;
    }
    .order-badge {
        background: #e8f5e9;
        color: #1b5e20;
        font-weight: 600;
        padding: 8px 20px;
        border-radius: 50px;
        font-size: 15px;
        display: inline-block;
        margin-bottom: 20px;
        border: 1px dashed #28a745;
    }
    .thankyou-title {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
    }
    .thankyou-desc {
        font-size: 16px;
        color: #7f8c8d;
        line-height: 1.6;
        max-width: 550px;
        margin: 0 auto 35px;
    }
    .btn-home-custom {
        background: #28a745;
        color: #fff;
        font-weight: 600;
        padding: 12px 35px;
        border-radius: 50px;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
    }
    .btn-home-custom:hover {
        background: #218838;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(40, 167, 69, 0.4);
    }
    @keyframes scaleIn {
        0% { transform: scale(0); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }
</style>

<main class="thankyou-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center">
                
                <!-- Main Thank You Card -->
                <div class="thankyou-card">
                    
                    <!-- Animated Success Icon -->
                    <div class="success-icon-wrap">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>

                    <!-- Dynamic Order Badge -->
                    <div class="order-badge">
                        <i class="fa-solid fa-hashtag"></i> অর্ডার নম্বর : {{ $invoice_number }}
                    </div>

                    <!-- Heading -->
                    <h2 class="thankyou-title">আপনার অর্ডারটি সফল হয়েছে!</h2>

                    <!-- Message -->
                    <p class="thankyou-desc">
                        আমাদের কল সেন্টার থেকে খুব শীঘ্রই ফোন করে আপনার অর্ডারটি কনফার্ম করা হবে। আমাদের সাথে কেনাকাটা করার জন্য আপনাকে ধন্যবাদ।
                    </p>

                    <!-- Call to Action Button -->
                    <div class="mt-4">
                        <a href="{{ url('/') }}" class="btn-home-custom">
                            <i class="fa-solid fa-house-chimney me-2"></i> হোমপেজে ফিরে যান
                        </a>
                    </div>

                </div>
                <!-- Card End -->

            </div>
        </div>
    </div>
</main>

<!-- অটোমেটিক কালারফুল পেপার অ্যানিমেশন (Confetti Effect) -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var duration = 4 * 1000;
        var end = Date.now() + duration;

        (function frame() {
            confetti({
                particleCount: 3,
                angle: 60,
                spread: 55,
                origin: { x: 0 },
                colors: ['#28a745', '#5cd67a', '#1e7e34']
            });
            confetti({
                particleCount: 3,
                angle: 120,
                spread: 55,
                origin: { x: 1 },
                colors: ['#28a745', '#5cd67a', '#1e7e34']
            });

            if (Date.now() < end) {
                requestAnimationFrame(frame);
            }
        }());
    });
</script>
@endsection