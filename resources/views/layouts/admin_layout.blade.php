<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:08:15 GMT -->

<head>

    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />

    <!-- FAVICONS ICON ============================================= -->
    {{-- <link rel="icon" href="../error-404.html" type="image/x-icon" /> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/images/gear-solid.svg') }}" />

    <!-- PAGE TITLE HERE ============================================= -->
    <title>LanguageTube : @yield('title') </title>

    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
 <script src="assets/js/html5shiv.min.js"></script>
 <script src="assets/js/respond.min.js"></script>
 <![endif]-->

    {{-- ============================================= --}}
    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/assets.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/calendar/fullcalendar.css') }}">

    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/typography.css') }}">

    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/shortcodes/shortcodes.css') }}">

    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/dashboard.css') }}">
    <link class="skin" rel="stylesheet" type="text/css" href="{{ asset('admin/css/color/color-1.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- datatables.net -->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    {{-- ============================================= --}}

    {{-- ============================================= --}}
    <!-- External JavaScripts -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}s"></script>
    <script src="{{ asset('admin/vendors/magnific-popup/magnific-popup.js') }}"></script>
    <script src="{{ asset('admin/vendors/counter/waypoints-min.js') }}"></script>
    <script src="{{ asset('admin/vendors/counter/counterup.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/imagesloaded/imagesloaded.js') }}"></script>
    <script src="{{ asset('admin/vendors/masonry/masonry.js') }}"></script>
    <script src="{{ asset('admin/vendors/masonry/filter.js') }}"></script>
    <script src="{{ asset('admin/vendors/owl-carousel/owl.carousel.js') }}"></script>
    <script src='{{ asset('admin/vendors/scroll/scrollbar.min.js') }}'></script>
    <script src="{{ asset('admin/js/functions.js') }}"></script>
    <script src="{{ asset('admin/vendors/chart/chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/admin.js') }}"></script>
    <script src='{{ asset('admin/vendors/calendar/moment.min.js') }}'></script>
    <script src='{{ asset('admin/vendors/calendar/fullcalendar.js') }}'></script>
    <!-- datatables.net -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset ('admin/js/swal.js')}}"></script>
    {{-- ============================================= --}}

</head>

<body class="ttr-opened-sidebar ttr-pinned-sidebar">

    <!-- header start -->
    @include('admin.parts.header')
    <!-- header end -->

    <!-- Left sidebar menu start -->
    @include('admin.parts.sidebar')
    <!-- Left sidebar menu end -->

    <!-- Main Content -->
    @yield('content')
    <!-- End of Main Content -->
    <div class="ttr-overlay"></div>
    <!-- footer start -->
    @include('admin.parts.footer')
    <!-- footer end -->

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>




</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->

</html>
