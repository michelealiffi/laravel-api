<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $project = new Project();

        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->slug = Str::of($data['name'])->slug();
        $project->type_id = $data['type_id'];

        $project->save();


        //  dopo il save perchè prima non esiste ancora l'id del post (non è salvato)
        if ($request->has('technologies')) {

            $project->technologies()->attach($request->technologies);
        }


        return redirect()->route('admin.projects.show', $project->id)->with('message', 'Progetto ' . $project->title . 'creato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, Technology $technology)
    {
        return view('admin.projects.show', compact('project', 'technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        $types = Type::all();
        $technologies = Technology::all();

        $project->load('technologies');


        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $project->update($data);

        // dd($project->technologies);

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->detach();
        }


        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // cancello relazione per sicurezza
        $project->technologies()->detach();



        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', $project->id . 'Progeto cancellato correttamente');
    }
}
