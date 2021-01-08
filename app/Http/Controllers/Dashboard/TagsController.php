<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagsRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{

    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.tags.index', compact('tags'));
    }


    public function create()
    {
        return view('dashboard.tags.create');
    }


    public function store(TagsRequest $request)
    {
        try{
            DB::beginTransaction();

            $tag = Tag::create(['slug' => $request -> slug]);


            $tag->name = $request->name;
            $tag->save();
            DB::commit();
            return redirect()->route('tags.index')->with(['success' => 'تم ألاضافة بنجاح']);
        }catch(\Exception $ex)
        {
            return redirect()->back()->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
            DB::rollback();
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

         $tag = Tag::find($id);

         if (!$tag)
             return redirect()->route('tags.index')->with(['error' => 'هذا الماركة غير موجود ']);

         return view('dashboard.tags.edit', compact('tag'));
    }


    public function update($id, TagsRequest  $request)
    {
        try {

            $tag = Tag::find($id);
            if (!$tag)
                return redirect()->route('tags.index')->with(['error' => 'هذا الماركة غير موجود']);


            DB::beginTransaction();


            $tag->update($request->except('_token', 'id'));  // update only for slug column

            //save translations
            $tag->name = $request->name;
            $tag->save();

            DB::commit();
            return redirect()->route('tags.index')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('tags.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function destroy($id)
    {
        try {

            $tags = Tag::find($id);

            if (!$tags)
                return redirect()->route('tags.index')->with(['error' => 'هذا الماركة غير موجود ']);

            $tags->delete();

            return redirect()->route('tags.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('tags.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
