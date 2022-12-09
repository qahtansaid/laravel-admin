<aside id="sidebar" class="sidebar">

    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ Admin::user()->avatar }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Admin::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('admin.online') }}</a>
        </div>
    </div>

    <ul class="sidebar-nav" id="sidebar-nav">

        {{-- <li class="header">{{ trans('admin.menu') }}</li> --}}

        @each('admin::partials.menu', Admin::menu(), 'item')

      

    </ul>

</aside>