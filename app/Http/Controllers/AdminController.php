<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Org;
use App\Product;
use App\OrgPrt;
use App\UserOrg;
use File;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index(){
        $users = User::where('is_admin', 0)->get();
        return view('admin.dashboard', compact('users'));
    }
    public function viewAddForm(){
        $orgs = Org::all();
        return view('admin.add_customer', compact('orgs'));
    }
    public function storeCustomer(Request $request){
        $data = $request->all();
        $customer = new User();
        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->email = $data['email'];
        $customer->password = bcrypt($data['password']);
        $customer->is_admin = 0;
        $customer->save();
//        save user org
        $org_user = new UserOrg();
        $org_user->user_id = $customer->id;
        $org_user->org_id = $data['org'];
        $org_user->save();
        return back();
    }
    public function viewOrg(){
        $orgs = ORG::all();
        return view('admin.add_org', compact('orgs'));
    }
    public function storeOrg(Request $request){
        $org = new ORG();
        $org->org_name = $request->org_name;
        $org->save();
        $path = public_path().'/download/'.$request->org_name;
        File::makeDirectory($path, $mode = 077, true, true);
        return back();
    }
    public function deleteOrg($id){
        $dir_name = ORG::where('id', $id)->get();
        $path = public_path().'/download/'.$dir_name[0]->org_name;
        File::deleteDirectory($path, false);
        ORG::where('id', $id)->delete();
        return back();
    }
//    product part
    public function viewProduct(){
        $orgs = ORG::all();
        $uploadedProducts = OrgPrt::join('orgs', 'org_prts.org_id', 'orgs.id')
            ->join('products', 'org_prts.product_id', 'products.id')->get()->groupBy('org_name');
//        dd($uploadedProducts);
        return view('admin.add_product', compact('orgs', 'uploadedProducts'));
    }
    public function storeProduct(Request $request){
        $dir = ORG::where('id', $request->org)->get();
        $fileName = time().'.'.$request->product_file->extension();
        $request->product_file->move(public_path('download/'.$dir[0]->org_name), $fileName);
        $product = new Product();
        $product->licensed_pn = $fileName;
        $product->licensed_pv ='';
        $product->save();

        $orgPtr = new OrgPrt();
        $orgPtr->org_id = $request->org;
        $orgPtr->product_id = $product->id;
        $orgPtr->save();
        return back();
    }
    public function deleteProduct($id)
    {
        OrgPrt::where('id', $id)->delete();
        return back();
    }
}
