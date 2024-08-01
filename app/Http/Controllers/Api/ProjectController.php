<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // Otteniamo tutti i progetti dal database
        // $projects = Project::with('type', 'technologies')->get();

        // Restituiamo i progetti in formato JSON
        // return response()->json([
        //    'status' => true,
        //    'results' => $projects
        //]);

        $query = Project::query();

        if ($request->has('featured')) {
            $query->where('featured', true);
        }

        if ($request->has('draft')) {
            $query->where('draft', true);
        }

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $projects = Project::paginate(10); // 10 progetti per pagina
        return response()->json($projects);
    }
}
