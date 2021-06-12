<?php

namespace App\Http\Controllers\Site;

use App\Client;
use App\Assessment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Client::all();
        // dd($clientes);

        // $mensagem = $request->session()->get("mensagem");

        return view("site.clients.index" , compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("site.clients.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nome_empresa' => ['required', 'unique:clients', 'max:100'],
            'cnpj' => ['required', 'unique:clients', 'max:14'],
            'nome_responsavel' => ['required', 'max:100'],
            'email' => ['required',  'max:100'],
            'celular' => ['required', 'max:11'],
        ]);

        $clientes = $request->all();
        Client::create($clientes);
        return redirect()->route('site.clientes')->with('success', 'Cliente cadastrado com sucesso');

        // $request->session()->flash('mensagem', "Cliente {$clientes->id} criado com sucesso {$clientes->nome}");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = 1;
        $clientes = Client::findOrFail($id);
        // dd($clientes);
        $assessments = Assessment::all();
        return view('site.clients.show', compact('clientes', 'assessments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Client::findOfFail($id);
        return view('site.clients.edit', compact('clientes'));
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
        $clientes = Client::findOfFail($id);
        request()->validate([
            'nome_empresa'      => ['required',  'max:100'],
            'cnpj'              => ['required', 'unique:clientes', 'max:14'],
            'nome_responsavel'  => ['required', 'max:100'],
            'email'             => ['required', 'unique:clientes', 'max:100'],
            'celular'           => ['required', 'max:11'],
        ]);
        $clientes->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $cliente = Client::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente deletado com sucesso');    
    }
}
