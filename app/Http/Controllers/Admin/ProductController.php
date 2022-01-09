<?php

namespace App\Http\Controllers\Admin;


use App\Car_brand;
use App\Car_model;
use App\Car_product;
use App\Car_type;
use App\Http\Requests\carproductrequest;
use App\Http\Requests\mediarequest;
use App\Http\Requests\productrequest;
use App\Media;
use App\Menudashboard;
use App\Product_group;
use App\Product;
use App\Status;
use App\Submenudashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products           = Product::all();
        $statuses           = Status::select('id' , 'title')->get();
        $productgroups      = Product_group::select('id' , 'title_fa')->get();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();

        return view('Admin.products.all')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('productgroups'))
            ->with(compact('statuses'))
            ->with(compact('products'));

    }

    public function create()
    {
        $productgroups      = Product_group::select('id' , 'title_fa')->get();
        $carmodels = DB::table('Car_brands')
            ->join('Car_models', 'Car_brands.id', '=', 'Car_models.vehicle_brand_id')
            ->select('Car_brands.id', 'Car_brands.title_fa' , 'Car_models.id', 'Car_models.title_en')
            ->get();
        $cartypes           = Car_type::select('id' , 'car_model_id' , 'title_fa')->whereStatus(1)->get();
        $products           = Product::orderby('unicode' , 'DESC')->limit('1')->get();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();
        return view('Admin.products.create')
            ->with(compact('products'))
            ->with(compact('cartypes'))
            ->with(compact('productgroups'))
            ->with(compact('menudashboards'))
            ->with(compact('carmodels'))
            ->with(compact('submenudashboards'));
    }


    public function store(productrequest $request)
    {
        $products = new Product();

        $products->unicode              = $request->input('unicode');
        $products->title_fa             = $request->input('title_fa');
        $products->title_en             = $request->input('title_en');
        $products->kala_group_id        = $request->input('kala_group_id');
        $products->title_bazar_fa       = $request->input('title_bazar_fa');
        $products->title_bazar_en       = $request->input('title_bazar_en');
        $products->code_fani_company    = $request->input('code_fani_company');
        $products->status               = '1';
        $products->description          = $request->input('description');
        $products->date                 = jdate()->format('Ymd ');
        $products->date_handle          = jdate()->format('Ymd ');
        $products->user_id              = Auth::user()->id;
        $products->user_handle          = Auth::user()->name;

        if ($request->file('image') != null) {
            $file = $request->file('image');
            $img = Image::make($file);
            $unicode = $request->input('unicode');
            $imagePath ="image/products/{$unicode}/";
            $imageName = md5(uniqid(rand(), true)) . $file->getClientOriginalName();
            $products->image = $file->move($imagePath, $imageName);
            $img->save($imagePath.$imageName);
            $img->encode('jpg');
        }
        $products->save();

        alert()->success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد');
        return redirect(route('products.index'));

    }


    public function edit($id)
    {
        $cartypes           = Car_type::select('id' , 'title_fa')->whereStatus(1)->get();
        $carmodels          = Car_model::select('id' , 'title_fa')->whereStatus(1)->get();
        $carbrands          = Car_brand::select('id' , 'title_fa')->whereStatus(1)->get();
//        $carmodels = DB::table('Car_brands')
//            ->join('Car_models', 'Car_brands.id', '=', 'Car_models.vehicle_brand_id')
//            ->select('Car_brands.id', 'Car_brands.title_fa' , 'Car_models.id', 'Car_models.title_en')
//            ->get();
        $medias             = Media::select('id','product_id' , 'image')->whereProduct_id($id)->get();
        $carproducts        = Car_product::all();
        $statuses           = Status::select('id' , 'title')->get();
        $products           = Product::whereId($id)->get();
        $productgroups      = Product_group::select('id' , 'title_fa')->get();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();

        return view('Admin.products.edit')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('medias'))
            ->with(compact('carbrands'))
            ->with(compact('productgroups'))
            ->with(compact('carmodels'))
            ->with(compact('carproducts'))
            ->with(compact('statuses'))
            ->with(compact('cartypes'))
            ->with(compact('products'));
    }

    public function update(productrequest $request , Product $product )
    {

        $product->unicode           = $request->input('unicode');
        $product->title_fa          = $request->input('title_fa');
        $product->title_en          = $request->input('title_en');
        $product->kala_group_id     = $request->input('kala_group_id');
        $product->title_bazar_fa    = $request->input('title_bazar_fa');
        $product->title_bazar_en    = $request->input('title_bazar_en');
        $product->code_fani_company = $request->input('code_fani_company');
        $product->status            = $request->input('status_id');
        $product->description       = $request->input('description');
        $product->date              = jdate()->format('Ymd ');
        $product->user_id           = Auth::user()->id;
        $product->user_handle       = Auth::user()->name;

        if ($request->file('image') != null) {
            $file = $request->file('image');
            $img = Image::make($file);
            $unicode = $request->input('unicode');
            $imagePath ="image/product/{$unicode}/";
            $imageName = md5(uniqid(rand(), true)) . $file->getClientOriginalName();
            $product->image = $file->move($imagePath, $imageName);
            $img->save($imagePath.$imageName);
            $img->encode('jpg');
        }

        $product->update();

        alert()->success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد');
        return Redirect::back();
    }

    public function destroy(Product $product)
    {
        $product->delete();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت پاک شد');
        return redirect(route('products.index'));
    }
    public function deleteimage(Media $media)
    {
        dd($media);
        $media->delete();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت پاک شد');
        return Redirect::back();
    }
    public function updateproimg($id)
    {
        $products = Product::findOrfail($id);
        $products->image  = '';
        $products->update();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت پاک شد');
        return Redirect::back();
    }
    public function modeloption(Request $request){
        $carmodels = Car_model::whereVehicle_brand_id($request->input('id'))->get();
        $output = [];

        foreach($carmodels as $Car_model )
        {
            $output[$Car_model->id] = $Car_model->title_fa;
        }

        return $output;
    }
    public function typeoption(Request $request){
        $cartypes = Car_type::whereCar_model_id($request->input('id'))->get();
        $output = [];

        foreach($cartypes as $Car_type )
        {
            $output[$Car_type->id] = $Car_type->title_fa;
        }

        return $output;
    }

}
