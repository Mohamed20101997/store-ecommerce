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
                    <li class="active"><a class="menu-item" href="{{route('category.index')}}"
                            data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('category.create')}}" data-i18n="nav.dash.crypto">أضافة قسم
                            جديد </a>
                    </li>
                </ul>
            </li>

            {{--  <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام الفرعية   </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">400</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href=""
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="" data-i18n="nav.dash.crypto">أضافة
                            قسم فرعي جديد </a>
                    </li>
                </ul>
            </li>  --}} {{--i will do it--}}

            <li class="nav-item">
                <a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الماركات التجارية  </span>
                    <span class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Brand::count()}} </span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('brands.index')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('brands.create')}}" data-i18n="nav.dash.crypto">أضافة ماركة جديده </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> العلامات tags  </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Tag::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('tags.index')}}"
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
                    <li class="active"><a class="menu-item" href="{{route('products.index')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('products.create')}}" data-i18n="nav.dash.crypto">أضافة
                        </a>
                    </li>
                </ul>
            </li>



        </ul>
    </div>
</div>
