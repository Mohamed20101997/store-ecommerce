<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class BrandsController extends Controller
{

    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.brands.index', compact('brands'));
    }


    public function create()
    {
        return view('dashboard.brands.create');
    }


    public function store(BrandRequest $request)
    {

        try{

            DB::beginTransaction();

            if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
                else
            $request->request->add(['is_active' => 1]);


            $fileName = "";
            if ($request->has('photo')) {

                $fileName = uploadImage('brands', $request->photo);
            }

            $brand = Brand::create($request->except('_token', 'photo'));

            //save translations
            $brand->name = $request->name;
            $brand->photo = $fileName;

            $brand->save();
            DB::commit();
            return redirect()->route('brands.index')->with(['success' => 'تم ألاضافة بنجاح']);

        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->route('brans.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);


        }

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //get specific categories and its translations
        $brand = Brand::find($id);

        if (!$brand)
            return redirect()->route('brands.index')->with(['error' => 'هذا الماركة غير موجود ']);

        return view('dashboard.brands.edit', compact('brand'));
    }


    public function update($id, BrandRequest $request)
    {
        try {

            $brand = Brand::find($id);
            if (!$brand)
                return redirect()->route('brands.index')->with(['error' => 'هذا الماركة غير موجود']);

            DB::beginTransaction();

            if ($request->has('photo')) {

                remove_previous($brand);
                $fileName = uploadImage('brands', $request->photo);
                Brand::where('id', $id) -> update(['photo' => $fileName,]);

            }

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $brand->update($request->except('_token', 'id', 'photo'));

            //save translations
            $brand->name = $request->name;
            $brand->save();

            DB::commit();
            return redirect()->route('brands.index')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('brands.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function destroy($id)
    {

        try {

            $brand = Brand::find($id);

            if (!$brand)
                return redirect()->route('brands.index')->with(['error' => 'هذا الماركة غير موجود ']);

            $brand->delete();
            remove_previous($brand);

            return redirect()->route('brands.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('brands.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
