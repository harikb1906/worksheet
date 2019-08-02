<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title',config('app.name'))</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/nodeAssets/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/nodeAssets/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/nodeAssets/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/nodeAssets/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="/nodeAssets/pwstabs/assets/jquery.pwstabs.min.css">
    <link rel="stylesheet" href="/css/custom.css">

    <!-- endinject -->
    <!-- plugin css for this page -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />{{--select2--}}
    <link rel="stylesheet" href="/nodeAssets/bootstrap-table/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="/nodeAssets/datatables.net-bs4/css/dataTables.bootstrap4.css" />{{--data table--}}
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/images/favicon.png"/>
    {{--    extra--}}
    <link rel="stylesheet" href="/nodeAssets/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/nodeAssets/ti-icons/css/themify-icons.css" />


</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
@include('layouts.navbar')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="row row-offcanvas row-offcanvas-right">
            <!-- partial:partials/_sidebar.html -->

        @include('layouts.sidebar')

        <!-- partial -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
        @include('layouts.footer')
        <!-- partial -->
        </div>
        <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="/nodeAssets/jquery/dist/jquery.min.js"></script>
<script src="/nodeAssets/popper.js/dist/umd/popper.min.js"></script>
<script src="/nodeAssets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/nodeAssets/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="/nodeAssets/pwstabs/assets/jquery.pwstabs.min.js"></script>
<script src="/nodeAssets/bootstrap-table/dist/bootstrap-table.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<!-- endinject -->
<!-- Plugin js for this page-->
<script src="nodeAssets/datatables.net/js/jquery.dataTables.js"></script>
<script src="nodeAssets/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="/js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/data-table.js"></script>
<script src="/js/tabs.js"></script>
<script src="/js/jq.tablesort.js"></script>
<!-- End custom js for this page-->
{{--xtra--}}
@yield('js-add')

</body>

</html>
