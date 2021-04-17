@extends('layouts.default')

@section('title', 'Desafio')

@section('stylesheets')
<style type="text/css">
    .btn-circle {
        padding: 7px 10px;
        border-radius: 50%; 
        font-size: 1rem;
    }
</style>
@endsection

@section('content')
<!-- Header -->
<div class="header bg-gradient-gray pb-3 pt-5 pt-md-5">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>


<div class="container-fluid pt-5">
    <div class="row"> 
    @forelse($noticias as $noticia)          
        <div class="col-md-4 pb-3 pt-3">
            <div class="card shadow" style="height: 45rem;">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col text-center">
                            <h3 class="mb-0">{{ $noticia->titulo }}</h3>                                
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>{{ $noticia->texto }}</p>
                </div>
                <div class="form-group text-center">
                    <a href="{{ route('noticias.show', $noticia->id) }}" class="btn btn-gray" style="width: 20rem;">Acessar</a>
                </div>                       
            </div>
        </div>
    @empty
    @endforelse
    </div>    
</div> 
<br>
   
<footer class="footer-expand bg-gradient-gray pb-2">
    <div class="text-center text-darker">
        Desenvolvido por <a href="https://www.linkedin.com/in/paloma-imaculada-pena-gomes-722698105/">Paloma Gomes</a>
    </div>
</footer>
@endsection

@section('scripts')
    <script type="text/javascript">
        function update_delete_form_action(action){
            $("#delete_form").attr('action', action);
        }
    </script>
@endsection
