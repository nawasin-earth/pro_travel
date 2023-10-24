<!DOCTYPE html>
<html lang="en">
   <head>
     
   @include('home.homecss')

     <style>
  

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


    @foreach($spots as $spot)
   <div class="spot-item">
       <h2>{{ $spot->name }}</h2>
       <p><strong>Province:</strong> {{ $spot->province }}</p>
       <p><strong>Description:</strong> {{ $spot->description }}</p>
       <img src="{{ asset($spot->image_path) }}" alt="{{ $spot->name }}">
   </div>
@endforeach






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
