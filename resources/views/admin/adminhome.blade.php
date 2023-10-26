<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Stylesheet -->
<style>

    .tourist-spot-form-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #f7f7f7;
    }

    .tourist-spot-form-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .tourist-spot-form-container input[type="text"], 
    .tourist-spot-form-container textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .tourist-spot-form-container input[type="file"] {
        margin-bottom: 20px;
    }

    .tourist-spot-form-container button {
        background-color: #007bff;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .tourist-spot-form-container button:hover {
        background-color: #0056b3;
    }

    .alert {
        max-width: 600px;
        margin: 20px auto;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    img {
        max-width: 100%;
        margin: 10px 0;
        border-radius: 5px;
    }

    /* Style for modal */
.modal {
    display: none;
    position: fixed;
    z-index: 999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    margin: 10% auto;
    padding: 20px;
    width: 80%;
    max-width: 600px;
    background-color: white;
    position: relative;
}

.close-btn {
    position: absolute;
    top: 5px;
    right: 15px;
    font-size: 24px;
    cursor: pointer;
}

.icon-btn {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease-in-out; /* เพิ่ม transition effect */
}

.icon-btn:hover {
    background-color: #0056b3;
    transform: scale(1.05); /* ขยายปุ่มเล็กน้อยเมื่อเคลื่อนไหว */
}

.icon-btn:active {
    background-color: #004092; /* เปลี่ยนสีเมื่อกดปุ่ม */
    transform: scale(0.95); /* ลดขนาดปุ่มเล็กน้อยเมื่อกด */
}

.button-right-container {
    text-align: right; /* จัดปุ่มไปยังด้านขวา */
    margin: 20px;      /* กำหนดขนาดขอบ เพื่อให้มีระยะห่างจากขอบหน้าจอ */
}



</style>


  </head>
  <body>
    
        @include('admin.header') 

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
    
        <div class="button-right-container">
    <!-- ปุ่มเปิดหน้าต่างลอย -->
    <button id="openModalBtn" class="icon-btn">
        <i class="fas fa-map-marker-alt"></i>
        เปิดฟอร์มท่องเที่ยว
    </button>
</div>


<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close-btn" id="closeModalBtn">&times;</span>

    
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

        <label for="image_360">Image 360:</label>
        <input type="file" name="image_360[]" multiple>



        <button type="submit">Add Tourist Spot</button>
    </form>
</div>



@isset($touristSpot)
    @foreach(json_decode($touristSpot->image_path) as $imagePath)
        <img src="{{ asset('images/'.$imagePath) }}" alt="{{ $touristSpot->name }}">
    @endforeach
@endisset


@isset($touristSpot->image_360)
    @foreach(json_decode($touristSpot->image_360) as $image360)
        <img src="{{ asset('storage/'.$image360) }}" alt="{{ $touristSpot->name }} - 360 Image">
    @endforeach
@endisset


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


</div>
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
    var modal = document.getElementById("myModal");
    var openModalBtn = document.getElementById("openModalBtn");
    var closeModalBtn = document.getElementById("closeModalBtn");

    openModalBtn.onclick = function() {
        modal.style.display = "block";
    }

    closeModalBtn.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

  
  </body>
</html>