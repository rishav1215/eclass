<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
         $totalAdmissions =User::count();
    $totalStudents = user::count();
    $totalCategories = Category::count();
        return view("admin.dashboard", compact('totalAdmissions', 'totalStudents', 'totalCategories'));
    }
    public function manageAdmission()
    {
        $admissions = User::where('status', false)->get();
        return view("admin.manageAdmission", compact("admissions"));
    }

    public function approveAdmission($id)
    {
        $user = User::findOrFail($id);
        $user->status = true;
        $user->save();

        return redirect()->route('admin.manageStudents')->with('success', 'Admission approved successfully!');
    }
    public function manageStudents()
    {
        $students = User::where('status', true)->get();
        return view('admin.manageStudents', compact('students'));
    }

    public function inapproveAdmission($id)
    {
        $user = User::findOrFail($id);
        $user->status = false;
        $user->save();

        return redirect()->route('admin.manageStudents')->with('success', 'Student status set to pending again.');
    }


}
