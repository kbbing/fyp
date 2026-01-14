<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">
    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="{{ url('/') }}">
            Warewox
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ url('/') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                Dashboard
            </a>
        </li>
        
        
         <li class="c-sidebar-nav-item">
            <a href="{{ route('product.index') }}" class="c-sidebar-nav-link">
                <i class="fa-fw fab fa-product-hunt c-sidebar-nav-icon"></i>
                Product
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route('category.index') }}" class="c-sidebar-nav-link">
                <i class="fa-fw fas fa-layer-group c-sidebar-nav-icon"></i>
                Category
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route('report.index') }}" class="c-sidebar-nav-link">
                <i class="fa-solid fa-bars-staggered c-sidebar-nav-icon"></i>
                Movement
            </a>
        </li>
        
    </ul>
</div>
