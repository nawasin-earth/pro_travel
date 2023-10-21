<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RankController extends Controller
{
    public function index()
{
    // คำสั่งที่คุณต้องการ
    return view('rank.index'); // เป็นต้น, ถ้าคุณมี view ชื่อ "index" ภายใต้ folder "news"
}

}
