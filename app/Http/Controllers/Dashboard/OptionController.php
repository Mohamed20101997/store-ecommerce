<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionsRequest;
use App\Models\Attribute;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OptionController extends Controller
{

    public function index()
    {
        $options = Option::with(['product' => function($prod){
            $prod->select('id');
        }, 'attribute' =>  function($attr){
            $attr->select('id');
        }])->select('id', 'product_id', 'attribute_id', 'price')->paginate(PAGINATION_COUNT);;

        return view('dashboard.options.index', compact('options'));
    }


    public function create()
    {
        $data = [];
        $data['products'] = Product::active()->select('id')->get();
        $data['attributes'] = Attribute::select('id')->get();

        return view('dashboard.options.create', $data);

    }


    public function store(OptionsRequest $request)
    {
        try{

            DB::beginTransaction();
            //validation
            $option = Option::create([
                'attribute_id' => $request->attribute_id,
                'product_id' => $request->product_id,
                'price' => $request->price,
            ]);
            //save translations
            $option->name = $request->name;
            $option->save();
            DB::commit();

            return redirect()->route('options.index')->with(['success'=>'تم الانشاء بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('options.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);


        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = [];
        $data['option'] = Option::find($id);

       if (!$data['option'])
           return redirect()->route('options.index')->with(['error' => 'هذه القيمة غير موجود ']);

        $data['products']   = Product::active()->select('id')->get();
        $data['attributes'] = Attribute::select('id')->get();

       return view('dashboard.options.edit', $data);
    }


    public function update(OptionsRequest $request, $id)
    {
        try {

            DB::beginTransaction();
            $option = Option::find($id);

           if (!$option)
               return redirect()->route('options.index')->with(['error' => 'هذا ألعنصر غير موجود']);

           $option->update($request->only(['price','product_id','attribute_id']));
           //save translations
           $option->name = $request->name;
           $option->save();

           DB::commit();
           return redirect()->route('options.index')->with(['success' => 'تم ألتحديث بنجاح']);

       } catch (\Exception $ex) {

            DB::rollback();
           return redirect()->route('options.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
       }
    }


    public function destroy($id)
    {
        try {


            //get specific categories and its translations
            $option = Option::orderBy('id', 'DESC')->find($id);

            if (!$option)
                return redirect()->route('options.index')->with(['error' => 'هذا القسم غير موجود ']);

            $option->delete();

            return redirect()->route('options.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('options.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
