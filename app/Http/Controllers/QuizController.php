<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Models\Quiz;
use App\Services\DivisiService;
use App\Services\QuizService;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public DivisiService $divisiService;
    public QuizService $quizService;

    public function __construct(DivisiService $divisiService, QuizService $quizService) {
        $this->divisiService = $divisiService;
        $this->quizService = $quizService;
    }

    public function quizDetail($id){
        return view('pages.employee.quiz.quiz-detail-page');
    }

    public function quizStartConfirmation($id){
        return view('pages.employee.quiz.quiz-start-confirmation-page');
    }

    public function adminDashboard() {
        return view('pages.dashboard.admin.quiz');
    }

    public function quizAttemptPage() {
        return view('pages.employee.quiz.quiz-attempt-page');
    }

    public function createQuizSheet()
    {
        $divisisData = $this->divisiService->getDivisis();

        return view('pages.dashboard.admin.quiz.create-quiz-sheet', compact('divisisData'));
    }

    public function createQuizSheetDetail() {
        return view('pages.dashboard.admin.quiz.create-quiz-quetions-answers' );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizRequest $request)
    {
        $quiz = $this->quizService->postQuiz($request->toDTO());

        return redirect()->route('dashboard.admin.quiz.detail',['id'=> $quiz -> id]) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
