@extends('layouts.dashboard')

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Ecommerce</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item ">Dashboard</li>
            <li class="breadcrumb-item active">Ecommerce</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
            <a >
                <div class="card border-3 border-top border-top-success">
                    <div class="card-body">
                        @php
                            $orders_price = 0;
                            foreach ($orders_list as $order) {
                                // $total_order = $order->quantity*$order->total;
                                $orders_price += $order->total;
                            }
                            @endphp
                        <h5>Total Revenue</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">৳ {{ $orders_price }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
            <a>
                <div class="card border-3 border-top border-top-success">
                    <div class="card-body">
                        <h5 class="text-info">Total Staff</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $users_count }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
            <a href="{{ route('orders.list') }}">
                <div class="card border-3 border-top border-top-success">
                    <div class="card-body">
                        <h5 class="text-info">Total Order</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $orders_count }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
            <a href="{{ route('product.list') }}">
                <div class="card border-3 border-top border-top-success">
                    <div class="card-body">
                        <h5 class="text-info">Total Product</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $products_count }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
            <a href="{{ route('orders.list.status', 1) }}">
                <div class="card border-3 border-top border-top-success">
                    <div class="card-body">
                        <h5 class="text-info">Total Hold</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $total_processing }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
            <a href="{{ route('orders.list.status', 3) }}">
                <div class="card border-3 border-top border-top-success">
                    <div class="card-body">
                        <h5 class="text-info">Total Pending Payment</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $total_pending }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div> 
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
            <a href="{{ route('orders.list.status', 0) }}">
                <div class="card border-3 border-top border-top-success">
                    <div class="card-body">
                        <h5 class="text-info">Total Processing</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $total_hold }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div> 
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
            <a href="{{ route('orders.list.status', 4) }}">
                <div class="card border-3 border-top border-top-success">
                    <div class="card-body">
                        <h5 class="text-info">Total Canceled</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $total_cancel }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
            <a href="{{ route('orders.list.status', 2) }}">
                <div class="card border-3 border-top border-top-success">
                    <div class="card-body">
                        <h5 class="text-info">Total Completed</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $total_completed }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
            <a href="{{ route('orders.list.status', 5) }}">
                <div class="card border-3 border-top border-top-success">
                    <div class="card-body">
                        <h5 class="text-info">Total On Delevary</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $total_ondelevary }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-md-4 mb-3">
            <a href="{{ route('orders.list.status', 6) }}">
                <div class="card border-3 border-top border-top-success">
                    <div class="card-body">
                        <h5 class="text-info">Pending Invoice</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $total_pendinginvoice }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div> 
    </div>
    <div class="row">

        <!-- Data card 8 Start -->
        <div class="col-xl-8 col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Recent Orders</h5>
                <div class="table-responsive">
                    <table class="table table-hover table-borderless">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>C. Name</th>
                                <th>C. Phone</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders_list->take(5) as $sl=>$orders)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $orders->created_at->format('d M') }}</td>
                                <td>{{ $orders->rel_to_billing->customer_name }}</td>
                                <td>{{ $orders->rel_to_billing->customer_phone }}</td>
                                <td>{{ $orders->created_at->format('d-M-Y') }}</td>
                                <td>
                                    <label class="label label-warning">
                                        @if ($orders->status == 0)
                                            <div class="badge badge-info">Processing</div>
                                        @elseif ($orders->status == 1)
                                            <div class="badge badge-primary">On Hold</div>
                                        @elseif ($orders->status == 2)
                                            <div class="badge badge-success">Completed</div>
                                        @elseif ($orders->status == 3)
                                            <div class="badge badge-warning">Pending Payment</div>
                                        @elseif ($orders->status == 5)
                                            <div class="badge badge-default">On Delivary</div>
                                        @elseif ($orders->status == 6)
                                            <div class="badge badge-dark">Pending Invoice</div>
                                        @else
                                            <div class="badge badge-danger">Canceled</div>
                                        @endif
                                    </label>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <h5 class="card-header">Today's Report</h5>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>Orders</th>
                            <td>{{ $todayOrders }}</td>
                        </tr>
                        @foreach($statusCounts as $status => $count)
                            <tr>
                                <th>{{ ucfirst($status) }}</th>
                                <td>{{ $count }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function buildchart() {
    $(function() {
        var graph = Morris.Donut({
            element: 'chart-pie-moris',
            data: [{
                    value: {{ $total_processing  }},
                    label: 'Order'
                },
                {
                    value: {{ $products_count }},
                    label: 'Stock'
                },
                {
                    value: {{ $orders_count }},
                    label: 'Total Order'
                },
                {
                    value: {{ $users_count }},
                    label: 'User'
                }
            ],
            colors: ['#ff4a00', '#FF4961', '#62d493', '#f4ab55'],
            resize: true,
            formatter: function(x) {
                return x + " %"
            }
        });
        //Flot Base Build Option for bottom join
        var options_bt = {
            legend: {
                show: false
            },
            series: {
                label: "",
                shadowSize: 0,
                curvedLines: {
                    active: true,
                    nrSplinePoints: 20
                },
            },
            tooltip: {
                show: true,
                content: "x : %x | y : %y"
            },
            grid: {
                hoverable: true,
                borderWidth: 0,
                labelMargin: 0,
                axisMargin: 0,
                minBorderMargin: 0,
                margin: {
                    top: 5,
                    left: 0,
                    bottom: 0,
                    right: 0,
                }
            },
            yaxis: {
                min: 0,
                max: 30,
                color: 'transparent',
                font: {
                    size: 0,
                }
            },
            xaxis: {
                color: 'transparent',
                font: {
                    size: 0,
                }
            }
        };

        //Flot Base Build Option for Center card
        var options_ct = {
            legend: {
                show: false
            },
            series: {
                label: "",
                shadowSize: 0,
                curvedLines: {
                    active: true,
                    nrSplinePoints: 20
                },
            },
            tooltip: {
                show: true,
                content: "x : %x | y : %y"
            },
            grid: {
                hoverable: true,
                borderWidth: 0,
                labelMargin: 0,
                axisMargin: 0,
                minBorderMargin: 5,
                margin: {
                    top: 8,
                    left: 8,
                    bottom: 8,
                    right: 8,
                }
            },
            yaxis: {
                min: 0,
                max: 30,
                color: 'transparent',
                font: {
                    size: 0,
                }
            },
            xaxis: {
                color: 'transparent',
                font: {
                    size: 0,
                }
            }
        };
        //Flot Ecommerce Chart Start
        $.plot($("#ecom-chart-1"), [{
            data: [
                [0, 30],
                [1, 5],
                [2, 26],
                [3, 10],
                [4, 22],
                [5, 30],
                [6, 5],
                [7, 26],
                [8, 10],
            ],
            color: "#ff4a00",
            lines: {
                show: true,
                fill: false,
                lineWidth: 3
            },
            points: {
                show: true,
                radius: 4,
                fillColor: "#fff",
                fill: true,
            },
            curvedLines: {
                apply: false,
            }
        }], options_ct);

        $.plot($("#ecom-chart-3"), [{
            data: [
                [0, 30],
                [1, 5],
                [2, 26],
                [3, 10],
                [4, 22],
                [5, 30],
                [6, 5],
                [7, 26],
                [8, 10],
            ],
            color: "#FF4961",
            lines: {
                show: true,
                fill: false,
                lineWidth: 3
            },
            points: {
                show: true,
                radius: 4,
                fillColor: "#fff",
                fill: true,
            },
            curvedLines: {
                apply: false,
            }
        }], options_ct);
    });
}
</script>
