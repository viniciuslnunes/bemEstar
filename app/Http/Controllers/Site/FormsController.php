<?php

namespace App\Http\Controllers\Site;

use App\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::all();

        return view(
            'site.form.index',
            compact("forms")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.form.create');
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
            'nome_formulario' => ['required', 'unique:forms', 'max:100'],
        ]);

        $forms = $request->all();
        $form = Form::create([
            'nome_formulario' => $request->get('nome_formulario'),
            'item' => 'none'
        ]);

        // $array_quest = array();
        // foreach ($request->get('quest') as $quest) {
        //     array_push($array_quest, $quest);
        // }
        
        foreach ($request->get('quest') as $quest) {
            $form->questForm()->create([
                'quest' => $quest
            ]);
        }

        return redirect()->route('site.clientes')->with('success', 'Formulário cadastrado com sucesso');

        // $request->session()->flash('mensagem', "Cliente {$clientes->id} criado com sucesso {$clientes->nome}");
    }

    /**
     * Display the specified resource.
     *
     * @param  $categry
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        return view('site.form.show', ['forms' => $form->load(['assessments', 'client'])]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
