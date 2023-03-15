<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;




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
    public function create(Project $project)
    {
        $project = new Project();
        $types = Type::all();
        $techs = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $project = new Project();

        $data['slug'] = Str::slug($data['title'], '-');

        if (Arr::exists($data, 'image')) {
            $image = Storage::put('projects', $data['image']);
            $data['image'] = $image;
        }
        $project->fill($data);

        $project->save();

        if (Arr::exists($data, 'technologies')) $project->technologies()->attach($data['technologies']);
        return to_route('admin.projects.show', $project->id);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        $project_technologies = $project->technologies->pluck('id')->toArray();

        return view('admin.projects.edit', compact('project', 'types', 'technologies', 'project_technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');

        if (Arr::exists($data, 'image')) {
            if ($project->image) Storage::delete($project->image);
            $image = Storage::put('projects', $data['image']);
            $data['image'] = $image;
        }

        $project->update($data);

        if (Arr::exists($data, 'techs')) $project->technologies()->sync($data['techs']);
        else $project->technologies()->detach();
        return to_route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index');
    }
}
