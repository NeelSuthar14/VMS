<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class Visitorcontroller extends Controller
{
     public function dashboard()
    {
        $visitors = Visitor::latest()->get();
        return view('dashboard', compact('visitors'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'mobile'=> 'required|digits:10',
            'purpose' => 'required|string',
            'person_to_meet' => 'required|string',
            'id_proof_type' => 'required|string',
            'id_proof_number' => 'required|string',
            'address' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
            'gender' => 'required|in:Male,Female,Other',
            'department' => 'required|string|max:100',
            'block' => 'required|string|max:50',
            'floor' => 'required|string|max:50',
            'designation'=>'required|string',
            'photo' => 'nullable|string',
        ]);

        $photopath = null;

        if($request->photo){
            $image = str_replace('data:image/png;base64,', '', $request->photo);
            $image = str_replace(' ', '+', $image);
            $imageName = 'visitor_' . time() . '.png';
            Storage::disk('public')->put('visitors/' . $imageName, base64_decode($image));
            $photopath = 'visitors/' . $imageName;
        }

        // Store the returned model in a variable
        $visitor = Visitor::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'purpose' => $request->purpose,
            'person_to_meet' => $request->person_to_meet,
            'id_proof_type' => $request->id_proof_type,
            'id_proof_number' => $request->id_proof_number,
            'address' => $request->address,
            'age' => $request->age,
            'gender' => $request->gender,
            'department' => $request->department,
            'block' => $request->block,
            'floor' => $request->floor,
            'designation' => $request->designation,
            'photo' => $photopath,
        ]);

        // Redirect to QR code page with the correct visitor id
        return redirect()->route('visitor.qr', ['id' => $visitor->id]);
    }

    public function showQr($id)
    {
        $visitor = Visitor::findOrFail($id);
        return view('visitor-qr', compact('visitor'));
    }
    public function scan($id)
    {
        $visitor = Visitor::findOrFail($id);
        return view('visitor.scan', compact('visitor'));
    }
}
