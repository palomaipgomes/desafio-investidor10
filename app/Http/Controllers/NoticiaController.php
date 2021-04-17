<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view('noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $noticias = new Noticia();

        $noticias->titulo = $request->titulo;
        $noticias->texto = $request->texto;

        if($request->hasFile('imagem')){
            $name = Str::random(15). '.' . $request->imagem->extension();

            $path = $request->imagem->storeAs('image_uploads', $name, 'public');

            $noticias->imagem = asset('img/noticias').$path;
        }
        
        if($noticias->save()){
            return redirect()->route('noticias.index')->with('success', 'Notícia publicada com sucesso.');
        }else{
            return redirect()->back()->with('error', 'Erro ao publicar notícia. Tente novamente em alguns minutos.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show($noticias_id)
    {
        $noticias = Noticia::find($noticias_id);

        return view('noticias.show', compact('noticias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit($noticias_id)
    {
        $noticias = Noticia::find($noticias_id);
        return view('noticias.edit', compact('noticias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update($noticias_id, Request $request)
    {
        $noticiaas = Noticia::find($noticias_id);

        $noticias->titulo = $request->titulo;
        $noticias->texto = $request->texto;

        if($request->hasFile('imagem')){
            $name = Str::random(15). '.' . $request->imagem->extension();

            $path = $request->imagem->storeAs('image_uploads', $name, 'public');

            $noticias->imagem = asset('img/noticias').$path;
        }
        
        if($noticias->update()){
            return redirect()->route('noticias.edit', $noticias_id)->with('success', 'Notícia atualizada com sucesso.');
        }else{
            return redirect()->back()->with('error', 'Erro ao atualizar notícia. Tente novamente em alguns minutos.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($noticias_id, Request $request)
    {
        $noticias = Noticia::find($noticias_id);

        $noticias->titulo = $request->titulo;
        $noticias->texto = $request->texto;

        if($request->hasFile('imagem')){
            $name = Str::random(15). '.' . $request->imagem->extension();

            $path = $request->imagem->storeAs('image_uploads', $name, 'public');

            $noticias->imagem = asset('img/noticias').$path;
        }
        
        if($noticias->delete()){
            return redirect()->route('noticias.index', $noticias_id)->with('success', 'Notícia excluída com sucesso.');
        }else{
            return redirect()->back()->with('error', 'Erro ao excluir notícia. Tente novamente em alguns minutos.')->withInput();
        }
    }
}
