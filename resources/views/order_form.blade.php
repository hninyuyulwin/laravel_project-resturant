<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- Datatable -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <h4>Order Form</h4>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order List</a>
                            </li>
                        </ul>
                    </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <!-- Search -->
                        <div class="row">
                            <div class="col-3">
                                <form action="{{route('order.search')}}" method="GET" role="search" class="mb-4">
                                    <div class="d-flex">
                                        <input type="text" name="search" class="form-control m-1" placeholder="Search Dish ...">
                                        <button type="submit" class="btn btn-secondary m-1">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Search End -->
                            <form action="{{route('order.submit')}}" method="post">
                            @csrf
                            <div class="row">
                                @foreach($dishes as $dish)
                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{url('/images/'.$dish->image)}}" class="my-2" width=120 height=120><br>
                                                <label for="">{{$dish->name}}</label><br>    
                                                <input type="number" name="{{$dish->id}}"><br>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <select name="table" class="form-control">
                                    <option value="">Select Table</option>
                                    @foreach($tables as $table)
                                    <option value="{{$table->id}}">{{$table->number}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-success" value="Submit">
                            </form>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <table id="dishes" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Dish Name</th>
                                    <th>Table Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->dish->name}}</td>
                                    <td>{{$order->table_id}}</td>
                                    <td>{{$status[$order->status]}}</td>
                                    <td>
                                    <a href="/order/{{$order->id}}/serve" class="btn btn-primary">Serve</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody> 
                        </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
        

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<!-- Datatable -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>