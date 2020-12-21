@extends('layouts.admin')
@section('title','Profile')
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
                                <h4 class="card-title" id="basic-layout-form"> الصفحه الشخصيه </h4>
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
                                    <form class="form" action="{{route('update.profile')}}"
                                          method="post"
                                          enctype="multipart/form-data">
                                          @csrf
                                          @method('PUT')

                                          <div class="form-body">
                                            <input type="hidden" name="id" value="{{$admin->id}}">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                        <label for="projectinput1"> الاسم </label>
                                                        <input type="text" name="name" value="{{$admin->name}}" id="name"class="form-control" >

                                                        @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div> <!-- end of col for name  -->

                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                        <label for="projectinput1"> البريد الاكتروني</label>
                                                        <input type="email" name="email" value="{{$admin->email}}" id="email" class="form-control" >

                                                        @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div> <!-- end of col for email  -->

                                            </div> <!-- end of row  -->

                                            <div class="row">

                                                {{-- <div class="col-md-4">
                                                    <div class="form-group">

                                                        <label for="projectinput1"> رقم السري الحالي </label>
                                                        <input type="password" name="password"  id="password" class="form-control" >

                                                        @error("password")
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div> <!-- end of col for password  --> --}}

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  كلمة المرور الجديده </label>
                                                        <input type="password" value="" id=""
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="password">
                                                        @error("password")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- end of col for password  -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> تاكيد كلمة المرور   </label>
                                                        <input type="password" value="" id=""
                                                               class="form-control"
                                                               placeholder=" "
                                                               name="password_confirmation">
                                                    </div>
                                                </div> <!-- end of col for password_confirmation  -->

                                            </div><!-- end of row  -->

                                        </div> <!-- end of form-body  -->

                                        <div class="form-actions">

                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"> </i> تعديل
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
