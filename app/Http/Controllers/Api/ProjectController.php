<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller {
    public function index(){ return response()->json(Project::all()); }
    public function store(Request $r){ $data = $r->validate(['name'=>'required','slug'=>'required']); return Project::create($data); }
    public function show(Project $project){ return $project; }
    public function update(Request $r, Project $project){ $project->update($r->only('name','description')); return $project; }
    public function destroy(Project $project){ $project->delete(); return response()->noContent(); }
}
