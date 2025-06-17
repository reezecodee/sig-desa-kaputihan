<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- ======= Google Font =======-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
    <!-- End Google Font-->

    <!-- ======= Styles =======-->
    <link href="/assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendors/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/assets/vendors/glightbox/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/assets/vendors/aos/aos.css" rel="stylesheet">
    <!-- End Styles-->

    <!-- ======= Theme Style =======-->
    <link href="/assets/css/style.css" rel="stylesheet">
    <!-- End Theme Style-->

    <script>
      (function() {
      const storedTheme = localStorage.getItem('theme') || 'light';
      document.documentElement.setAttribute('data-bs-theme', storedTheme);
      })();
    </script>

    @routes
    @vite(['resources/js/landing.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body>
    @inertia

    <button id="back-to-top"><i class="bi bi-arrow-up-short"></i></button>

    <!-- ======= Javascripts =======-->
    <script src="/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendors/aos/aos.js"></script>
    <script src="/assets/js/custom.js"></script>
    <!-- End JavaScripts-->
</body>

</html>