<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>







    <!-- Bootstrap CSS -->
        {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}









    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    --}}
    {{-- <script
        src="https://cdn.tiny.cloud/1/pq4mnwhqjbmyxxen2fhwm4kb46p3bcu3paqfkclr5jb3qcm2/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script> --}}
    {{-- tinyMCE 6.5.1 --}}
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- <link rel="stylesheet" href="wwwroot/css/site.css" asp-append-version="true" />
    <link rel="stylesheet" href="~/LifeInsuranceCore.styles.css" asp-append-version="true" />*@ -->

    <!-- ===============================================-->
    <!--    assets from dashboard-->
    <!-- ===============================================-->



    {{-- <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('uploads/favicon/' . $favicon->apple_touch_icon) }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('uploads/favicon/' .$favicon->favicon_thirtyTwo) }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/favicon/' .$favicon->favicon_sixteen) }}"> --}}



    {{--
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('adminassets/assets/img/favicons/favicon.ico') }}">
    --}}
    {{-- <link rel="manifest" href="{{ asset('uploads/favicon/file'.$favicon->file) }}"> --}}

    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('adminassets//assets/js/config.js') }}"></script>
    <script src="{{ asset('adminassets/vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets from dashboard-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('adminassets/vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminassets/assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('adminassets/assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('adminassets/assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('adminassets/assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminassets/assets/toastr/toastr.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminassets/assets/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminassets/assets/datatables.net/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminassets/assets/datatables.net/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('adminassets/assets/datatables.net/css/buttons.dataTables.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminassets/assets/select2/dist/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('adminassets/vendors/flatpickr/flatpickr.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('adminasset/css/custom.css') }}" asp-append-version="true" />

    {{-- for tinyMCE --}}
    <script src={{ asset('tinymce/tinymce.min.js') }}></script>

    {{-- <script src="tinymce/tinymce.min.js"></script> --}}


    {{-- <script src="js/tinymce_editor.js"></script> --}}

    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>




<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
