

 
    <?php 
    $imagePaths = json_decode($spot->image_path, true); 
    $firstImagePath = '';
    if ($imagePaths && count($imagePaths) > 0) {
        $firstImagePath = asset('images/' . $imagePaths[0]);
    }
    ?>

    <div class="spot-item">
        <div class="spot-content">
            <!-- ฝั่งซ้าย: ข้อมูลข้อความ -->
            <div class="spot-text">
                <h2>{{ $spot->name }}</h2>
                <p><strong>Province:</strong> {{ $spot->province }}</p>
                <p><strong>Description:</strong> {{ $spot->description }}</p>
            </div>
            <!-- ฝั่งขวา: รูปภาพ -->
            <div class="spot-image">
                @if($firstImagePath)
                    <img src="{{ $firstImagePath }}" alt="{{ $spot->name }}">
                @endif
            </div>
        </div>
    </div>

