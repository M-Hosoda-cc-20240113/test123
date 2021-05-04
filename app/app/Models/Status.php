<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Status extends Pivot
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'statuses';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'project_id',
        'status',
    ];

    /**
     * @return BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function projects(): BelongsTo
    {
        return $this->BelongsTo(Project::class, 'project_id', 'id');
    }
}
