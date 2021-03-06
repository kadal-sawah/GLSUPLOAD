<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLN GAREULIS - Admin</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('favicons/apple-touch-icon.png');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('favicons/favicon-32x32.png');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('favicons/favicon-16x16.png');?>">
    <link rel="manifest" href="<?php echo base_url('favicons/site.webmanifest');?>">

    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/r-2.2.9/sc-2.0.5/datatables.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/r-2.2.9/sc-2.0.5/datatables.min.js"></script>

    <style>
    main > .container {
    padding: 60px 15px 0;
    }

    /* .footer {
    background-color: #f5f5f5;
    } */

    .footer > .container {
    padding-right: 15px;
    padding-left: 15px;
    }

    code {
    font-size: 80%;
    }
    </style>
</head>
<body class="d-flex flex-column h-100">
    
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">GLN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownRekap" data-toggle="dropdown" aria-expanded="false">Rekap Data</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownRekap">
                        <a class="dropdown-item" href="<?php echo route_to('rekap-peserta');?>">Peserta</a>
                        <a class="dropdown-item" href="<?php echo route_to('rekap-diklat');?>">Diklat</a>
                        <a class="dropdown-item" href="<?php echo route_to('rekap-book');?>">Buku</a>
                        <a class="dropdown-item" href="<?php echo route_to('rekap-diorama');?>">Diorama</a>
                        <a class="dropdown-item" href="<?php echo route_to('rekap-karya');?>">Karya Tulis</a>
                        <a class="dropdown-item" href="<?php echo route_to('rekap-literasi');?>">Literasi</a>
                        <a class="dropdown-item" href="<?php echo route_to('rekap-video');?>">Video</a>
                        <a class="dropdown-item" href="<?php echo route_to('rekap-antologi');?>">Antologi</a>
                        <a class="dropdown-item" href="<?php echo route_to('rekap-partisipasi');?>">Partisipasi</a>
                    </div>
                </li>
            </ul>
            <a class="text-decoration-none text-muted" href="<?php echo base_url('/admin/api/logout');?>">Keluar</a>
        </div>
    </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1 class="my-5">Data Peserta</h1>
        <table id="biodataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Token</th>
                    <th>Kota</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</main>

<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">Dian Global Tech &copy; 2021</span>
    </div>
</footer>

<script type="text/javascript">

    var $ = jQuery.noConflict();

    var baseUrl = "<?php echo base_url();?>";
    var api_uri = "<?php echo route_to('datatable-biodata'); ?>";
    var api_uris = "<?php echo route_to('api-admin-delete-peserta'); ?>";

    $(function(){

        let biodata_table = new $('#biodataTable').DataTable({
            // "processing": true, 
            // "search": {
            //     "return": true
            // },
            // "serverSide": true,
            "ordering" : false,
            // "filtering" : false,
            "ajax" : {
                "url" : api_uri,
                "type" : 'POST',
                // "dataSrc": 'data',
            },
            "columns" : [
                { "data" : 'number' },
                { "data" : 'resume_name' },
                { "data" : 'resume_ids' },
                { "data" : 'resume_token' },
                { "data" : 'resume_city'},
                { "data" : 'opsi'},
            ]
        });

    });

    function viewPeserta(id,token){
        var tabs = window.open(baseUrl + '/admin/pages/detail/biodata/' + id + '/' + token);
        (tabs) ? tabs.focus() : alert('tolong ijinkan popup') ;
    }

    function deletePeserta(id)
    {
        var question = confirm('Anda Yakin ? menghapus data, data tidak dapat dikembalikan');
        // (question) ? executeDelete(id) + alert('data terhapus') : false;
        (question) ? executeDelete(id) : false;
    }

    function executeDelete(id){
        $.post(api_uris, {id:id}, function(response){
            (response) ? window.location.reload() : false;
            // console.log(response);
        });
    }

</script>

</body>
</html>