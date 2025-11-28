<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RunController extends Controller {
    public function store(Request $request, Project $project){
        $payload = $request->validate([
            'external_id'=>'nullable|string','status'=>'required','started_at'=>'nullable|date','finished_at'=>'nullable|date',
            'total'=>'required|integer','passed'=>'required|integer','failed'=>'required|integer','scenarios'=>'required|array'
        ]);
        DB::beginTransaction();
        try {
            $run = $project->runs()->create([
                'external_id'=>$payload['external_id'] ?? null,'status'=>$payload['status'],
                'started_at'=>$payload['started_at'] ?? null,'finished_at'=>$payload['finished_at'] ?? null,
                'total'=>$payload['total'],'passed'=>$payload['passed'],'failed'=>$payload['failed'],'skipped'=>$payload['skipped'] ?? 0
            ]);
            foreach($payload['scenarios'] as $s){
                $run->scenarios()->create([ 'project_id'=>$project->id, 'feature_name'=>$s['feature_name'] ?? 'unknown', 'scenario_name'=>$s['scenario_name'] ?? 'unknown', 'status'=>$s['status'] ?? 'skipped', 'duration_ms'=>$s['duration_ms'] ?? null, 'error_text'=>$s['error_text'] ?? null ]);
            }
            DB::commit();
            return response()->json(['id'=>$run->id],201);
        } catch(\Exception $e){
            DB::rollBack();
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
}
