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
        $orgs = ORG::all();
        return view('admin.dashboard', compact('orgs'));
    }
    public function viewAddForm(){
        $orgs = Org::all();
        $users = User::all();
        return view('admin.add_customer', compact('orgs', 'users'));
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

        foreach($data['org'] as $org){
            $org_user = new UserOrg();
            $org_user->user_id = $customer->id;
            $org_user->org_id = $org;
            $org_user->save();
        }
        return back();
    }
    public function deleteCustomer($id){
        User::where('id', $id)->delete();
        return back();
    }
//    org part
    public function viewOrg(){
        $orgs = ORG::all();
        return view('admin.add_org', compact('orgs'));
    }
    public function storeOrg(Request $request){
        $old_orgs = ORG::all();
        foreach ($old_orgs as $old_org){
            if($old_org->org_name == strtolower($request->org_name)){
                return back()->with('message', 'The organization already exists.');
            }
        }
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
    public function viewProductDetail($id){
        $product = Product::where('id', $id)->get();
        return view('admin.product_detail', compact('product'));
    }
    public function storeProduct(Request $request){
        $dir = ORG::where('id', $request->org)->get();
        $fileName = $request->product_file->getClientOriginalName();
        $p_names = Product::all();
        foreach ($p_names as $p_name){
            if($p_name->licensed_pn == $fileName){
                return back()->with('message', 'The product name already exist.');
            }
        }
        $request->product_file->move(public_path('download/'.$dir[0]->org_name), $fileName);
        $product = new Product();
        $product->licensed_pn = $fileName;
        $product->licensed_pv ='';
        $product->description = $request->product_description;
        $product->save();

        $orgPtr = new OrgPrt();
        $orgPtr->org_id = $request->org;
        $orgPtr->product_id = $product->id;
        $orgPtr->save();
        return back();
    }
    public function deleteProduct($id)
    {
        OrgPrt::where('product_id', $id)->delete();
        Product::where('id', $id)->delete();
        return back();
    }
}
