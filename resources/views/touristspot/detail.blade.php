

 
<?php 
$imagePaths = json_decode($spot->image_path, true); 
$firstImagePath = '';
if ($imagePaths && count($imagePaths) > 0) {
    $firstImagePath = asset('images/' . $imagePaths[0]);
}

$image360Paths = json_decode($spot->image_360_path, true); 
$firstImage360Path = '';
if ($image360Paths && count($image360Paths) > 0) {
    $firstImage360Path = asset('images360/' . $image360Paths[0]);
}
?>

<h2>{{ $spot->name }}</h2>
<p><strong>Province:</strong> {{ $spot->province }}</p>
<p><strong>Description:</strong> {{ $spot->description }}</p>

@include('touristspot.panorama')

@if($firstImagePath)
    <img src="{{ $firstImagePath }}" alt="{{ $spot->name }}">
@endif


