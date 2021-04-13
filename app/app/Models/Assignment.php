<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;

class Assignment extends Model
{
    use HasFactory;
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
     protected $table = 'assignment';

     /**
     * 
     * agents Table relation
     * @var array
     */

     public function user(): HasOne
     {
         return $this->HasOne(User::class,'id');
     }

     /**
     * 
     * agents Table relation
     * @var array
     */

     public function project(): HasOne
     {
         return $this->HasOne(Project::class,'id');
     }
}
