<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralProductRequest;
use App\Http\Requests\ProductPriceValidation;
use App\Http\Requests\ProductStockRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::select('id','slug','price','is_active','created_at')->paginate(PAGINATION_COUNT);
        return view('dashboard.products.general.index', compact('products'));
    }


    public function create()
    {

        $data = [];
        $data['brands']     = Brand::active()->select('id')->get();
        $data['tags']       = Tag::select('id')->get();
        $data['categories'] = Category::active() -> select('id')-> get();

        return view('dashboard.products.general.create', $data);

    }


    public function store(GeneralProductRequest $request)
    {

    try{
        DB::beginTransaction();

        if(!$request->has('is_active'))
            $request->request->add(['is_active'=> 0]);
        else
            $request->request->add(['is_active'=> 1]);

        $product = Product::create([
            'slug' => $request->slug,
            'brand_id' => $request->brand_id,
            'is_active' => $request->is_active,
        ]);

        //save translations
        $product->name = $request->name;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->save();

        //save product categories
        $product->categories()->attach($request->categories);

        //save product tags
        $product->tags()->attach($request->tags);

        DB::commit();

        return redirect()->route('products.index')->with(['success' => 'تم ألاضافة بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('products.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function getPrice($product_id){

        return view('dashboard.products.prices.create') -> with('id',$product_id) ;
    }

    public function saveProductPrice(ProductPriceValidation $request){

        try{

            Product::whereId($request ->product_id) -> update($request -> only(['price','special_price','special_price_type','special_price_start','special_price_end']));
            return redirect()->route('products.index')->with(['success' => 'تم التحديث بنجاح']);

        }catch(\Exception $ex){

            return redirect()->route('products.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function getStock($product_id){

        return view('dashboard.products.stock.create') -> with('id',$product_id) ;
    }

    public function saveProductStock (ProductStockRequest $request){

        try{
                Product::whereId($request -> product_id) -> update($request -> except(['_token','product_id']));

                return redirect()->route('products.index')->with(['success' => 'تم التحديث بنجاح']);
        }catch(\Exception $ex){

                return redirect()->route('products.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {


    }



    public function update()
    {


    }


    public function destroy($id)
    {

    }



}
