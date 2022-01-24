<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Datatrans Payment">
    <meta name="keywords" content="Datatrans Payment">
    <meta name="author" content="Dmytro">
    <title>Datatrans</title>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/form-wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/pickers/form-pickadate.css') }}">
    <!-- END: Page CSS-->

    {{-- tell --}}
    <link rel="stylesheet" href="https://jackocnr.com/assets/intl-tel-input-large/css/intlTelInput.css?5"/>

    
    <!-- Begin style CSS   -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatrans/css/style.css') }}">
    <!-- End style CSS   -->
    <style>
        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after, table.dataTable thead .sorting::before, table.dataTable thead .sorting_asc::before, table.dataTable thead .sorting_desc::before, table.dataTable thead .sorting_asc_disabled::before, table.dataTable thead .sorting_desc_disabled::before{
            right: 0px;
            content: "";
        }
        .dropdown-item{
            width: auto;
        }
        table> tbody>tr td:first-child{
            cursor: pointer;
        }
        table> tbody>tr td:first-child:hover{
            color: #f4662f;
        }
        .picker{
            max-width: 340px;
            min-width: 200px;
            top: auto;
        }
    </style>
</head>