<?php

use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index']);

Route::get('/register', [AuthController::class,'register']);
Route::get('/login', [AuthController::class,'login']);


Route::get('/posts',function(){
    $query = DB::table('posts')
    ->select('id','title','view','name')
    ->orderBy('view','desc')
    ->limit(10);
    $data= $query->get();
    foreach($data as $posts) echo"<p> name:{$posts->name} <br> title:{$posts->title} <br>  view:{$posts->view} <br> </p>";    
});
Route::get('/blocks', function () {
    $query = DB::table('blocks')
        ->join('students', 'blocks.id', '=', 'students.id_block')
        ->select('blocks.id', 'blocks.name as name_block', 'students.name as name_student', 'students.mssv as mssv_student')
        ->orderBy('blocks.id');
        
    $data = $query->get();
    $groupedBlocks = [];
    foreach ($data as $block) {
        $groupedBlocks[$block->name_block][] = [
            'name' => $block->name_student,
            'mssv' => $block->mssv_student
        ];
    }

    // Hiển thị thông tin khóa học và học sinh với mã số sinh viên
    foreach ($groupedBlocks as $blockName => $students) {
        echo "Khóa Học: {$blockName} - Học sinh: ";
        
        $studentsList = [];
        foreach ($students as $student) {
            // Tạo chuỗi tên học sinh và mssv
            $studentsList[] = "{$student['name']} (MSSV: {$student['mssv']})";
        }
        
        // Nối các tên học sinh và MSSV bằng dấu phẩy
        echo implode(", ", $studentsList);
        echo "<br>";
    }
});
