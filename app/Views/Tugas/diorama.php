<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLN GAREULIS - Tugas Peserta Diklat</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('favicons/apple-touch-icon.png');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('favicons/favicon-32x32.png');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('favicons/favicon-16x16.png');?>">
    <link rel="manifest" href="<?php echo base_url('favicons/site.webmanifest');?>">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    
    <div class="container p-4" id="coreContent">

        <div class="py-4 text-center">
            <h2 class="text-uppercase">Tugas Peserta </br>(III Diorama)</h2>
        </div>

        <div class="progress mb-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
            <div class="col">

                <form enctype='multipart/form-data' action="<?php echo route_to('api-diorama');?>" method="post">
                    <h5 class="font-weight-bold">Diorama dunia baca</h5>
                    <p id="dioramaText">Diorama belum di unggah</p>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="filePhotoAwal">Unggah Photo Awal</label>
                            <input type="file" name="filePhotoAwal" id="filePhotoAwal" class="form-control-file">
                            <input type="hidden" name="prevNik" id="prevNik" value="<?php echo $nik ?? '' ;?>">
                            <input type="hidden" name="prevToken" id="prevToken" value="<?php echo $token ?? '' ;?>">
                            <small id="photo" class="form-text text-muted">
                                <ul>Ketentuan :
                                    <li>Ukuran masksimal 2MB</li>
                                    <li>Format Extensi JPG,JPEG,PNG</li>
                                </ul>
                            </small>
                            <small class="text-danger"><?= $validation->getError('filePhotoAkhir') ?></small>
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="filePhotoAkhir">Unggah Photo Akhir</label>
                            <input type="file" name="filePhotoAkhir" id="filePhotoAkhir" class="form-control-file">
                            <small id="photo" class="form-text text-muted">
                                <ul>Ketentuan :
                                    <li>Ukuran masksimal 2MB</li>
                                    <li>Format Extensi JPG,JPEG,PNG</li>
                                </ul>
                            </small>
                            <small class="text-danger"><?= $validation->getError('filePhotoAkhir') ?></small>
                        </div>
                    </div>
                    <hr class="mx-2">
                    <div class="form-group row">
                        <div class="col-12">
                        <button type="submit" id="btnDiorama" class="btn btn-primary btn-block">Selanjutnya</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <script type="text/javascript">
    
    var $ = jQuery.noConflict();

    const baseUrl = "<?php echo base_url();?>";
    const api_uris = "<?php echo route_to('api-count-diorama');?>";

    const nik = "<?php echo $nik ?? '' ;?>"
    const token = "<?php echo $token ?? '' ;?>"

    $(function(){
        countDiorama();
    });

    function countDiorama(){
        $.ajax({
            url: api_uris,
            method: 'POST',
            data : {
                nik:nik,
                token:token,
            },
            success: function(response){
                // console.log(response);
                if(response.data != 0){
                    // $('#btnDiorama').prop('disabled', true);
                    // $('#filePhotoAwal').prop('disabled', true);
                    // $('#filePhotoAkhir').prop('disabled', true);
                    $('#dioramaText').text('Diorama Sudah di unggah,');
                    $('#dioramaText').append('<p>Anda dapat melewati form, silahkan klik tombol <span class="btn btn-info btn-sm">Lewati</span></p>');
                    $('#coreContent').append(`<a href="${baseUrl + '/peserta/tugas/karya-tulis/'+nik+'/'+token}" class="btn btn-info">Lewati</a>`);
                }
            }
        });
    }

    </script>

</body>
</html>