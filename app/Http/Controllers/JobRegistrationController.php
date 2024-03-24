<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\JobRegistration;

class JobRegistrationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|string|max:20',
            'nationality' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'cv_file' => 'required|file|mimes:pdf',
        ]);

        $CVName = $request->name . '-' . rand(100, 999) . '.' . $request->cv_file->extension();
        $request->cv_file->move(public_path('Job_cv'), $CVName);

        $JobRegi = JobRegistration::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'nationality' => $request->input('nationality'),
            'specialization' => $request->input('specialization'),
            'gender' => $request->input('gender'),
            'cv_file' => $CVName,
        ]);

        return redirect()->route('Stores')->with('successJob', 'Your registration was submitted successfully!');

    }


    //Admin

    public function listJob()
    {
        $notification = Notification::where('section','job_registration')->first();
        $notification->number = JobRegistration::count();
        $notification->save();

        $data = JobRegistration::paginate(10);
        return view('backend.job.list-job', compact('data'));
    }

    public function jobCvDownload($id)
    {
        $fetch = JobRegistration::where('id', '=', $id)->first();
        $filePath = public_path('Job_cv/'.$fetch->cv_file); // Replace with the actual path to your PDF file

        return response()->download($filePath, $fetch->name.'.pdf');
    }

}
