<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class DocumentUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['document_id', 'user_id', 'lesson_id'];

    public function scopeCheckLearned($query, $request)
    {
        return $query->where([
            ['user_id', '=', Auth::id()],
            ['document_id', '=', $request->documentId],
            ['lesson_id', '=', $request->lessonId]
        ]);
    }

    public function scopeIsLearned($query, $lessonId)
    {
        return $query->where([
            ['user_id', '=', Auth::id()],
            ['lesson_id', '=', $lessonId]
        ]);
    }
}
