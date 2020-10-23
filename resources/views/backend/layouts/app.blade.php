<!doctype html>
<html lang="en">
<head>
    <title>Maat University</title>
    <meta charset="utf-8">
    <link href="{{ asset('backend')}}/css/bootstrap.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/css/style.css">

    <!-- Sweet Alert -->
    <link href="{{ asset('backend') }}/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/font-awesome/css/style.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/css/custom_style.css">


</head>
<body>

<div class="wrapper d-flex align-items-stretch">
   @include('backend.layouts.elements.sidebar')

    <!-- Page Content  -->
    <div id="content" class="pl-4 pr-4  pt-1">
        @include('backend.layouts.elements.header')
        @yield('content')
    </div>
</div>

<script src="{{ asset('backend') }}/js/jquery.min.js"></script>
<script src="{{ asset('backend') }}/js/popper.js"></script>
<script src="{{ asset('backend') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('backend') }}/js/main.js"></script>
<!-- Toastr -->
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
@stack('script')
{!! Toastr::message() !!}
<!-- Sweet alert -->
<script src="{{ asset('backend/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script type="text/javascript">

    function deleteItem(slug){
        swal({
            title: "Are you sure delete this item?",
            text: "You will not be able to recover this item file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
            event.preventDefault();
            document.getElementById('delete-form-'+slug).submit();
        })
    }
</script>

</body>
</html>