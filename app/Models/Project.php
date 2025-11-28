<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Project extends Model {
    protected $fillable = ['name','slug','description'];
    public function runs(){ return $this->hasMany(Run::class); }
}
