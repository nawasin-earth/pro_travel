<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    
        @include('admin.header')
        

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      


<!-- ฟอร์มแหล่งท่องเที่ยว -->
<div id="touristSpotForm" class="tourist-spot-form-container">
    <form action="{{ route('adminhome.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="province">Province:</label>
        <input type="text" name="province" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <label for="image_path">Image:</label>
        <input type="file" name="image_path[]" multiple>


        <button type="submit">Add Tourist Spot</button>
    </form>
</div>


@isset($touristSpot)
    @foreach(json_decode($touristSpot->image_path) as $imagePath)
        <img src="{{ asset('images/'.$imagePath) }}" alt="{{ $touristSpot->name }}">
    @endforeach
@endisset



@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



      
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
               <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="admincss/vendor/jquery/jquery.min.js"></script>
    <script src="admincss/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admincss/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admincss/vendor/chart.js/Chart.min.js"></script>
    <script src="admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admincss/js/charts-home.js"></script>
    <script src="admincss/js/front.js"></script>
  </body>
</html>