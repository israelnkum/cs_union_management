@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card card-statistics">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="d-flex justify-content-between border-right card-statistics-item">
                                <div>
                                    <h1>28893</h1>
                                    <p class="text-muted mb-0">Total invoices</p>
                                </div>
                                <i class="icon-layers text-primary icon-lg"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="d-flex justify-content-between border-right card-statistics-item">
                                <div>
                                    <h1>217</h1>
                                    <p class="text-muted mb-0">New users</p>
                                </div>
                                <i class="icon-people text-primary icon-lg"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="d-flex justify-content-between border-right card-statistics-item">
                                <div>
                                    <h1>6875</h1>
                                    <p class="text-muted mb-0">Unique visits</p>
                                </div>
                                <i class="icon-pin text-primary icon-lg"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="d-flex justify-content-between card-statistics-item">
                                <div>
                                    <h1>45596</h1>
                                    <p class="text-muted mb-0">Sales</p>
                                </div>
                                <i class="icon-refresh text-primary icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Earning Report</h4>
                    <div class="w-75 mx-auto">
                        <canvas id="earning-report" width="100" height="100"></canvas>
                    </div>
                    <div class="py-4 d-flex justify-content-center align-items-end">
                        <h1 class="text-center text-md-left mb-0">1.2M</h1>
                        <p class="text-muted mb-0 ml-2">Total</p>
                    </div>
                    <div id="earning-report-legend" class="earning-report-legend"></div>
                </div>
            </div>
        </div>
        <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
                <div class="row h-100">
                    <div class="col-md-5 border-right">
                        <div class="card-body">
                            <h4 class="card-title">Performance</h4>
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>
                                        <h6>Tasks</h6>
                                        <p class="text-muted mb-0">5.6% change today</p>
                                    </td>
                                    <td>
                                        <h3 class="text-primary">
                                            +20009
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Member Profit</h6>
                                        <p class="text-muted mb-0">3 days ago</p>
                                    </td>
                                    <td>
                                        <h3 class="text-danger">
                                            +91964
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Orders</h6>
                                        <p class="text-muted mb-0">Weekly Orders</p>
                                    </td>
                                    <td>
                                        <h3 class="text-success">
                                            -200
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Pending</h6>
                                        <p class="text-muted mb-0">Pending Tasks</p>
                                    </td>
                                    <td>
                                        <h3 class="text-warning">
                                            +5152
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Revenue</h6>
                                        <p class="text-muted mb-0">5% increase</p>
                                    </td>
                                    <td>
                                        <h3 class="text-primary">
                                            +89997
                                        </h3>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body d-flex flex-column h-100">
                            <div class="d-flex flex-row">
                                <h4 class="card-title">Year-wise performance</h4>
                            </div>
                            <p>Performance of the team is 75% higher this year!</p>
                            <canvas id="chart-activity" class="mt-auto"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Open invoices</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Invoice</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="disc bg-secondary"></div>
                            </td>
                            <td>
                                <h4 class="text-primary font-weight-normal">490-525-4779</h4>
                                <p class="text-muted mb-0">Online sale</p>
                            </td>
                            <td>
                                $41991
                            </td>
                            <td>
                                <p>27 Sep 2018</p>
                                <p class="text-muted mb-0">3 days ago</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="disc bg-secondary"></div>
                            </td>
                            <td>
                                <h4 class="text-primary font-weight-normal">490-525-4780</h4>
                                <p class="text-muted mb-0">Online sale</p>
                            </td>
                            <td>
                                $65789
                            </td>
                            <td>
                                <p>27 Sep 2018</p>
                                <p class="text-muted mb-0">2 days ago</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="disc bg-secondary"></div>
                            </td>
                            <td>
                                <h4 class="text-primary font-weight-normal">490-525-4781</h4>
                                <p class="text-muted mb-0">Offline sale</p>
                            </td>
                            <td>
                                $98076
                            </td>
                            <td>
                                <p>27 Sep 2018</p>
                                <p class="text-muted mb-0">4 days ago</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="disc bg-secondary"></div>
                            </td>
                            <td>
                                <h4 class="text-primary font-weight-normal">490-525-4782</h4>
                                <p class="text-muted mb-0">Online sale</p>
                            </td>
                            <td>
                                $67589
                            </td>
                            <td>
                                <p>27 Sep 2018</p>
                                <p class="text-muted mb-0">1 day ago</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="card-title">Revenue</h4>
                        <h1>20009</h1>
                        <p class="text-muted">5.6% change today</p>
                    </div>
                    <canvas id="sales-chart" class="mt-auto"></canvas>
                </div>
            </div>
        </div>
    </div>
    <form class="needs-validation" novalidate method="POST" action="{{route('levels.store')}}">
        @csrf
        <div class="form-group row">
            <input type="text"  placeholder="Level Name" class="form-control">
            <div class="invalid-feedback">
                Level Name required
            </div>
        </div>
        <div class="form-group row">
            <input type="number" placeholder="Amount Paying"  class="form-control">
            <div class="invalid-feedback">
                Amount required
            </div>
        </div>
        <button class="btn btn-outline-primary" type="submit">Add Level</button>
    </form>
@endsection
