@extends('layouts.admin')
@section('title','Settings/shippings')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">

        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> تعديل  متجر </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{route('update.shipping.methods', $shippingMethod->id)}}"
                                          method="PUT"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{$shippingMethod->id}}">
                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                        <label for="projectinput1"> الاسم </label>
                                                        <input type="text" name="value" value="{{$shippingMethod->value}}" id="name"class="form-control" >

                                                        @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div> <!-- end of col for name  -->

                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                        <label for="projectinput1"> قيمة التوصيل </label>
                                                        <input type="number" name="plain_value" value="{{$shippingMethod->plain_value}}" id="plain_value" class="form-control" >

                                                        @error("plain_value")
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div> <!-- end of col for cost  -->
                                            </div> <!-- end of row  -->


                                        </div> <!-- end of form-body  -->

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>

                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"> </i> حفظ
                                            </button>


                                        </div>


                                    </form> <!-- end of form  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>


@endsection
