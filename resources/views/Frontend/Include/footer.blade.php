<footer class="footer-section bg-dark text-white-50 pt-5 border-top border-secondary border-opacity-25" style="background-color: #0f172a !important;">
    <div class="footer__top-wrapper pb-4 border-bottom border-secondary border-opacity-10 mb-5">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-4">
                <a href="{{ url('/') }}" class="footer__brand-logo-outer d-inline-block">
                    <img src="{{ asset('frontend/assets/images/logo.png') }}" class="footer__brand-logo-inner img-fluid" style="max-height: 50px;" alt="Store Logo" />
                </a>
                <div class="text-md-end text-center">
                    <h5 class="text-white mb-1 fw-bold">Subscribe to our Newsletter</h5>
                    <p class="small text-muted mb-0">Get updates on new arrival specials and clearance seasonal offers.</p>
                </div>
            </div>
        </div>
    </div> 
    <div class="footer__main-wrapper pb-5">
        <div class="container">        
            <div class="row g-4">
                
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer__item-wrap">
                        <h5 class="footer__item-title text-white fw-bold mb-4 position-relative style-footer-heading">
                            Our Policies
                        </h5>
                        <ul class="footer__list list-unstyled ps-0">
                            <li class="footer__list-item mb-2.5">
                                <a href="{{ url('/Privacy-policy') }}" class="text-decoration-none text-white-50 hover-text-white transition-all fs-7">
                                    <i class="bi bi-shield-check me-2 text-primary small"></i> Privacy Policy
                                </a>
                            </li>
                            <li class="footer__list-item mb-2.5">
                                <a href="{{ url('/terms-condition') }}" class="text-decoration-none text-white-50 hover-text-white transition-all fs-7">
                                    <i class="bi bi-file-earmark-text me-2 text-primary small"></i> Terms & Conditions
                                </a>
                            </li>
                            <li class="footer__list-item mb-2.5">
                                <a href="{{ url('/refund-policy') }}" class="text-decoration-none text-white-50 hover-text-white transition-all fs-7">
                                    <i class="bi bi-arrow-counterclockwise me-2 text-primary small"></i> Refund Policy
                                </a>
                            </li>
                            <li class="footer__list-item mb-2.5">
                                <a href="{{ url('/Payment-policy') }}" class="text-decoration-none text-white-50 hover-text-white transition-all fs-7">
                                    <i class="bi bi-credit-card me-2 text-primary small"></i> Payment Policy
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer__item-wrap">
                        <h5 class="footer__item-title text-white fw-bold mb-4 position-relative style-footer-heading">
                            Contact Support
                        </h5>
                        <ul class="footer__contact-info-list list-unstyled ps-0">
                            <li class="footer__contact-info-list-item d-flex align-items-start gap-2.5 mb-3 fs-7">
                                <i class="bi bi-geo-alt-fill text-primary mt-0.5"></i>
                                <div>
                                    <span class="d-block fw-bold text-light mb-0.5" style="font-size: 0.75rem; opacity: 0.6;">Corporate Office:</span>
                                    <span class="text-white-50">Uttara, Dhaka, Bangladesh</span>
                                </div>
                            </li>
                            <li class="footer__contact-info-list-item d-flex align-items-start gap-2.5 mb-3 fs-7">
                                <i class="bi bi-telephone-fill text-primary mt-0.5"></i>
                                <div>
                                    <span class="d-block fw-bold text-light mb-0.5" style="font-size: 0.75rem; opacity: 0.6;">Phone Support:</span>
                                    <a href="tel:0123456857" class="text-decoration-none text-white-50 hover-text-white transition-all font-monospace">0123456857</a>
                                </div>
                            </li>
                            <li class="footer__contact-info-list-item d-flex align-items-start gap-2.5 mb-3 fs-7">
                                <i class="bi bi-envelope-fill text-primary mt-0.5"></i>
                                <div>
                                    <span class="d-block fw-bold text-light mb-0.5" style="font-size: 0.75rem; opacity: 0.6;">Email Address:</span>
                                    <a href="mailto:info@gmail.com" class="text-decoration-none text-white-50 hover-text-white transition-all">info@gmail.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>                

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer__item-wrap">
                        <h5 class="footer__item-title text-white fw-bold mb-4 position-relative style-footer-heading">
                            Company Pages
                        </h5>
                        <ul class="footer__list list-unstyled ps-0">
                            <li class="footer__list-item mb-2.5">
                                <a href="{{ url('/about-us') }}" class="text-decoration-none text-white-50 hover-text-white transition-all fs-7">
                                    <i class="bi bi-building me-2 text-primary small"></i> About Us Overview
                                </a>
                            </li>
                            <li class="footer__list-item mb-2.5">
                                <a href="{{ url('/contact-us') }}" class="text-decoration-none text-white-50 hover-text-white transition-all fs-7">
                                    <i class="bi bi-envelope-paper me-2 text-primary small"></i> Contact Us Form
                                </a>
                            </li>
                            <li class="footer__list-item mb-2.5">
                                <a href="#" class="text-decoration-none text-white-50 hover-text-white transition-all fs-7">
                                    <i class="bi bi-journal-richtext me-2 text-primary small"></i> Latest Stories/Blog
                                </a>
                            </li>
                            <li class="footer__list-item mb-2.5">
                                <a href="#" class="text-decoration-none text-white-50 hover-text-white transition-all fs-7">
                                    <i class="bi bi-briefcase me-2 text-primary small"></i> Career Openings
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer__item-wrap">
                        <h5 class="footer__item-title text-white fw-bold mb-4 position-relative style-footer-heading">
                            Follow Channels
                        </h5>
                        <p class="small text-muted mb-3">Connect with our secure stream digital network handles handles.</p>
                        <ul class="footer__social-list list-unstyled d-flex align-items-center gap-2.5 ps-0">
                            <li>
                                <a href="#" class="rounded-circle bg-secondary bg-opacity-10 text-white-50 d-flex align-items-center justify-content-center text-decoration-none hover-social-fb transition-all" style="width: 38px; height: 38px;">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="rounded-circle bg-secondary bg-opacity-10 text-white-50 d-flex align-items-center justify-content-center text-decoration-none hover-social-tw transition-all" style="width: 38px; height: 38px;">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="rounded-circle bg-secondary bg-opacity-10 text-white-50 d-flex align-items-center justify-content-center text-decoration-none hover-social-ig transition-all" style="width: 38px; height: 38px;">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="rounded-circle bg-secondary bg-opacity-10 text-white-50 d-flex align-items-center justify-content-center text-decoration-none hover-social-yt transition-all" style="width: 38px; height: 38px;">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer__bottom-wrapper py-3 border-top border-secondary border-opacity-10" style="background-color: #0b0f19;">
        <div class="container">
            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between gap-2">
                <p class="footer__bottom-text mb-0 small text-muted text-center text-sm-start">
                    &copy; {{ date('Y') }} All rights reserved. Registered to 
                    <strong class="text-white fw-semibold">Nitto Mart</strong>.
                </p>
                <div class="d-flex align-items-center gap-3 fs-8 text-muted">
                    <span>Secure SSL Encrypted Checkout</span>
                </div>
            </div>
        </div>
    </div>
    </footer>

<style>
    /* Clean CSS Extension parameters matching frontend styles */
    .gap-2.5 { gap: 0.65rem !important; }
    .mb-2.5 { margin-bottom: 0.65rem !important; }
    .fs-7 { font-size: 0.88rem; }
    .fs-8 { font-size: 0.76rem; }
    
    .transition-all { transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1); }
    .hover-text-white:hover { color: #ffffff !important; }
    
    /* Elegant Underline Indicator lines accentuation effects */
    .style-footer-heading::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 35px;
        height: 2px;
        background-color: #0d6efd;
    }
    
    /* Social networks interactive hover transitions mappings */
    .hover-social-fb:hover { background-color: #3b5998 !important; color: #fff !important; }
    .hover-social-tw:hover { background-color: #1da1f2 !important; color: #fff !important; }
    .hover-social-ig:hover { background-color: #e1306c !important; color: #fff !important; }
    .hover-social-yt:hover { background-color: #ff0000 !important; color: #fff !important; }
</style>