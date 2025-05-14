<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function home()
    {
        return view("landing.homepage");
    }

    public function apply(Request $req)
    {
        if ($req->isMethod("POST")) {
            $data = $req->validate([
                "name" => 'required',
                "contact" => 'required|unique:users,contact|max:10|min:10',
                "email" => 'required|email|unique:users,email',
                "education" => 'string|nullable',
                "password" => 'required|string',
            ]);

            User::create($data);

             return redirect()->route('public.login')->with('msg', 'Applied successfully. We will review your application ASAP.');
        }
        return view("landing.apply");
    }

    public function login(Request $req)
    {
        if ($req->isMethod("POST")) {
            $data = $req->validate([
                "email" => "required|email",
                "password" => "required"
            ]);

            if (Auth::attempt($data)) {
                if (Auth::user()->isAdmin) {
                    return redirect()->route("admin.dashboard");
                } else {
                    return redirect()->route("student.dashboard");
                }
            } else {
                return redirect()->back()->with("msg", "Invalid credentials.");
            }
        }

        return view("landing.login");
    }

    public function Studentlogout()
    {
        Auth::logout();
        return redirect()->route("public.home");
    }
}