@include('admin.layouts.top')
@include('admin.layouts.sidebar')
@include('admin.layouts.menu')

<div class="container-fluid">
@yield('content')
</div>
</div>

@include('admin.layouts.bottom')