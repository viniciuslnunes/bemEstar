<?php

namespace App\Http\Controllers\Site;

use App\Assessment;
use App\AssessmentCreate;
use App\Client;
use App\QuestForm;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AssessmentsCreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('site.atendimento.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $assessment = Assessment::where("id", $id)->first();
        $form = QuestForm::where("id", $assessment->form_id)->first();
        $client = Client::where("id", $assessment->client_id)->first();
        $questions = QuestForm::where("form_id", $assessment->form_id)->get();

        $data = [
            "questions" => $questions, 
            "client" => $client
        ];

        return view('site.atendimento.create', $data);
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
            'nota' => ['required',  'max:10'],
            'answer' => ['required', 'max:250'],
            'image' => ['max:150'],
        ]);
        $createassessment = $request->all();
        AssessmentCreate::create($createassessment);
        return redirect()->route('avaliacoes.index')->with('success', 'Cliente cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $createassessment = AssessmentCreate::find($id);
        return view('site.atendimento.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $createassessment = AssessmentCreate::find($id);
        return view('site.atendimento.edit', compact('createassessment'));
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
        $createassessment = AssessmentCreate::find($id);
        request()->validate([
            'nota' => ['required',  'max:10'],
            'answer' => ['required', 'max:250'],
            'image' => ['max:150'],
        ]);
        $createassessment->update($request->all());
        return redirect()->route('avaliacoes.index')->with('success', 'Cliente atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AssessmentCreate $assessmentCreate)
    {
        $assessmentCreate->delete();
        return redirect()->route('avaliacoes.index')->with('success', 'Cliente deletado com sucesso');    
    }
}
