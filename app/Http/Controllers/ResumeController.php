<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    
    public function uploadResume(Request $request){
        $request->validate([
            'resume' => 'required|file|mimes:pdf|max:2048',
          ]);
        
          $user = auth()->user();
          $resumePath = $request->file('resume')->store('resumes', 'public');
        
          $user->update([
            'resume' => $resumePath,
          ]);
        
          return response()->json([
            'message' => 'Resume uploaded successfully.',
            
          ]);
    }

    public function downloadResume($id){
        // Find the user by ID
    $user = User::findOrFail($id);

    // Get the path to the user's resume
    $pathToFile = Storage::disk('public')->path($user->resume);

    // Return the resume as a file download
    return response()->download($pathToFile);

    }
}
