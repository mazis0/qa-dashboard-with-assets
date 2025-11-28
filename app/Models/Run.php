<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Run extends Model {
    protected $fillable = ['project_id','external_id','status','started_at','finished_at','total','passed','failed','skipped'];
    public function scenarios(){ return $this->hasMany(Scenario::class); }
}
