<!DOCTYPE html>
<html lang="th">

<head>
    @include('admin.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>


        .icon-btn {
    display: flex; /* เพิ่ม flexbox */
    align-items: center; /* จัดไอคอนและข้อความให้อยู่กึ่งกลางแนวตั้ง */
    justify-content: center; /* จัดไอคอนและข้อความให้อยู่กึ่งกลางแนวนอน */
    background-color: #007bff;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    margin: 20px;
    cursor: pointer;
    border-radius: 4px;
    transition: all 0.3s ease-in-out, transform 0.3s ease-in-out; /* เพิ่ม transition สำหรับ transform */
}

.icon-btn i {
    margin-right: 10px; /* ระยะห่างระหว่างไอคอนกับข้อความ */
    transition: color 0.3s ease-in-out; /* transition สำหรับสีของไอคอน */
}

.icon-btn:hover {
    background-color: #0056b3;
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1); /* เพิ่ม shadow effect */
    transform: translateY(-3px); /* ทำให้ปุ่มยกขึ้นเล็กน้อยเมื่อวางเมาส์ */
}

.icon-btn:hover i {
    color: #f0f0f0; /* เปลี่ยนสีของไอคอนเมื่อวางเมาส์ */
}

.icon-btn:active {
    transform: translateY(0); /* ทำให้ปุ่มกลับมาที่ตำแหน่งเดิมเมื่อคลิก */
}


        /* รูปแบบคลาสใหม่ */
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

        /*... รูปแบบเดิม ...*/

input[type="text"],
textarea,
input[type="file"] {
    width: 100%;
    padding: 10px 15px; /* เพิ่ม padding ซ้าย-ขวา เพื่อให้แสดงผลดีขึ้น */
    margin-bottom: 15px; /* ปรับระยะห่างเป็น 15px ให้ตรงกับปุ่ม */
    box-sizing: border-box;
    border: 1px solid #ccc; /* ลดขนาดขอบให้บางลง */
    border-radius: 5px; /* ทำให้มุมกลมขึ้น */
    font-size: 16px; /* ปรับขนาดตัวอักษร */
    transition: border-color 0.3s ease; /* เพิ่ม transition สำหรับสีขอบ */
}

input[type="text"]:focus,
textarea:focus {
    border-color: #007bff; /* เปลี่ยนสีขอบเมื่อกล่องรับข้อมูลมีการ focus */
    outline: none; /* ลบ outline ที่บางเบราว์เซอร์จะแสดงขึ้น */
}

button[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px; /* ทำให้มุมของปุ่มกลมขึ้น */
    cursor: pointer;
    font-size: 16px; /* ปรับขนาดตัวอักษร */
    transition: background-color 0.3s ease; /* เพิ่ม transition สำหรับสีพื้นหลัง */
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

/* รูปแบบเพิ่มเติมสำหรับ modal */
.modal {
    display: none; /* Default ซ่อน modal */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close-btn {
    position: absolute;
    top: 5px;
    right: 15px;
    font-size: 24px;
    cursor: pointer;
}

.close-btn:hover,
.close-btn:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}



    </style>

</head>

<body>
    @include('admin.header') 

    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        
        <div>
        <!-- Toggle Button for Form -->
        <button id="toggleFormButton" class="icon-btn">
            <i class="fas fa-plus"></i>เพิ่มข่าว
        </button>
        </div>


        <!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close-btn" id="closeModalBtn">&times;</span>



        <!-- News Form -->
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

  </div>
</div>
</div>







    
    <!-- JavaScript Files -->
    <script src="admincss/vendor/jquery/jquery.min.js"></script>
    <script src="admincss/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admincss/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admincss/vendor/chart.js/Chart.min.js"></script>
    <script src="admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admincss/js/charts-home.js"></script>
    <script src="admincss/js/front.js"></script>

    <script>
// Toggle form
document.getElementById('toggleFormButton').addEventListener('click', function() {
    var modal = document.getElementById('myModal');
    modal.style.display = "block";
});

// Close modal
document.getElementById('closeModalBtn').addEventListener('click', function() {
    var modal = document.getElementById('myModal');
    modal.style.display = "none";
});

// Click outside modal to close
window.onclick = function(event) {
    var modal = document.getElementById('myModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
};


    </script>

</body>
</html>
