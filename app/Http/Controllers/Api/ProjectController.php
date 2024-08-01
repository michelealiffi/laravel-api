<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // Otteniamo tutti i progetti dal database
        $projects = Project::all();

        // Restituiamo i progetti in formato JSON
        return response()->json($projects);
    }
}
