<?php

namespace App\Http\Controllers\Project;

use App\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;

//use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectController extends Controller
{
    protected $project;

    public function __construct(Project $projects)
    {
        $this->project = $projects;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $project = $this->project->all();

        return view('crud.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get();
        return view('crud.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->all();
        if (Project::create($data)) {
            return redirect()->route('projects.index');
        } else {
            return redirect()->route('projects.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('crud.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $clients = Client::get();
        return view('crud.edit', compact('project', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Projects $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->all();

        if ($project->update($data)) {
            $request->session()->flash('success', 'Projeto atualizado com sucesso!');
        } else {
            $request->session()->flash('error', 'Não foi possivel atualizar o projeto!');
        }
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Projects $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Project $project)
    {
        if ($project->delete()) {
            $request->session()->flash('success', 'Projeto deletado com sucesso!');
        } else {
            $request->session()->flash('error', 'Não foi possivel deletar o projeto!');
        }
        return redirect()->route('project.index');
    }
}
