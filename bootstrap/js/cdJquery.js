    $(document).ready(function () {

        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });

    });

    function minhaCallCack() {
        swal({title: "Foto Alterada com sucesso!",
            text: "Exito ao realizar operação.",
            timer: 1000,
            showConfirmButton: false
        });
    }
    function fillImage() {
        swal({title: "ERRO DE ENVIO!",
            text: "Anexe uma imagem para realizar a operação.",
            timer: 2000,
            showConfirmButton: false
        });
    }
    function typeImage() {
        swal({title: "ERRO DE EXTENSÃO!",
            text: "Os formatos aceitos serão somente : gif, jpg e png.",
            timer: 2000,
            showConfirmButton: false
        });
    }
    function sizeImage() {
        swal({title: "ERRO DE TAMANHO!",
            text: "Anexe uma imagem para realizar a operação.",
            timer: 2000,
            showConfirmButton: false
        });
    }

    $(function () {
        $('#formulario_usuario').ajaxForm({
            success: function (data) {
                console.log(data);
                if (data === 1) {

                    success: minhaCallCack();

                } else if (data === '<p>The filetype you are attempting to upload is not allowed.</p>') {

                    $('.add-info').html('<div class="alert alert-danger">\n\
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n\
                        Escolha apenas arquivos .jpg, .png ou .gif!</div>');
                    //$('.add-info').html('<div class="alert alert-danger">'+data+'</div>');

                }
            }
        });
    });

    var base_url = "<?= base_url() ?>";

    function refresh() {
        document.location.href = document.location.href;
    }

    $(":file").filestyle({icon: false});

    function novo() {

        $('#alterPhoto').modal('show');

    }

    function loadPhoto() {
        $.get('/cd/index.php/perfil_pessoal/perfil_pessoal_controller/load_image',
                function (data) {
                  //  $('#imagem').val(data.imagem);
                    $('.imagem').html('<img src="'+data.imagem+'" >');
                  //  var img = $('#imagem').val(data.imagem);
                  //  $('#id_sua_img').attr('src', img);

                }, 'json');
    }