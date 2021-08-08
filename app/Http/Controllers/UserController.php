<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;



class UserController extends Controller
{
    public function __construct(User $userModel, Role $role)
    {
        $this->user = $userModel;
        $this->role = $role;

    }


    public function index(Request $request)
    {
        $pagesize = 20;
        $searchData = $request->except('page');


        if (count($request->all()) == 0) {
            $users = User::paginate($pagesize);
        } else {
            if ($request->user_name) {
                $userQuery = User::where('name', 'LIKE', "%" . $request->user_name . "%");
            }
            if ($request->user_name) {
                $userQuery = User::where('email', 'LIKE', "%" . $request->user_name . "%");
            }

            if ($request->name_sort == 0) {
                $userQuery = User::orderBy('name', 'asc');
            }

            if ($request->name_sort == 1) {
                $userQuery = User::orderBy('name', 'desc');
            }

            $users = $userQuery->paginate($pagesize)->appends($searchData);

        }

        // foreach($users as $user){
        //     foreach($user->roles as $rol){

        //         print_r($rol->name);

        //     }

        // }
        // die();



        $data = [];
        $data['name_sort'] = $request->name_sort;
       
        $data['users'] = $users;
        $data['keyword'] = $request->user_name;

        return view('admin.users.index', $data);
    }


    public function add()
    {
        $role = $this->role->all();
        return view('admin.users.add' , compact('role'));
    }

    public function store(UsersRequest $request)
    {
        $user =   $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'avatar' => $request->avatar
        ]);
        if($request->has('role')){
           $user->assignRole($request->role);
        }
        return redirect()->route('users')->with('status', "Thêm thành viên thành công !");
    }

    public function edit($id)
    {
        $user =  $this->user->find($id);
        $role = $this->role->all();

        return view('admin.users.edit', compact('user', 'role'));
    }

    public function update($id, UsersRequest $request)
    {

        $password = $request->password;

        $user =   $this->user->find($id);
        if ($request->avatar  != $user->avatar) {
            $delete_item = str_replace("http://localhost:8000/storage", '/public', $user->avatar);
            Storage::delete($delete_item);
        }

        $dataUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'avatar' => $request->avatar
        ];
        if (strlen($password) > 0) {
            $dataUpdate['password'] = Hash::make($password);
        }
        $user->update($dataUpdate);

        if($request->has('role')){
            $user->syncRoles($request->role);
        }
        return redirect()->route('users')->with('status', "Cập nhật thành viên thành công !");
    }
    public function changePassword($id){
        $user = $this->user->find($id);
        return view('admin.users.change-password' , compact('user'));
    }

    public function changePasswordPost(Request $request , $id){
        $user = $this->user->find($id);
        $request->validate(
            [
                'password_old' => 'required',
                'password_new' => 'required',
                'password_confim' => 'required|same:password_new',
            ],
            [
                'password_old.required' => 'Để trống sẽ không đăng nhập được',
                'password_new.required' => 'Để trống sẽ không đăng nhập được',
                'password_confim.required' => 'Để trống sẽ không đăng nhập được',
                'password_confim.same' => 'Nhập mật khẩu xác nhận chính xác'
            ]
        );

        $password_confim = Hash::make($request->password_confim);
        $passwordcheck = Hash::check($request->password_old, $user->password );
        if($passwordcheck){
            $user->update([
                'password' => $password_confim
            ]);
            return redirect()->route('user.change.password', ['id'=>$user->id])->with('status' , "Đổi mật khẩu thành công");
        }
        return redirect()->route('user.change.password', ['id'=>$user->id])->with('danger' , "Bạn cần nhập chính xác nhật khẩu");
    }

    public function delete($id)
    {
        try {
            $user =   $this->user->find($id);
            $delete_user = str_replace("http://localhost:8000/storage", '/public', $user->avatar);
            Storage::delete($delete_user);
            $user->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("message" . $e->getMessage() . 'Line: ' . $e->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
