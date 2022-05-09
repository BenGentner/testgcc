<!--   Core JS Files   -->
<script src="/vendor/material-kit/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="/vendor/material-kit/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/vendor/material-kit/assets/js/material.min.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/vendor/material-kit/assets/js/nouislider.min.js" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="/vendor/material-kit/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="/vendor/material-kit/assets/js/material-kit.js" type="text/javascript"></script>

<script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<script type="text/javascript">

    $().ready(function () {
        // the body of this function is in assets/material-kit.js
        materialKit.initSliders();
        window_width = $(window).width();

        if (window_width >= 992) {
            big_image = $('.wrapper > .header');

            $(window).on('scroll', materialKitDemo.checkScrollForParallax);
        }

    });

    $(document).ready(function () {
        $('.gallery').magnificPopup({
            type: 'image',
            delegate: 'a'
        });
    });
</script>