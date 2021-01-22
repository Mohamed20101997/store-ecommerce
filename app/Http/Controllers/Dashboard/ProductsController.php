<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralProductRequest;
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
