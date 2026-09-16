<footer class="customer-footer mt-auto">

    <div class="container-fluid px-3 px-md-4">

        <div class="footer-inner">

            <!-- LEFT -->
            <div class="footer-brand">

                <div class="footer-logo">

                    <i class="bi bi-shield-check"></i>

                </div>


                <div class="footer-copy">

                    <div>

                        © {{ date('Y') }}

                        <a href="{{ url('/') }}"
                           class="footer-brand-link">

                            ClientHub

                        </a>

                    </div>

                    <span>
                        All rights reserved.
                    </span>

                </div>

            </div>


            <!-- RIGHT -->
            <div class="footer-meta">

                <div class="footer-status">

                    <span class="footer-status-dot"></span>

                    <span>
                        Secure Client Hub
                    </span>

                </div>


                <span class="footer-divider"></span>


                <span class="footer-version">
                    v2.4.0
                </span>

            </div>

        </div>

    </div>


</footer>


<style>

/* =========================================================
   CUSTOMER FOOTER
========================================================= */

.customer-footer {

    width: 100%;

    background: #171d27;

    border-top: 1px solid rgba(255,255,255,.055);

    color: #64748b;

}


/* =========================================================
   FOOTER INNER
========================================================= */

.footer-inner {

    min-height: 62px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 20px;

}


/* =========================================================
   BRAND
========================================================= */

.footer-brand {

    display: flex;

    align-items: center;

    gap: 10px;

}


.footer-logo {

    width: 28px;

    height: 28px;

    flex-shrink: 0;

    border-radius: 7px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: rgba(59,130,246,.1);

    border: 1px solid rgba(59,130,246,.12);

    color: #60a5fa;

    font-size: 13px;

}


.footer-copy {

    display: flex;

    align-items: center;

    gap: 5px;

    color: #64748b;

    font-size: 10px;

    line-height: 1.4;

}


.footer-copy > span {

    color: #475569;

}


.footer-brand-link {

    color: #94a3b8;

    font-weight: 700;

    text-decoration: none;

    transition: color .18s ease;

}


.footer-brand-link:hover {

    color: #60a5fa;

}


/* =========================================================
   RIGHT META
========================================================= */

.footer-meta {

    display: flex;

    align-items: center;

    gap: 10px;

    color: #64748b;

    font-size: 10px;

}


.footer-status {

    display: flex;

    align-items: center;

    gap: 6px;

}


.footer-status-dot {

    width: 6px;

    height: 6px;

    flex-shrink: 0;

    border-radius: 50%;

    background: #34d399;

    box-shadow: 0 0 0 3px rgba(52,211,153,.07);

}


.footer-divider {

    width: 1px;

    height: 13px;

    background: rgba(255,255,255,.08);

}


.footer-version {

    color: #475569;

    font-weight: 600;

}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 575.98px) {

    .footer-inner {

        min-height: 58px;

        flex-direction: column;

        justify-content: center;

        gap: 7px;

        padding: 10px 0;

    }


    .footer-copy {

        text-align: center;

    }


    .footer-meta {

        font-size: 9px;

    }

}

</style>