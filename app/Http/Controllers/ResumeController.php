<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function uploadResume(Request $request)
{
    $resumePath = $request->file('resume')->store('resumes');

    // Save the resume path to the authenticated user's profile
    $request->user()->update([
        'resume' => $resumePath
    ]);

    return response()->json([
        'message' => 'Resume uploaded successfully.'
    ]);
}
}
