<!DOCTYPE html>
<html lang="en">
   <head>
     
   @include('home.homecss')

     <style>
    .mini-navbar {
        display: flex;
        justify-content: center; /* จัดวางให้รายการอยู่ตรงกลางของ navbar */

        padding: 10px 20px;
        list-style-type: none;
        margin: 0;
        font-family: Arial, sans-serif;
       
    }

    .mini-navbar li {
        margin: 0 10px;
    }

    .mini-navbar a {
        text-decoration: none;
        color: #333;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

  

    .spot-item {
        border: 1px solid #e5e5e5;
        padding: 16px;
        margin: 16px 0;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s;
    }

    .spot-item:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .spot-item img {
        max-width: 100%; /* รูปภาพจะไม่เกินขนาดของตัวครอบ */
        height: auto;
        border-radius: 5px;
        margin-top: 16px;
    }

</style>

<div class="header_section">
   @include('home.header')
   </div> 

   </head>
   <body>
     
   
   <!-- เพิ่มส่วนอื่นๆ ของเว็บไซต์ที่นี่ -->
 <div>
   
 <ul class="mini-navbar">
    <li><a href="#" onclick="loadSpots('nongkhai')">Nongkhai</a></li>
    <li><a href="#" onclick="loadSpots('UdonThani')">UdonThani</a></li>
    <li><a href="#" onclick="loadSpots('BuengKan')">BuengKan</a></li>
</ul>



<div id="spotContainer">
    <!-- ข้อมูลแหล่งท่องเที่ยวจะถูกแสดงที่นี่ -->
    @foreach($spots as $spot)
    <?php 
    $imagePaths = json_decode($spot->image_path, true); 

    $firstImagePath = '';
    if ($imagePaths && count($imagePaths) > 0) {
        $firstImagePath = asset('images/' . $imagePaths[0]);
    }
    
    ?>

    <div class="spot-item">
       <h2>{{ $spot->name }}</h2>
       <p><strong>Province:</strong> {{ $spot->province }}</p>
       <p><strong>Description:</strong> {{ $spot->description }}</p>
       @if($firstImagePath)
           <img src="{{ $firstImagePath }}" alt="{{ $spot->name }}">
       @endif
   </div>
@endforeach

</div>

    


</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function loadSpots(province) {
        $.ajax({
            url: '/touristspot/' + province,
            method: 'GET',
            success: function(data) {
                $('#spotContainer').html(data);
            }
        });
    }
</script>


      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>    
   </body>
</html>
