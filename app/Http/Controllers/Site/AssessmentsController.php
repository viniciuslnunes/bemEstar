<?php

namespace App\Http\Controllers\Site;

use App\AnswerImages;
use App\Assessment;
use App\Client;
use App\Form;
use App\QuestAnswers;
use App\QuestForm;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

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
        $avaliacoes = Assessment::all();
        $avaliacoes->load('form', 'client');

        return view("site.assessments.index" , compact("avaliacoes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // dd($request);
        request()->validate([
            'client_id' => ['required', 'integer'],
            'form_id' => ['required', 'integer'],
            'data_inicio'  => ['required'],
        ]);

        $avaliacoes = $request->all();

        $assessment = Assessment::create($avaliacoes);

        return redirect()->route('atendimento.create', array($assessment->id))
        ->with('success', 'Avaliação cadastrada com sucesso');

        // $request->session()->flash('mensagem', "Cliente {$clientes->id} criado com sucesso {$clientes->nome}");
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
        $assessment = Assessment::find($id);
        $assessment->load('form.questForm', 'client');

        foreach ($assessment->form->questForm as $question) {
            $answer = QuestAnswers::where('quest_id', $question->id)->where('assessment_id', $id)->first();
            $question->setRelation('answer', $answer);
            $question->answer->load('images');
        }

        $clientes = Client::all();

        return view('site.assessments.edit', compact('assessment', 'clientes'));
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

        $assessmentBdd = Assessment::find($id);
        $assessmentForm = json_decode($request->assessment);

        $assessmentBdd->update((array) $assessmentForm);

        $formBdd = Form::find($assessmentBdd->form->id);
        $formBdd->update((array) $assessmentForm->form);

        foreach ($assessmentForm->form->quest_form as $question) {
            $questionBdd = QuestForm::find($question->id);
            $answerBdd = QuestAnswers::find($question->answer->id);

            $questionBdd->update((array) $question);
            $answerBdd->update((array) $question->answer);

            $imagesBddIds = AnswerImages::where('answer_id', $question->answer->id)->pluck('id');
            $imagesIdsForm = collect($question->answer->images)->pluck('id');
            $diff = $imagesBddIds->diff($imagesIdsForm);

            if ($diff->isNotEmpty()) {
                foreach ($diff as $id) {
                    AnswerImages::find($id)->delete();
                }
            }

            foreach ($request->all() as $key => $value) {
                if ($key < 2) {
                    continue;
                }

                $answerId = explode(',', $key)[0];

                if ($answerId == $question->answer->id) {
                    Storage::putFileAs('public/img-avaliacoes', $value, $value->getClientOriginalName());

                    AnswerImages::create([
                        'answer_id' => $answerId,
                        'image' => $value->getClientOriginalName()
                    ]);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assessment = Assessment::find($id);
        $assessment->delete();
        return redirect()->route('avaliacoes.index')->with('success', 'Atendimento deletado com sucesso');    
    }

    public function question($id)
    {
        return view('site.assessments.createassessment');
    }

    public function exportacao($extensao)
    {
        $nome_arquivo = 'Lista de atendimentos';
        if($extensao == 'pdf'){
            $nome_arquivo .= '.'.$extensao;
        }
        else{
            return redirect()->route('avaliacoes.index');
        }
        return Excel::download(new AssessmentsExport, $nome_arquivo);
    }
}
