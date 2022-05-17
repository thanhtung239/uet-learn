<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\User;

class Notification extends Model
{
    use HasFactory;
    use SoftDeletes;

    const CHECKED = 1;
    const UNCHECKED = 0;

    const TYPE_COURSE_CREATE = 1;
    const TYPE_USER_CREATE = 0;

    protected $fillable = [
        'target_id', 'type', 'content', 'checked'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'target_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'target_id');
    }
}
