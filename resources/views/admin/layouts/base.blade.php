@include('admin.layouts._partials.head')

<div class="container-scroller">

    @include('admin.layouts._partials.top-nav')

    <div class="container-fluid page-body-wrapper">

        @include('admin.layouts._partials.sidebar-nav')

        <div class="main-panel">

            <div class="content-wrapper">

                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="d-flex justify-content-between flex-wrap">
                            <div class="d-flex align-items-end flex-wrap">
                                <div class="mr-md-3 mr-xl-5 pl-1">
                                    <h2 class="page-title">@yield('page-heading')</h2>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-end flex-wrap">

                                @yield('actions')

                            </div>

                        </div>
                    </div>
                </div>

                @include('admin.layouts._partials.alerts')

                @yield('sections')

            </div>

            @include('admin.layouts._partials.footer')
        </div>

    </div>
</div>

@include('admin.layouts._partials.foot')
