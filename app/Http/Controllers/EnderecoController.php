<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\endereco;
use Illuminate\Support\Facades\Auth;

class EnderecoController extends Controller
{
    private $enderecoModel;
    
    public function __construct(endereco $endereco) {
        $this->middleware('auth');
        
        $this->enderecoModel = $endereco;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        
        $enderecos = $this->enderecoModel->all()->where('id_user', $user);
                      
        return view('endereco', compact('enderecos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('endereco-addup');
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
        $this->validate($request, $this->enderecoModel->rules);
        
        $user = ["id_user" => Auth::user()->id];
        
        $form = array_merge($form, $user);
        
        $store = $this->enderecoModel->insert($form);
        
        
        if($store)
            return redirect()->route('endereco.index');
        else
            return redirect()->route('endereco.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $endereco = $this->enderecoModel->find($id);
        
        return view('endereco-show', compact('endereco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $endereco = $this->enderecoModel->find($id);
        
        return view('endereco-addup', compact('endereco')); 
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
        $form = $request->except(['_token', '_method']); // passa esse cara dentro do insert
                
        // data validation
        $this->validate($request, $this->enderecoModel->rules);
                        
        $update = $this->enderecoModel
                ->find($id)
                ->update($form);
        
        if($update)
            return redirect()->route('endereco.index');
        else
            return redirect()
                    ->route('endereco.edit', $id)
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
        $endereco = $this->enderecoModel->find($id);
                
        $delete = $endereco->delete();
        
        return redirect()->route('endereco.index');
    }
}
