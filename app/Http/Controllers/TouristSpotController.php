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
        'image_360.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imagePaths = [];
    $image360Paths = [];

    if($request->hasFile('image_path')) {
        foreach ($request->file('image_path') as $image) {
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $imagePaths[] = $imageName;
        }
    }

if($request->hasFile('image_360')) {
    foreach ($request->file('image_360') as $image360File) {  // Renamed loop variable to avoid conflict
        $image360Name = time() . '.' . $image360File->extension();
        $image360File->move(public_path('images360'), $image360Name);
        $image360Paths[] = $image360Name;
    }
}

    $data['image_path'] = json_encode($imagePaths);
    $data['image_360'] = json_encode($image360Paths); 

    $touristSpot = TouristSpot::create($data);

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
        $image360 = json_decode($spot->image_360, true); 
$firstImage360 = '';
if ($image360 && count($image360) > 0) {
    $firstImage360 = asset('images360/' . $image360[0]);
}

        $output .= '<a href="' . route('touristspot.detail', $spot->id) . '" class="spot-item-link">';
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
        if ($firstImage360) {
            $output .=     '<div class="spot-image-360">
                                <img src="' . $firstImage360 . '" alt="' . $spot->name . ' 360 Image">
                            </div>';
        }
        
        $output .=     '</div>
                    </div>';
    }
    
    return response($output);
}


public function show(TouristSpot $spot) {
    if (!$spot) {
        return redirect()->route('touristspot')->with('error', 'Tourist Spot not found.');
    }

    return view('touristspot.detail', compact('spot'));
}




}
