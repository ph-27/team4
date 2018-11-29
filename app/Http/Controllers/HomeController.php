<?php

namespace shoes\Http\Controllers;

use Illuminate\Http\Request;
use shoes\User;
use shoes\Role;
use shoes\Product;
use shoes\Category;
use shoes\Sale;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale = Sale::orderBy('percent', 'ASC')->paginate();
        $cate = Category::all();
        $prod = Product::orderBy('created_at', 'DESC')->paginate(5);
        $pro = Product::orderBy('created_at', 'DESC')->paginate(6);
        return view('home.index', compact('pro', 'cate', 'sale', 'prod'));
    }

    function getRegister()
    {
        $roles = Role::all();
        return view('.membership.register')->with('roles', $roles);
    }

    function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'username' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:32',
            'passwordAgain'=>'required|same:password',
            'phone' => 'required|max:11',
            'address' => 'required',
        ], [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'username.required' => 'Bạn chưa nhập tên đăng nhập',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'username.min' => 'Tên đăng nhập phải có ít nhất 3 ký tự',
            'username.unique' => 'Username đã tồn tại',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
            'password.max' => 'Mật khẩu chỉ được tối đa 32 ký tự',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.max' => 'số điện thoại chỉ được tối đa 11 số',
            'address.required' => 'Bạn chưa nhập địa chỉ',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        $users = User::find($user->id);
        $users->roles()->attach(3);
        return redirect('/shoes')->with('thongbao','Bạn đã đăng ký thành công');
    }

    //login khách hàng
    public function getlogin()
    {
        return view('membership.login_customer');
    }

    public function postlogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32'
        ],[
            'email.required'=>"Bạn chưa nhập email",
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'password không được nhỏ hơn 3 ký tự',
            'password.max'=>'password không được lớn hơn 32 kỳ tự',

        ]);
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        $email = $request->input('email');
        $password = $request->input('password');
        if( Auth::attempt(['email' => $email, 'password' =>$password])){
            return redirect('/shoes');
        }
        return redirect()->back()->withInput(Input::all())->with('thongbao','Đăng nhập không thành công');
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function single($id)
    {
        $pro =Product::find($id);
        $detail = Product::where('id_category',$pro->id_category)->where('id','!=',$id)->get();
        return view('home.single', compact( 'pro', 'detail'));
    }
    public function category ($id)
    {
        $cate =Category::find($id);
        $detail = Product::where('id',$id)->get();
        return view('home.category', compact('cate', 'detail'));
    }

    public function discount ($id)
    {
        $sale =Sale::find($id);
        $detail = Product::where('id_sale',$id)->get();
        return view('home.discount', compact('sale', 'detail'));
    }

    public function getSearch(Request $request)
    {
        $sale = Sale::orderBy('percent', 'ASC')->paginate();
        $cate = Category::all();
        $prod = Product::orderBy('created_at', 'DESC')->paginate(5);
        $pro = Product::orderBy('created_at', 'DESC')->paginate(6);
        $products = Product::where('id', 'like', '%' . $request->key . '%')->orwhere('name', 'like', '%' . $request->key . '%')
            ->orwhere('price', 'like', '%' . $request->key . '%')->orwhere('size', 'like', '%' . $request->key . '%')->orwhere('gender', 'like', '%' . $request->key . '%')->paginate(5);
        return view('home.search', compact('products', 'cate','prod','sale','pro'));
    }
    public function checkout(){

        return redirect('/shoes');
    }

    public function logout(){
        Auth::logout();
        return redirect('/shoes');
    }

    public function dathang() 
    {
        return view('home.checkout');
    }
}
