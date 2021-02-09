<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributesController extends Controller
{
    public function index()
    {
        $attributes = Attribute::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.attributes.index', compact('attributes'));
    }


    public function create()
    {
        return view('dashboard.attributes.create');
    }

    public function store(AttributeRequest $request)
    {

        try{
            DB::beginTransaction();
            $attribute = Attribute::create([]);

            //save translations
            $attribute->name = $request->name;
            $attribute->save();
            DB::commit();
            return redirect()->route('attributes.index')->with(['success' => 'تم ألاضافة بنجاح']);

        }catch(\Exception $ex)
            {
                return redirect()->back()->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);

            }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $attribute = Attribute::find($id);

        if (!$attribute)
            return redirect()->route('attributes.index')->with(['error' => 'هذا العنصر  غير موجود ']);

        return view('dashboard.attributes.edit', compact('attribute'));
    }

    public function update($id, AttributeRequest $request)
    {
        try {
            //validation

            //update DB
            $attribute = Attribute::find($id);

            if (!$attribute)
                return redirect()->route('attributes.index')->with(['error' => 'هذا العنصر غير موجود']);


            DB::beginTransaction();

            //save translations
            $attribute->name = $request->name;
            $attribute->save();

            DB::commit();
            return redirect()->route('attributes.index')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('attributes.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function destroy($id)
    {
        try {

            $attribute = Attribute::find($id);

            if (!$attribute)
                return redirect()->route('attributes.index')->with(['error' => 'هذاالعنصؤ غير موجود ']);

            $attribute->delete();

            return redirect()->route('attributes.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('attributes.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
