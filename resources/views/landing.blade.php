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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- End Google Font-->

  <!-- ======= Styles =======-->
  <link href="/landingv2/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="/landingv2/vendors/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="/landingv2/vendors/glightbox/glightbox.min.css" rel="stylesheet">
  <link href="/landingv2/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="/landingv2/vendors/aos/aos.css" rel="stylesheet">
  <!-- End Styles-->

  <!-- ======= Theme Style =======-->
  <link href="/landingv2/css/style.css" rel="stylesheet">
  <!-- End Theme Style-->

  <script>
    (function() {
      const storedTheme = localStorage.getItem('theme') || 'light';
      document.documentElement.setAttribute('data-bs-theme', storedTheme);
      })();
  </script>

  <script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>

  @routes
  @vite(['resources/js/landing.js', "resources/js/Pages/{$page['component']}.vue"])
  @inertiaHead
</head>

<body>
  @inertia

  <button id="back-to-top"><i class="bi bi-arrow-up-short"></i></button>

  <!-- ======= Javascripts =======-->
  <script src="/landingv2/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="/landingv2/vendors/swiper/swiper-bundle.min.js"></script>
  <script src="/landingv2/vendors/aos/aos.js"></script>
  <script src="/landingv2/js/custom.js"></script>
  <!-- End JavaScripts-->

  {{-- <script src="/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
  
</body>

</html>