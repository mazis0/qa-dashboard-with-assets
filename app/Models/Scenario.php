<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Scenario extends Model {
    protected $fillable = ['run_id','project_id','feature_name','scenario_name','status','duration_ms','error_text'];
    public function run(){ return $this->belongsTo(Run::class); }
}
