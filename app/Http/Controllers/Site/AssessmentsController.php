<?php

namespace App\Http\Controllers\Site;

use App\Assessment;
use App\Client;
use App\Form;
use App\QuestForm;
use App\QuestsAssessment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AssessmentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessments = Assessment::all();
        // $clientes = Client::all();

        return view("site.assessments.index" , compact("assessments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $id = 1;
        $clientes = Client::get();     
        $forms = Form::get();
        $forms->load('questForm');             
        return view("site.assessments.create", compact('clientes', 'forms'));

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
            'form_id' => ['required', 'integer'],
            'client_id' => ['required', 'integer'],
            'question' => ['required', 'max:150'],
            'answer' => ['required', 'max:150'],
            'description' => ['required', 'max:150'],
            'status' => ['required', 'booelean'],
        ]);

        $avaliacoes = $request->all();
        Assessment::create($avaliacoes);
        return redirect()->route('site.avaliacoes')->with('success', 'Avaliação cadastrada com sucesso');

        // $request->session()->flash('mensagem', "Cliente {$clientes->id} criado com sucesso {$clientes->nome}");

        return redirect("/avaliacoes");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
