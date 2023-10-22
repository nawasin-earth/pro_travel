<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')


    <style>

.toggle-button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 24px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 50%;
    width: 50px;
    height: 50px;
}

.news-form-container {
    display: none;
    background-color: #f3f3f3;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

input[type="text"],
textarea,
input[type="file"] {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

      
    </style>



  </head>
  <body>
    
        @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      


<!-- ปุ่ม Toggle สำหรับฟอร์ม -->
<button id="toggleFormButton" class="toggle-button">+</button>

<!-- ฟอร์มข่าว -->
<div id="newsForm" class="news-form-container">
    <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <label for="image">Image:</label>
        <input type="file" name="image">

        <button type="submit">Add News</button>
    </form>
</div>

@isset($newsItem)
    <img src="{{ asset('images/'.$newsItem->image) }}" alt="{{ $newsItem->title }}">
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


    <script>
document.getElementById('toggleFormButton').addEventListener('click', function() {
    var form = document.getElementById('newsForm');
    if (form.style.display === "none" || form.style.display === "") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
});
</script>

  </body>
</html>