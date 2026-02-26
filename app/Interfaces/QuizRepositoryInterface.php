<?php

namespace App\Interfaces;

use App\DTO\QuizRequestDTO;

interface QuizRepositoryInterface
{
    public function findQuizById($id);
    public function findQuizzes();
    public function findAllQuizzes();
    public function findTop10nQuizzes();
    public function findAllQuizPagination(string $search = '', int $perPage = 10);
    public function findActiveQuizzes();
    public function createQuiz(QuizRequestDTO $data);
    public function updateQuiz($id, QuizRequestDTO $data);
    public function removeQuiz($id);
    public function findActivateQuiz($id);
    public function findNonActivateQuiz($id);
}
