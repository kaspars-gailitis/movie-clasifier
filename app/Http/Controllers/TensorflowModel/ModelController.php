<?php

namespace App\Http\Controllers\TensorflowModel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{
    const PYTHON_PATH = "/Users/kasparsg/.virtualenvs/env3.6/bin/python";
    public function evaluateReview()
    {
        $command = escapeshellcmd(ModelController::PYTHON_PATH." ". app_path("/Http/Controllers/TensorflowModel/Python/Main.py"));
        $report = exec($command, $output, $status);
        echo implode("\n", $output);
    }

    public function initialTrain()
    {
        $command = escapeshellcmd(ModelController::PYTHON_PATH." ". app_path("/Http/Controllers/TensorflowModel/Python/MachineLearning/initialTrain.py"));
        $report = exec($command, $output, $status);
        print_r($report);
    }
}
