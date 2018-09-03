<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\filme;
use Illuminate\Support\Facades\Auth;

class FilmeController extends Controller
{
    private $filmeModel;
    
    public function __construct(filme $filme) {
        $this->middleware('auth');
        
        $this->filmeModel = $filme;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        
        $filmes = $this->filmeModel->all()->where('id_user', $user);
                      
//        return view('welcome', ['teste' => 123]);
        return view('filme', compact('filmes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filme-addup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->except(['_token']);
        
        // data validation
        $this->validate($request, $this->filmeModel->rules);
        
        $user = ["id_user" => Auth::user()->id];
        
        $form = array_merge($form, $user);
        
        $store = $this->filmeModel->insert($form);
        
        
        if($store)
            return redirect()->route('filme.index');
        else
            return redirect()->route('filme.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filme = $this->filmeModel->find($id);
        
        return view('filme-show', compact('filme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filme = $this->filmeModel->find($id);
        
        return view('filme-addup', compact('filme')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = $request->except(['_token', '_method']);
                
        // data validation
        $this->validate($request, $this->filmeModel->rules);
                        
        $update = $this->filmeModel
                ->find($id)
                ->update($form);
        
        if($update)
            return redirect()->route('filme.index');
        else
            return redirect()
                    ->route('filme.edit', $id)
                    ->with(['errors' => 'Não foi possível alterar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Encontra o resgistro
        $filme = $this->filmeModel->find($id);
                
        $delete = $filme->delete();
        
        return redirect()->route('filme.index');
    }
}
