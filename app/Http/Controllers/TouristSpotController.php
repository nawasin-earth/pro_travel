<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TouristSpot;


class TouristSpotController extends Controller
{
    public function create()
{
    return view('touristspot.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'province' => 'required|string|max:255',
        'description' => 'required',
        'image_path.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imagePaths = [];
    if($request->hasFile('image_path')) {
        foreach ($request->file('image_path') as $image) {
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $imagePaths[] = $imageName; // เพิ่มเข้าสู่อาร์เรย์
        }
    }

    $data['image_path'] = json_encode($imagePaths); // ใช้ JSON เพื่อเก็บอาร์เรย์ของชื่อภาพ

    TouristSpot::create($data);

    return back()->with('success', 'Added successfully!');
}


public function index() {
    $spots = TouristSpot::all();
    return view('touristspot.index', ['spots' => $spots]);
}


public function showByProvince($province) {
    $spots = TouristSpot::where('province', $province)->get();
    $output = '';

    foreach($spots as $spot) {
        $imagePaths = json_decode($spot->image_path, true); 
        $firstImagePath = '';
        if ($imagePaths && count($imagePaths) > 0) {
            $firstImagePath = asset('images/' . $imagePaths[0]);
        }

        $output .= '<div class="spot-item">
                        <div class="spot-content">
                            <div class="spot-text">
                                <h2>' . $spot->name . '</h2>
                                <p><strong>Province:</strong> ' . $spot->province . '</p>
                                <p><strong>Description:</strong> ' . $spot->description . '</p>
                            </div>';

        if ($firstImagePath) {
            $output .=     '<div class="spot-image">
                                <img src="' . $firstImagePath . '" alt="' . $spot->name . '">
                            </div>';
        }
        
        $output .=     '</div>
                    </div>';
    }
    

    return response($output);
}





}
