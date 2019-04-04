<?php

namespace App\Http\Controllers\TensorflowModel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{
    public function test()
    {
        $command = escapeshellcmd("/Users/kasparsg/.virtualenvs/env3.6/bin/python ". app_path("/Http/Controllers/TensorflowModel/Python/predictData.py"));
        $report = exec($command, $output, $status);
        print_r($report);
    }

    public function initialTrain()
    {
        $command = escapeshellcmd("/Users/kasparsg/.virtualenvs/env3.6/bin/python ". app_path("/Http/Controllers/TensorflowModel/Python/initialTrain.py"));
        $report = exec($command, $output, $status);
        print_r($report);
    }
}
