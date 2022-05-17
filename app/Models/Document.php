<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'lesson_id',
        'name',
        'type',
        'logo_path',
        'file_path',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'document_users', 'document_id', 'user_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function createDocument($request, $lessonId)
    {
        $fileType = $request['document_file']->getClientOriginalExtension();
        if ($fileType == "pdf") {
            $logoPath = 'img/pdf-icon.png';
        } elseif ($fileType == 'mp4') {
            $logoPath = 'img/video-icon.png';
        } else {
            $logoPath = 'img/doc-icon.png';
        }

//        if (!empty($request['document_image'])) {
//            $path = $request->file('document_image')->store('images', 's3');
//            $logoPath = Storage::disk('s3')->url($path);
//        } else {
//            $logoPath = null;
//        }

        if (!empty($request['document_file'])) {
            $path = $request->file('document_file')->store('documents', 's3');
            $filePath = Storage::disk('s3')->url($path);
        } else {
            $filePath = null;
        }

        Document::create([
            'lesson_id' => $lessonId,
            'name' => $request['document_name'],
            'type' => $fileType,
            'logo_path' => $logoPath,
            'file_path' => $filePath
        ]);
    }
}
