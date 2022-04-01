<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;

class SliderController extends Controller
{

    public function index()
    {

        $data = Slider::withoutTrashed()->Paginate(10);
        return view('index',['data'=>$data]);
    }

    public function create()
    {
        return view('create');
    }


    public function store(StoreSliderRequest $request)
    {
       $image =  md5(sha1(rand(89732,time()))).$request->file('image')->getClientOriginalName();
       $request->file('image')->move('images',$image);
       $image = "images/".$image;

       $data = $request->only(['UserName','email','image','link']);
       $data ["image"] = $image;

       Slider::create(
           $data
       );
       return redirect(route('slider.index'));
    }
    public function trash(){
        return view('trash',['data'=>Slider::onlyTrashed()->paginate(10)]);
    }

    public function softDelete($id){

       Slider::destroy($id);

        return redirect(route('slider.index'));
    }
    public function show(Slider $slider)
    {
        //
    }

    public function edit(Slider $slider, $id)
    {

        return view('edit',['data'=>$slider->find($id)]);
    }

    public function update(UpdateSliderRequest $request, Slider  $id)
    {


        $data = $request->only(['UserName','email','image','link','publish']);

        if ( $request->file('image'))
        {
            $image =  $id->find($id)->only('image');
            $image = $image ['image'];

            if(file_exists($image))
                \File::delete($image);
            $image = null;
            $image =  md5(sha1(rand(89732,time()))).$request->file('image')->getClientOriginalName();
            $request->file('image')->move('images',$image);
            $image = "images/".$image;
            $data ['image'] = $image;
        }


        Slider::withoutTrashed()->findorfail($id->id)->update($data);

        return redirect(route('slider.index'));
    }
    public function restore(Slider $slider,$id){
          $slider->onlyTrashed()->findOrFail($id)->restore();
        return  redirect(route('slider.trash'));
    }

//    public function destroy(Slider $slider)
//    {
//        $slider->forceDelete();
//    }
    public function forcedelete(Slider $slider ,$id){
      $image =  $slider->onlyTrashed()->find($id)->only('image');
      $image = $image ['image'];

      if(file_exists($image))
          \File::delete($image);


        $slider->onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect(route('slider.trash'));
    }
}
