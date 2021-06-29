<?php

namespace App\Http\Controllers\Site;

use App\AnswerImages;
use App\Assessment;
use App\QuestAnswers;
use App\Client;
use App\Form;
use App\QuestForm;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class QuestAnswersController extends Controller
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
        // $status = QuestAnswers::where("status", $assessment->status);
        $client = Client::where("id", $assessment->client_id)->first();
        $questions = QuestForm::where("form_id", $assessment->form_id)->get();

   

        $data = [
            "questions" => $questions, 
            "client" => $client,
            'form_id' => $form->id,
            'assessment_id' => $assessment->id
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
            'status' => ['required', 'boolean'],
            'answers.*.nota' => ['required',  'max:10'],
            'answers.*.answer' => ['required', 'max:250'],
            'image' => ['max:150'],
        ]);
        
        $createassessment = $request->all();

        foreach($createassessment['answers'] as $answer) {
            $questanswer = QuestAnswers::create([
                'nota' => $answer['nota'],
                'quest_id' => $answer['quest_id'],
                'assessment_id' => $createassessment['assessment_id'],
                'answer' => $answer['answer'],
            ]);

            if (isset($answer['images'])) {
                if (count($answer['images']) > 0) {
                    foreach ($answer['images'] as $image) {
                        Storage::putFileAs('public/img-avaliacoes', $image, $image->getClientOriginalName());
    
                        AnswerImages::create([
                            'answer_id' => $questanswer->id,
                            'image' => $image->getClientOriginalName()
                        ]);
                    }
                }
            }
        }

        Form::find($request->form_id)->update(['status' => $request->status]);

        return redirect()->route('avaliacoes.index')->with('success', 'Atendimento cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assessment = Assessment::find($id);
        $assessment->load('form.questForm', 'client');

        foreach ($assessment->form->questForm as $question) {
            $answer = QuestAnswers::where('quest_id', $question->id)->where('assessment_id', $id)->first();
            $question->setRelation('answer', $answer);
            $question->answer->load('images');
        }

        return view('site.atendimento.show', compact('assessment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $createassessment = QuestAnswers::find($id);
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
        $createassessment = QuestAnswers::find($id);
        request()->validate([
            'status' => ['required', 'boolean'],
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
    public function destroy(Request $request, QuestAnswers $questAnswer)
    {
        $questAnswer->delete();
        return redirect()->route('avaliacoes.index')->with('success', 'Cliente deletado com sucesso');    
    }
}
