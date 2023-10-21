<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
{
    // คำสั่งที่คุณต้องการ
    return view('news.index'); // เป็นต้น, ถ้าคุณมี view ชื่อ "index" ภายใต้ folder "news"
}

}
