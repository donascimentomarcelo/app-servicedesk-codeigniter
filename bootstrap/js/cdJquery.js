    $(document).ready(function () {

        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });

    });

    $(function () {
        $('#formulario_usuario').ajaxForm({
            success: function (data) {
                
                if (data === '1') {

                    success: 
                    $("#imagem").val("");
                    $('.add-info').html('<div class="alert alert-success alert-upload">\n\
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n\
                        Foto de perfil atualizada com sucesso!</div>');
                    loadPhoto();
                    loadContainer();

                } else if (data === '<p>The filetype you are attempting to upload is not allowed.</p>') {

                    $('.add-info').html('<div class="alert alert-danger alert-upload">\n\
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n\
                        Escolha apenas arquivos .jpg, .png ou .gif!</div>');
                    
                } else if (data === '<p>The image you are attempting to upload exceedes the maximum height or width.</p>') {

                    $('.add-info').html('<div class="alert alert-danger alert-upload">\n\
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n\
                        Escolha apenas com 1024px de largura e 768px de altura!</div>');
                  
                } else if (data === '<p>The file you are attempting to upload is larger than the permitted size.</p>') {

                    $('.add-info').html('<div class="alert alert-danger alert-upload">\n\
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n\
                        Escolhe uma imagem menor, de até 2 MB.</div>');
                 
                }else{
                    
                    $('.add-info').html('<div class="alert alert-danger alert-upload"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+data+'</div>');
                    
                };
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
                  var getValue = '';
                  var getMenu = '';
                    getValue += '<img src="../../.' + data['imagem']+ '" class="img-circle" width="100px" height="100px">';
                    getMenu += '<img src="../../.' + data['imagem']+ '" class="img-circle" class="img-circle" width="50px" height="50px"> ' + data['nome']+ '';
                    
                    $('.container-menu').html(getMenu);
                    $('.image-profile').html(getValue);
                }, 'json');
    };
    
    window.onload = function loadFunctionsInBeginningPage(){
        loadPhoto();
        
    };