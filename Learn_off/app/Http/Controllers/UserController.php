<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function showUser()
    {
        // 1. Lấy danh sách toàn bộ người dùng (select * from users)
        // $listUsers = DB::table('users')->get();
        // dd($listUsers);



        // 2. Lấy thông tin user có id = 4 (select * from users where id = 4)
        // $result = DB::table('users')->where('id', '=', '4')->first();    // Cách 1
        // $result = DB::table('users')->find('4');                         // Cách 2
        // dd($result);




        // 3. Lấy thuộc tính 'name' của user có id = 16
        // $result = DB::table('users')->where('id','=','16')->value('name');
        // dd($result);




        // 4. Lấy danh sách idUser của phòng ban là 'Ban giám hiệu'
        // $idPhongBan = DB::table('phongban')
        //     ->where('ten_donvi','like','%Ban giám hiệu%')
        //     ->value('id');
        // $result = DB::table('users')
        //     ->where('phongban_id', $idPhongBan)
        //     ->pluck('id');
        // dd($result);




        // 5. Tìm user có độ tuổi lớn nhất trong công ty 
        // $result = DB::table('users')
        //     ->where('tuoi', DB::table('users')->max('tuoi'))
        //     ->get();
        // dd($result);




        // 6. Tìm user có độ tuổi nhỏ nhất trong công ty
        // $result = DB::table('users')
        //     ->where('tuoi', DB::table('users')->min('tuoi'))
        //     ->get();
        // dd($result);




        // 7. Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user
        // $idPhongBan = DB::table('phongban')
        //     ->where('ten_donvi','like','%Ban giám hiệu%')
        //     ->value('id');
        // $result = DB::table('users')
        //     ->where('phongban_id', $idPhongBan)
        //     ->count('id');
        // dd($result);




        // 8. Lấy danh sách tuổi các user 
        // $result = DB::table('users')
        //     ->distinct()
        //     ->pluck('tuoi');
        // dd($result);




        // 9. Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
        // $result = DB::table('users')
        //     ->where('name', 'like', '%Khải')
        //     ->orWhere('name', 'like', '%Thanh')
        //     ->get();
        // dd($result);




        // 10. Lấy danh sách user ở phòng ban 'Ban đào tạo'
        // $idPhongBan = DB::table('phongban')
        //     ->where('ten_donvi','like','%Ban đào tạo%')
        //     ->value('id');
        // $result = DB::table('users')
        //     ->where('phongban_id', $idPhongBan)
        //     ->get();
        // dd($result);




        // 11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
        // $result = DB::table('users')
        //     ->where('tuoi', '>=', '30')
        //     ->select('id', 'name','email', 'tuoi')
        //     ->orderBy('tuoi','asc')
        //     ->get();
        // dd($result);



        // 12. Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        // $result = DB::table('users')
        //     ->select('id', 'name','email', 'tuoi')
        //     ->orderBy('tuoi','desc')
        //     ->offset(5)
        //     ->limit(10)
        //     ->get();
        // dd($result);




        // 13. Thêm một user mới vào công ty
        // $data = [
        //     'name' => 'Nguyễn Quang Chinh Chiến',
        //     'email' => 'chiennqcph39223@fpt.edu.vn',
        //     'phongban_id' => 1,
        //     'songaynghi' => 5,
        //     'tuoi' => 20,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ];

        // DB::table('users')->insert($data);
        // dd($data);





        // 14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo'
        // $idPhongBan = DB::table('phongban')
        //     ->where('ten_donvi','like','%Ban đào tạo%')
        //     ->value('id');
        // $result = DB::table('users')
        //     ->where('phongban_id', $idPhongBan)
        //     ->select('id', 'name', 'email')
        //     ->get();
        //     foreach ($result as $value) {
        //         DB::table('users')
        //         ->where('id', $value->id)
        //         ->update([
        //             'name' => $value->name  . ' - PĐT'
        //         ]);
        //     }
        // dd($result);





        // 15. Xóa user nghỉ quá 15 ngày
        // DB::table('users')->where('songaynghi', '>', '15')->delete();
    }










    function getUser($id, $name = '')
    {
        echo $id;
        echo $name;
    }

    function updateUser(Request $request)
    {
        echo $request->id;
    }


    public function listUsers()
    {
        $listUsers = DB::table('users')
            ->join('phongban', 'phongban.id', '=', 'users.phongban_id')
            ->select('users.id', 'users.name', 'users.email','users.tuoi', 'users.phongban_id', 'phongban.ten_donvi')
            ->get();
        return view('users/listUsers')->with([
            'listUsers' => $listUsers
        ]);
    }


    public function addUsers(){
        $phongBan = DB::table('phongban')->select('id', 'ten_donvi')->get();
        return view('users/addUsers')->with([
            'phongBan' => $phongBan
        ]);
    }

    

    public function addPostUsers(Request $request){
        $data = [
            'name'        => $request->nameUser,
            'email'       => $request->emailUser,
            'tuoi'        => $request->ageUser,
            'phongban_id' => $request->phongbanUser,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ];
        DB::table('users')->insert($data);
        return redirect()->route('users.listUsers');
    }

    public function deleteUser($idUser){
        DB::table('users')->where('id', $idUser)->delete();
        return redirect()->route('users.listUsers');
    }





    // Products


    public function listProducts()
    {
        $listProducts = DB::table('product')
            ->select('product.id', 'product.name', 'product.price','product.view', 'product.created_at', 'product.updated_at')
            ->get();
        return view('products/listProducts')->with([
            'listProducts' => $listProducts
        ]);
    }

    public function addProducts(){
        $category = DB::table('category')->select('id', 'name')->get();
        return view('products/addProducts')->with([
            'category' => $category
        ]);
    }

    

    public function addPostProducts(Request $request){
        $data = [
            'name'        => $request->namePro,
            'price'       => $request->pricePro,
            'view'        => $request->viewPro,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ];
        DB::table('product')->insert($data);
        return redirect()->route('products.listProducts');
    }

    public function deleteProduct($idProduct){
        DB::table('product')->where('id', $idProduct)->delete();
        return redirect()->route('products.listProducts');
    }

    function updateProduct($idProduct){
        $category = DB::table('category')->select('id','name')->get();
        $product = DB::table('product')->where('id',$idProduct)->first();
        return view('products/updateProducts')->with([
            'product' => $product,
            'category' => $category
        ]);
    }

    public function updatePostProducts(Request $request){
        $data = [
            'name'        => $request->namePro,
            'price'       => $request->pricePro,
            'view'        => $request->viewPro,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ];
        DB::table('product')->where('id', $request->idPro)->update($data);
        return redirect()->route('products.listProducts');
    }

    public function test(){
        return view('admin.products/list-product');
    }
    

}
// return $this->queryBuilder
//         ->select(
//             'p.id', 'p.category_id', 'p.name', 'p.img_thumbnail', 'p.created_at', 'p.updated_at',
//             'c.name as c_name'
//         )
//         ->from($this->tableName, 'p')
//         ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
//         ->orderBy('p.id', 'desc')
//         ->fetchAllAssociative();





