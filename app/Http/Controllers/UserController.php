<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Org;
use App\Product;
use App\OrgPrt;
use App\UserOrg;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(){
        $orgs = UserOrg::where('user_id', Auth::user()->id)->get('org_id');
        $products = [];
        foreach ($orgs as $org){
            $product = OrgPrt::join('products', 'products.id', 'org_prts.product_id')
                ->join('orgs', 'orgs.id', 'org_prts.org_id')->where('org_id', $org->org_id)->get();
            array_push($products, $product);
        }
//        dd($products);
        return view('user.dashboard', compact('products'));
    }
    public function showPassword(){
        return view('user.change_password');
    }
    public function storeChange(Request $request){
        $data = $request->all();
        User::where('id', auth()->user()->id)->update(
            ['first_name' => $data['first_name'], 'last_name' => $data['last_name'], 'email' => $data['email'], 'password' => bcrypt($data['password'])]
        );
        return back()->with('message', 'Successfully changed!');
    }
}
