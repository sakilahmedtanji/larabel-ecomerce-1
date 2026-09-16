@extends('admin.master')

@section('maincontent')

@php
    /*
    |--------------------------------------------------------------------------
    | Support Configuration
    |--------------------------------------------------------------------------
    */

    $support = [
        'phone' => '+880 1610083276',
        'email' => 'sakilahmedtanjil@gmail.com',

        'telegram_username' => '@cipheroracle',
        'telegram_url' => 'https://t.me/cipheroracle',

        // Bangladesh timezone
        'timezone' => 'Asia/Dhaka',
        'timezone_label' => 'Bangladesh Time',

        // Support hours: 10:00 AM - 10:00 PM Bangladesh Time
        'start_hour' => 10,
        'start_minute' => 0,

        'end_hour' => 22,
        'end_minute' => 0,

        // Friday = 5 in JavaScript
        'off_day' => 5,
    ];

    $phoneLink = preg_replace('/[^0-9+]/', '', $support['phone']);
@endphp


<div class="container-fluid py-4">

    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}

    <div class="mb-4">

        <div class="d-flex align-items-center gap-3">

            <div class="support-header-icon">
                <i class="bi bi-headset"></i>
            </div>

            <div>

                <h4 class="mb-1 fw-bold text-dark">
                    Technical Support
                </h4>

                <p class="mb-0 text-muted">
                    Need help with the website? Contact us directly using
                    any of the support methods below.
                </p>

            </div>

        </div>

    </div>


    {{-- =========================================================
         LIVE SUPPORT STATUS + TIME
    ========================================================== --}}

    <div class="support-status mb-4">

        <div class="row align-items-center g-3">

            {{-- Support Status --}}
            <div class="col-lg-4">

                <div class="d-flex align-items-center gap-3">

                    <div id="statusDot" class="status-dot"></div>

                    <div>

                        <div id="supportStatus"
                             class="fw-bold text-dark">
                            Checking availability...
                        </div>

                        <div id="supportStatusDescription"
                             class="small text-muted">
                            Please wait...
                        </div>

                    </div>

                </div>

            </div>


            {{-- Bangladesh Time --}}
            <div class="col-lg-4">

                <div class="time-box">

                    <div class="time-box-icon">
                        <i class="bi bi-flag-fill"></i>
                    </div>

                    <div>

                        <span class="time-label">
                            BANGLADESH TIME
                        </span>

                        <div id="bangladeshTime"
                             class="time-value">
                            --:--:--
                        </div>

                        <div id="bangladeshDate"
                             class="time-date">
                            Loading...
                        </div>

                    </div>

                </div>

            </div>


            {{-- Visitor Local Time --}}
            <div class="col-lg-4">

                <div class="time-box">

                    <div class="time-box-icon local-time-icon">
                        <i class="bi bi-globe2"></i>
                    </div>

                    <div>

                        <span class="time-label">
                            YOUR LOCAL TIME
                        </span>

                        <div id="localTime"
                             class="time-value">
                            --:--:--
                        </div>

                        <div id="localDate"
                             class="time-date">
                            Detecting your timezone...
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         SUPPORT HOURS
    ========================================================== --}}

    <div class="schedule-card mb-4">

        <div class="d-flex align-items-center gap-3">

            <div class="schedule-icon">
                <i class="bi bi-clock-history"></i>
            </div>

            <div class="flex-grow-1">

                <h6 class="fw-bold text-dark mb-1">
                    Support Hours
                </h6>

                <p class="text-muted small mb-0">
                    Our support schedule is based on Bangladesh Time.
                    Your local support hours are converted automatically.
                </p>

            </div>

        </div>


        <div class="schedule-details mt-4">

            <div class="schedule-row">

                <div>

                    <span class="schedule-day">
                        Support Hours
                    </span>

                    <span class="schedule-note">
                        Saturday – Thursday
                    </span>

                </div>

                <strong>
                    10:00 AM – 10:00 PM
                    <small>BD Time</small>
                </strong>

            </div>

        </div>


        {{-- Local Time Conversion --}}
        <div class="local-schedule mt-3">

            <div class="d-flex align-items-start gap-3">

                <div class="local-schedule-icon">
                    <i class="bi bi-globe-americas"></i>
                </div>

                <div>

                    <div class="fw-semibold text-dark">
                        Your Local Schedule
                    </div>

                    <div id="localSchedule"
                         class="small text-muted mt-1">
                        Calculating your local support hours...
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         CONTACT CARDS
    ========================================================== --}}

    <div class="row g-4">


        {{-- PHONE --}}
        <div class="col-xl-4 col-md-6">

            <div class="support-card h-100">

                <div class="support-card-top">

                    <div class="contact-icon phone-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>

                    <span class="contact-label">
                        PHONE SUPPORT
                    </span>

                </div>


                <div class="mt-4">

                    <h5 class="fw-bold text-dark mb-2">
                        Call Us
                    </h5>

                    <a href="tel:{{ $phoneLink }}"
                       class="contact-value">

                        {{ $support['phone'] }}

                    </a>

                    <p class="text-muted small mt-2 mb-0">
                        For urgent technical issues and immediate assistance.
                    </p>

                </div>


                <div class="mt-auto pt-4">

                    <a href="tel:{{ $phoneLink }}"
                       class="btn btn-primary w-100 rounded-3 fw-semibold">

                        <i class="bi bi-telephone-fill me-2"></i>
                        Call Now

                    </a>

                </div>

            </div>

        </div>


        {{-- EMAIL --}}
        <div class="col-xl-4 col-md-6">

            <div class="support-card h-100">

                <div class="support-card-top">

                    <div class="contact-icon email-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>

                    <span class="contact-label">
                        EMAIL SUPPORT
                    </span>

                </div>


                <div class="mt-4">

                    <h5 class="fw-bold text-dark mb-2">
                        Send an Email
                    </h5>

                    <a href="mailto:{{ $support['email'] }}"
                       class="contact-value text-break">

                        {{ $support['email'] }}

                    </a>

                    <p class="text-muted small mt-2 mb-0">
                        Best for detailed problems, screenshots and
                        technical information.
                    </p>

                </div>


                <div class="mt-auto pt-4">

                    <a href="mailto:{{ $support['email'] }}"
                       class="btn btn-primary w-100 rounded-3 fw-semibold">

                        <i class="bi bi-envelope-fill me-2"></i>
                        Send Email

                    </a>

                </div>

            </div>

        </div>


        {{-- TELEGRAM --}}
        <div class="col-xl-4 col-md-12">

            <div class="support-card h-100">

                <div class="support-card-top">

                    <div class="contact-icon telegram-icon">
                        <i class="bi bi-telegram"></i>
                    </div>

                    <span class="contact-label">
                        TELEGRAM SUPPORT
                    </span>

                </div>


                <div class="mt-4">

                    <h5 class="fw-bold text-dark mb-2">
                        Chat With Us
                    </h5>

                    <a href="{{ $support['telegram_url'] }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="contact-value">

                        {{ $support['telegram_username'] }}

                    </a>

                    <p class="text-muted small mt-2 mb-0">
                        Get direct support and share screenshots or
                        screen recordings easily.
                    </p>

                </div>


                <div class="mt-auto pt-4">

                    <a href="{{ $support['telegram_url'] }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn btn-primary w-100 rounded-3 fw-semibold">

                        <i class="bi bi-telegram me-2"></i>
                        Open Telegram

                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         URGENT SUPPORT
    ========================================================== --}}

    <div class="urgent-support mt-4">

        <div class="d-flex align-items-start gap-3">

            <div class="urgent-icon">
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>

            <div>

                <h6 class="fw-bold text-dark mb-1">
                    Urgent Website Problem?
                </h6>

                <p class="text-muted mb-0 small">
                    If the website is completely unavailable, you cannot
                    access the admin panel, or an important feature has
                    stopped working, please contact us directly by
                    <strong>Phone or Telegram</strong> for faster assistance.
                </p>

            </div>

        </div>

    </div>


    {{-- =========================================================
         BEFORE CONTACTING SUPPORT
    ========================================================== --}}

    <div class="row g-4 mt-1">

        <div class="col-lg-7">

            <div class="info-card h-100">

                <div class="d-flex align-items-center gap-3 mb-4">

                    <div class="info-icon">
                        <i class="bi bi-info-circle-fill"></i>
                    </div>

                    <div>

                        <h6 class="fw-bold text-dark mb-1">
                            Before Contacting Support
                        </h6>

                        <p class="text-muted small mb-0">
                            Providing these details helps us solve your
                            problem faster.
                        </p>

                    </div>

                </div>


                <div class="support-check-list">

                    <div class="check-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>
                            Clearly describe what problem you are experiencing.
                        </span>
                    </div>

                    <div class="check-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>
                            Mention which page or feature is affected.
                        </span>
                    </div>

                    <div class="check-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>
                            Send a screenshot or screen recording if possible.
                        </span>
                    </div>

                    <div class="check-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>
                            Include any error message shown on the screen.
                        </span>
                    </div>

                    <div class="check-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>
                            Tell us when the problem started.
                        </span>
                    </div>

                </div>

            </div>

        </div>


        {{-- RESPONSE INFORMATION --}}
        <div class="col-lg-5">

            <div class="info-card h-100">

                <div class="response-box">

                    <div class="response-icon">
                        <i class="bi bi-reply-all-fill"></i>
                    </div>

                    <div>

                        <span class="text-muted small d-block">
                            EXPECTED RESPONSE
                        </span>

                        <strong class="text-dark">
                            Usually within a few hours
                        </strong>

                    </div>

                </div>


                <div class="mt-4">

                    <div class="small text-muted mb-2">
                        Support Timezone
                    </div>

                    <div class="fw-semibold text-dark">
                        Asia/Dhaka
                        <span class="text-muted fw-normal">
                            · Bangladesh Time
                        </span>
                    </div>

                </div>


                <div class="mt-3">

                    <div class="small text-muted mb-2">
                        Your Detected Timezone
                    </div>

                    <div id="visitorTimezone"
                         class="fw-semibold text-dark">
                        Detecting...
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<style>

/* =========================================================
   HEADER
========================================================= */

.support-header-icon {
    width: 52px;
    height: 52px;

    border-radius: 14px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(13, 110, 253, .10);
    color: #0d6efd;

    font-size: 22px;

    flex-shrink: 0;
}


/* =========================================================
   SUPPORT STATUS
========================================================= */

.support-status {
    background: #ffffff;

    border: 1px solid #e9ecef;
    border-radius: 16px;

    padding: 17px 19px;

    box-shadow: 0 4px 18px rgba(0, 0, 0, .04);
}

.status-dot {
    width: 12px;
    height: 12px;

    border-radius: 50%;

    background: #198754;

    box-shadow:
        0 0 0 5px rgba(25, 135, 84, .10);

    flex-shrink: 0;
}

.status-dot.closed {
    background: #dc3545;

    box-shadow:
        0 0 0 5px rgba(220, 53, 69, .10);
}


/* =========================================================
   TIME BOX
========================================================= */

.time-box {
    display: flex;
    align-items: center;

    gap: 12px;

    padding: 10px 13px;

    background: #f8f9fa;

    border-radius: 12px;
}

.time-box-icon {
    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(13, 110, 253, .10);

    color: #0d6efd;

    border-radius: 10px;

    flex-shrink: 0;
}

.local-time-icon {
    background: rgba(111, 66, 193, .10);
    color: #6f42c1;
}

.time-label {
    display: block;

    font-size: 9px;
    font-weight: 800;

    letter-spacing: .7px;

    color: #8a94a6;
}

.time-value {
    font-size: 17px;
    font-weight: 800;

    color: #212529;

    line-height: 1.25;
}

.time-date {
    font-size: 11px;

    color: #6c757d;
}


/* =========================================================
   SCHEDULE
========================================================= */

.schedule-card {
    background: #ffffff;

    border: 1px solid #e9ecef;
    border-radius: 18px;

    padding: 23px;

    box-shadow: 0 4px 18px rgba(0, 0, 0, .04);
}

.schedule-icon {
    width: 46px;
    height: 46px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background: rgba(13, 110, 253, .10);

    color: #0d6efd;

    font-size: 19px;
}

.schedule-details {
    border: 1px solid #edf0f2;

    border-radius: 13px;

    overflow: hidden;
}

.schedule-row {
    display: flex;

    justify-content: space-between;
    align-items: center;

    padding: 14px 16px;

    gap: 20px;
}

.schedule-row strong {
    font-size: 14px;

    color: #212529;

    white-space: nowrap;
}

.schedule-row strong small {
    font-size: 10px;

    color: #8a94a6;

    font-weight: 600;
}

.schedule-day {
    display: block;

    font-size: 13px;

    font-weight: 700;

    color: #212529;
}

.schedule-note {
    display: inline-block;

    margin-top: 3px;

    font-size: 11px;

    color: #198754;
}

.local-schedule {
    padding: 14px;

    border-radius: 12px;

    background: #f8f9fa;
}

.local-schedule-icon {
    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(111, 66, 193, .10);

    color: #6f42c1;

    border-radius: 10px;

    flex-shrink: 0;
}


/* =========================================================
   CONTACT CARDS
========================================================= */

.support-card {
    background: #ffffff;

    border: 1px solid #e9ecef;

    border-radius: 18px;

    padding: 24px;

    box-shadow: 0 4px 18px rgba(0, 0, 0, .04);

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;

    display: flex;

    flex-direction: column;
}

.support-card:hover {
    transform: translateY(-4px);

    box-shadow:
        0 12px 30px rgba(0, 0, 0, .08);

    border-color: #dfe3e8;
}

.support-card-top {
    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 12px;
}

.contact-icon {
    width: 48px;
    height: 48px;

    border-radius: 13px;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #ffffff;

    font-size: 19px;
}

.phone-icon {
    background: #0d6efd;
}

.email-icon {
    background: #6f42c1;
}

.telegram-icon {
    background: #229ed9;
}

.contact-label {
    font-size: 10px;

    font-weight: 800;

    letter-spacing: .7px;

    color: #8a94a6;
}

.contact-value {
    color: #212529;

    font-size: 16px;

    font-weight: 700;

    text-decoration: none;

    word-break: break-word;
}

.contact-value:hover {
    color: #0d6efd;
}


/* =========================================================
   URGENT SUPPORT
========================================================= */

.urgent-support {
    padding: 20px;

    border-radius: 16px;

    border: 1px solid #ffe69c;

    background: #fff9e6;
}

.urgent-icon {
    width: 42px;
    height: 42px;

    border-radius: 11px;

    background: #fff0c2;

    color: #997404;

    display: flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;
}


/* =========================================================
   INFORMATION
========================================================= */

.info-card {
    background: #ffffff;

    border: 1px solid #e9ecef;

    border-radius: 18px;

    padding: 24px;

    box-shadow: 0 4px 18px rgba(0, 0, 0, .04);
}

.info-icon {
    width: 44px;
    height: 44px;

    border-radius: 12px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: rgba(13, 110, 253, .10);

    color: #0d6efd;
}

.support-check-list {
    display: flex;

    flex-direction: column;

    gap: 13px;
}

.check-item {
    display: flex;

    align-items: flex-start;

    gap: 10px;

    color: #495057;

    font-size: 14px;

    line-height: 1.5;
}

.check-item i {
    color: #198754;

    margin-top: 2px;

    flex-shrink: 0;
}


/* =========================================================
   RESPONSE
========================================================= */

.response-box {
    display: flex;

    align-items: center;

    gap: 14px;

    padding: 17px;

    border-radius: 14px;

    background: #f8f9fa;
}

.response-icon {
    width: 45px;
    height: 45px;

    border-radius: 12px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: rgba(13, 110, 253, .10);

    color: #0d6efd;

    flex-shrink: 0;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767.98px) {

    .time-box {
        padding: 12px;
    }

    .schedule-row {
        align-items: flex-start;

        flex-direction: column;

        gap: 6px;
    }

    .schedule-row strong {
        white-space: normal;
    }

}


@media (max-width: 575.98px) {

    .support-card,
    .info-card,
    .schedule-card {
        padding: 20px;
    }

    .support-header-icon {
        width: 46px;
        height: 46px;
    }

    .contact-value {
        font-size: 15px;
    }

}

</style>



<script>

(function () {

    'use strict';


    /*
    |--------------------------------------------------------------------------
    | SUPPORT CONFIGURATION
    |--------------------------------------------------------------------------
    */

    const SUPPORT_TIMEZONE = 'Asia/Dhaka';

    const START_HOUR = {{ $support['start_hour'] }};
    const START_MINUTE = {{ $support['start_minute'] }};

    const END_HOUR = {{ $support['end_hour'] }};
    const END_MINUTE = {{ $support['end_minute'] }};

    // Friday
    const OFF_DAY = {{ $support['off_day'] }};


    /*
    |--------------------------------------------------------------------------
    | ELEMENTS
    |--------------------------------------------------------------------------
    */

    const supportStatus =
        document.getElementById('supportStatus');

    const supportStatusDescription =
        document.getElementById('supportStatusDescription');

    const statusDot =
        document.getElementById('statusDot');

    const bangladeshTime =
        document.getElementById('bangladeshTime');

    const bangladeshDate =
        document.getElementById('bangladeshDate');

    const localTime =
        document.getElementById('localTime');

    const localDate =
        document.getElementById('localDate');

    const visitorTimezone =
        document.getElementById('visitorTimezone');

    const localSchedule =
        document.getElementById('localSchedule');


    /*
    |--------------------------------------------------------------------------
    | DETECT VISITOR TIMEZONE
    |--------------------------------------------------------------------------
    */

    let visitorTimezoneName = 'UTC';

    try {

        visitorTimezoneName =
            Intl.DateTimeFormat()
                .resolvedOptions()
                .timeZone || 'UTC';

    } catch (error) {

        visitorTimezoneName = 'UTC';

    }


    /*
    |--------------------------------------------------------------------------
    | FORMAT TIME
    |--------------------------------------------------------------------------
    */

    function formatTime(date, timezone) {

        return new Intl.DateTimeFormat('en-US', {

            timeZone: timezone,

            hour: 'numeric',
            minute: '2-digit',
            second: '2-digit',

            hour12: true

        }).format(date);

    }


    /*
    |--------------------------------------------------------------------------
    | FORMAT DATE
    |--------------------------------------------------------------------------
    */

    function formatDate(date, timezone) {

        return new Intl.DateTimeFormat('en-US', {

            timeZone: timezone,

            weekday: 'long',

            year: 'numeric',

            month: 'short',

            day: 'numeric'

        }).format(date);

    }


    /*
    |--------------------------------------------------------------------------
    | GET TIME PARTS
    |--------------------------------------------------------------------------
    */

    function getTimeParts(date, timezone) {

        const parts =
            new Intl.DateTimeFormat('en-US', {

                timeZone: timezone,

                weekday: 'short',

                hour: 'numeric',

                minute: 'numeric',

                hour12: false

            }).formatToParts(date);


        const result = {};


        parts.forEach(function (part) {

            if (part.type !== 'literal') {

                result[part.type] =
                    part.value;

            }

        });


        let hour =
            parseInt(result.hour, 10);


        if (hour === 24) {
            hour = 0;
        }


        return {

            weekday: result.weekday,

            hour: hour,

            minute: parseInt(
                result.minute,
                10
            )

        };

    }


    /*
    |--------------------------------------------------------------------------
    | BANGLADESH TIME PARTS
    |--------------------------------------------------------------------------
    */

    function getBangladeshParts(date) {

        return getTimeParts(
            date,
            SUPPORT_TIMEZONE
        );

    }


    /*
    |--------------------------------------------------------------------------
    | LOCAL SUPPORT SCHEDULE
    |--------------------------------------------------------------------------
    */

    function getLocalScheduleText() {

        const now = new Date();


        /*
        |--------------------------------------------------------------------------
        | Get today's date in Bangladesh
        |--------------------------------------------------------------------------
        */

        const dateParts =
            new Intl.DateTimeFormat(
                'en-CA',
                {
                    timeZone: SUPPORT_TIMEZONE,

                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit'
                }
            ).formatToParts(now);


        const dateValues = {};


        dateParts.forEach(function (part) {

            if (part.type !== 'literal') {

                dateValues[part.type] =
                    part.value;

            }

        });


        const year =
            dateValues.year;

        const month =
            dateValues.month;

        const day =
            dateValues.day;


        /*
        |--------------------------------------------------------------------------
        | Bangladesh support start
        |--------------------------------------------------------------------------
        */

        const startUtc =
            new Date(
                `${year}-${month}-${day}T10:00:00+06:00`
            );


        /*
        |--------------------------------------------------------------------------
        | Bangladesh support end
        |--------------------------------------------------------------------------
        */

        const endUtc =
            new Date(
                `${year}-${month}-${day}T22:00:00+06:00`
            );


        /*
        |--------------------------------------------------------------------------
        | Convert to visitor timezone
        |--------------------------------------------------------------------------
        */

        const startLocal =
            new Intl.DateTimeFormat(
                'en-US',
                {

                    timeZone:
                        visitorTimezoneName,

                    weekday: 'short',

                    hour: 'numeric',

                    minute: '2-digit',

                    hour12: true

                }
            ).format(startUtc);


        const endLocal =
            new Intl.DateTimeFormat(
                'en-US',
                {

                    timeZone:
                        visitorTimezoneName,

                    weekday: 'short',

                    hour: 'numeric',

                    minute: '2-digit',

                    hour12: true

                }
            ).format(endUtc);


        return `${startLocal} – ${endLocal} (your local time)`;

    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE SUPPORT STATUS
    |--------------------------------------------------------------------------
    */

    function updateSupportStatus(now) {

        const bd =
            getBangladeshParts(now);


        /*
        |--------------------------------------------------------------------------
        | JavaScript Weekday
        |--------------------------------------------------------------------------
        |
        | Sunday    = 0
        | Monday    = 1
        | Tuesday   = 2
        | Wednesday = 3
        | Thursday  = 4
        | Friday    = 5
        | Saturday  = 6
        |
        |--------------------------------------------------------------------------
        */

        const weekdayNumberMap = {

            Sun: 0,
            Mon: 1,
            Tue: 2,
            Wed: 3,
            Thu: 4,
            Fri: 5,
            Sat: 6

        };


        const currentDay =
            weekdayNumberMap[
                bd.weekday
            ];


        const currentMinutes =
            (bd.hour * 60) +
            bd.minute;


        const startMinutes =
            (START_HOUR * 60) +
            START_MINUTE;


        const endMinutes =
            (END_HOUR * 60) +
            END_MINUTE;


        /*
        |--------------------------------------------------------------------------
        | FRIDAY
        |--------------------------------------------------------------------------
        */

        if (currentDay === OFF_DAY) {

            supportStatus.textContent =
                'Today is our off day';

            supportStatusDescription.textContent =
                'We’ll be available tomorrow. Please contact us then.';

            statusDot.classList.add(
                'closed'
            );

            return;

        }


        /*
        |--------------------------------------------------------------------------
        | SUPPORT AVAILABLE
        |--------------------------------------------------------------------------
        */

        if (
            currentMinutes >= startMinutes &&
            currentMinutes < endMinutes
        ) {

            supportStatus.textContent =
                'Support is currently available';

            supportStatusDescription.textContent =
                'You can contact us now.';

            statusDot.classList.remove(
                'closed'
            );

            return;

        }


        /*
        |--------------------------------------------------------------------------
        | SUPPORT CLOSED
        |--------------------------------------------------------------------------
        */

        supportStatus.textContent =
            'Support is currently closed';

        supportStatusDescription.textContent =
            'Support hours are 10:00 AM – 10:00 PM Bangladesh Time.';

        statusDot.classList.add(
            'closed'
        );

    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE CLOCK
    |--------------------------------------------------------------------------
    */

    function updateClock() {

        const now =
            new Date();


        /*
        |--------------------------------------------------------------------------
        | Bangladesh
        |--------------------------------------------------------------------------
        */

        bangladeshTime.textContent =
            formatTime(
                now,
                SUPPORT_TIMEZONE
            );


        bangladeshDate.textContent =
            formatDate(
                now,
                SUPPORT_TIMEZONE
            );


        /*
        |--------------------------------------------------------------------------
        | Visitor Local Time
        |--------------------------------------------------------------------------
        */

        localTime.textContent =
            formatTime(
                now,
                visitorTimezoneName
            );


        localDate.textContent =
            formatDate(
                now,
                visitorTimezoneName
            );


        /*
        |--------------------------------------------------------------------------
        | Visitor Timezone
        |--------------------------------------------------------------------------
        */

        visitorTimezone.textContent =
            visitorTimezoneName;


        /*
        |--------------------------------------------------------------------------
        | Support Status
        |--------------------------------------------------------------------------
        */

        updateSupportStatus(
            now
        );


        /*
        |--------------------------------------------------------------------------
        | Local Schedule
        |--------------------------------------------------------------------------
        */

        try {

            localSchedule.textContent =
                getLocalScheduleText();

        } catch (error) {

            localSchedule.textContent =
                'Support hours: 10:00 AM – 10:00 PM Bangladesh Time.';

        }

    }


    /*
    |--------------------------------------------------------------------------
    | INITIAL LOAD
    |--------------------------------------------------------------------------
    */

    updateClock();


    /*
    |--------------------------------------------------------------------------
    | LIVE UPDATE
    |--------------------------------------------------------------------------
    */

    setInterval(
        updateClock,
        1000
    );

})();

</script>

@endsection