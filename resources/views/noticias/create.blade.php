@extends('layouts.default')

@section('title', 'Desafio - Cadastrar Notícia')

@section('stylesheets')
<style type="text/css">
    .thumbnail{
        width: 100%;
        height: 250px;
        background-size: cover;
        background-position: center;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')
<div class="header bg-gradient-gray pb-3 pt-5 pt-md-5">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Header container -->
<div class="container-fluid d-flex align-items-center">
    <div class="row">
        <div class="col-lg-12 col-md-12">
        <h1 class="display-2 text-darker">Cadastrar Notícia</h1>
            <a href="{{ route('noticias.index') }}" class="btn btn-gray text-darker">Voltar</a>
        </div>
    </div>
</div><br><br><br><br><br>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-2">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Notícias</h3>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('noticias.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Informações da notícia</h6>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="product_title">Título</label>
                                            <input type="text" id="titulo" class="form-control form-control-alternative" name="titulo" placeholder="Título da notícia" value="{{ old('titulo') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="product_title">Texto</label>
                                            <textarea type="text" id="texto" class="form-control form-control-alternative" name="texto" placeholder="Texto da notícia"> {{ old('texto') }} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex  justify-content-center">
                                            <div class="image-hover">
                                                <img id="img_source_preview" src="{{ asset('img/product-no-image.png') }}" class="img-fluid" >
                                                <div class="middle">
                                                    <button type="button" id="example_img_button" onclick="uploadImage()" class="btn btn-sm btn-primary">Enviar imagem</button>
                                                    <input type="file" class="d-none" id="img_source" onchange="changeImage(this)" name="imagem">
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="text-center" for="img_source">Imagem</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer pb-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="float-right form-group">
                                    <a href="{{ route('noticias.index') }}" class="btn btn-secondary">Cancelar</a>
                                    <button class="btn btn-gray">Registrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="footer-expand bg-gradient-gray pb-3 ">
    <div class="text-center text-darker">
        Desenvolvido por <a href="https://www.linkedin.com/in/paloma-imaculada-pena-gomes-722698105/">Paloma Gomes</a>
    </div>
</footer>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script type="text/javascript">
    //CKEDITOR.replace('product_description');

    window.onload = function(){
        //Check File API support
        if(window.File && window.FileList && window.FileReader)
        {
            var filesInput = document.getElementById("files");
            filesInput.addEventListener("change", function(event){
                var files = event.target.files; //FileList object
                var output = document.getElementById("result");

                output.innerHTML = '';

                for(var i = 0; i< files.length; i++)
                {
                    var file = files[i];
                    //Only pics
                    if(!file.type.match('image'))
                        continue;
                    var picReader = new FileReader();
                    picReader.addEventListener("load",function(event){
                        var picFile = event.target;
                        var div = document.createElement("div");
                        div.setAttribute('class', 'd-flex col-lg-3 col-md-6 col-12 align-items-center justify-content-center');

                        var thumb = document.createElement("div");
                        thumb.setAttribute('class', 'thumbnail');
                        thumb.style.backgroundImage = "url('"+ picFile.result.replace(/(\r\n|\n|\r)/gm, "") + "')";

                        div.innerHTML = thumb.outerHTML;

                        output.insertBefore(div,null);
                    });
                    //Read the image
                    picReader.readAsDataURL(file);
                }
            });
        }
        else
        {
            console.log("Browser not supported");
        }
    }

    function uploadImage(){
        $('#img_source').click();
    }

    function uploadImageMobile(){
        $('#img_source_mobile').click();
    }

    function changeImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_source_preview')
                    .attr('src', e.target.result)
                    .width('auto')
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function changeImageMobile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_source_mobile_preview')
                    .attr('src', e.target.result)
                    .width('auto')
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
