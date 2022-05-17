<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocumentRequest;
use App\Models\DocumentUser;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function create(Lesson $lesson)
    {
        return view('lessons.documents.create', compact('lesson'));
    }

    public function store(CreateDocumentRequest $request, Lesson $lesson)
    {
        $course = $lesson->course;

        $newDocument = new Document();
        $newDocument->createDocument($request, $lesson->id);

        return redirect()->route('course.lessons.show', [$course, $lesson])->with('success', 'Document created successfully!');
    }

    public function learn(Request $request)
    {
        $checkLearned = empty(DocumentUser::query()->checkLearned($request, Auth::id())->first());

        if ($checkLearned) {
            DocumentUser::create([
                'user_id' => Auth::id(),
                'lesson_id' => $request->lessonId,
                'document_id' => $request->documentId
            ]);
        }

        $percentageProgress = Lesson::find($request->lessonId)->progress;

        return response()->json([
            'percentage' => $percentageProgress
        ]);
    }

    public function show($id)
    {
        $document = Document::findOrFail($id);
        $lesson = $document->lesson;
        $course = $lesson->course;

        return view('Documents.index', compact('document', 'lesson', 'course'));
    }
}
