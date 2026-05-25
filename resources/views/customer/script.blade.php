<!-- CoreUI -->
<script src="{{ asset('Customer/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>

<!-- SimpleBar -->
<script src="{{ asset('Customer/vendors/simplebar/js/simplebar.min.js') }}"></script>

<!-- Chart.js -->
<script src="{{ asset('Customer/vendors/chart.js/js/chart.umd.js') }}"></script>

<!-- CoreUI Chart -->
<script src="{{ asset('Customer/vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>

<!-- CoreUI Utils -->
<script src="{{ asset('Customer/vendors/@coreui/utils/js/index.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('Customer/js/main.js') }}"></script>

<script>
    const header = document.querySelector('header.header');

    document.addEventListener('scroll', () => {
        if (header) {
            header.classList.toggle(
                'shadow-sm',
                document.documentElement.scrollTop > 0
            );
        }
    });
</script>