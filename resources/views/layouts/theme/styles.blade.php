<link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/js/loader.js') }}"></script>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
{{-- <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css"> --}}
<link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<!-- sweetalerts -->
<link href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}">

<link rel="stylesheet" href="{{ asset('plugins/font-icons/fontawesome/css/regular.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/font-icons/fontawesome/css/fontawesome.css') }}">


<style>
    aside{
        display: none !important;
    }

    .page-item.active .page-link{
        z-index: 3;
        color: #fff;
        background-color: #3b3f5c;
        border-color: #3b3f5c;
    }

    @media (max-width: 480px){
        .mtmobile{
            margin-bottom: 20px !important;
        }

        .mbmobile{
            margin-bottom: 10px !important;
        }

        .hideonsm{
            display: none !important;
        }

        .inblock{
            display: block !important;
        }
        
    }

    .table-hover:not(.table-dark) tbody tr:hover{
        transform: none !important;
    }

    .dt-button.btn-success{
        color: #fff !important;
        background-color: #8dbf42 !important;
        border-color: #8dbf42 !important;
    }
</style>

@livewireStyles