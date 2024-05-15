<div class="main-panel">
    <div class="content-wrapper">


        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card-body py-0 px-0 px-sm-3">
                        @if (session()->has('message'))
                            <div class="alert alert-success" style="margin-top: 8px;">

                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                {{ session()->get('message') }}

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $homes->count() }}</h3>

                                </div>
                            </div>

                        </div>
                        <h6 class="text-muted font-weight-normal" style="padding-top: 15px">Total Homes</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $tenants->count() }}</h3>

                                </div>
                            </div>

                        </div>
                        <h6 class="text-muted font-weight-normal" style="padding-top: 15px">Total Tenants</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $pend_app->count() }}</h3>

                                </div>
                            </div>

                        </div>
                        <h6 class="text-muted font-weight-normal" style="padding-top: 15px">Pending Applications</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $pend_apt->count() }}</h3>

                                </div>
                            </div>

                        </div>
                        <h6 class="text-muted font-weight-normal" style="padding-top: 15px">Pending Appointments</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Revenue</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">KES {{ $totalRevenue }}</h2>

                                </div>

                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © venpic.com
                2023</span>

        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
