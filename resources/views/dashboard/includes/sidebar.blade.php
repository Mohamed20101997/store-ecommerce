<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('admin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام الرئيسيه </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Category::parent()->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('category.index')}}"
                           data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('category.create')}}" data-i18n="nav.dash.crypto">أضافة قسم
                            جديد </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الماركات التجارية  </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Brand::count()}} </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('brands.index')}}" data-i18n="nav.dash.ecommerce"> عرض
                            الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('brands.create')}}" data-i18n="nav.dash.crypto">أضافة ماركة
                            جديده </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> العلامات tags  </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Tag::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('tags.index')}}"
                           data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('tags.create')}}" data-i18n="nav.dash.crypto">أضافة
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> المنتجات </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Product::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('products.index')}}"
                           data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('products.create')}}" data-i18n="nav.dash.crypto">أضافة
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الخصائص </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Attribute::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('attributes.index')}}" data-i18n="nav.dash.ecommerce"> عرض
                            الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('attributes.create')}}" data-i18n="nav.dash.crypto">أضافة
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">قيم الخصائص </span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('options.index')}}"  data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('options.create')}}" data-i18n="nav.dash.crypto">أاضافة جديدة </a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="la la-television">

                    </i><span class="menu-title" data-i18n="nav.templates.main">Settings</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main">shipping methods </a>
                        <ul class="menu-content">
                            <li>
                                <a class="menu-item" href="{{route('edit.shipping.methods','free')}}"
                                   data-i18n="nav.templates.vert.classic_menu">توصيل مجاني </a>
                            </li>
                            <li>
                                <a class="menu-item" href="{{route('edit.shipping.methods','inner')}}"> توصيل داخلي </a>
                            </li>
                            <li>
                                <a class="menu-item" href="{{route('edit.shipping.methods','outer')}}"
                                   data-i18n="nav.templates.vert.compact_menu"> توصيل خارجي </a>
                            </li>
                        </ul>
                    </li>

                    {{--                    <li><a class="menu-item" href="#"--}}
                    {{--                           data-i18n="nav.templates.vert.main"> {{__('admin/sidebar.main slider')}} </a>--}}
                    {{--                        <ul class="menu-content">--}}
                    {{--                            <li><a class="menu-item" href="{{route('admin.sliders.create')}}"--}}
                    {{--                                   data-i18n="nav.templates.vert.classic_menu">صور الاسليدر </a>--}}
                    {{--                            </li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}

                </ul>
            </li>


        </ul>
    </div>
</div>

