@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            PTY shoes
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Bills</a></li>
            <li class="active">List</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="margin-top: 25px;">
                        <h3 class="box-title" style="margin-left: 400PX; font-size: 200%; color: #FF0000;">DANH SÁCH ĐƠN HÀNG</h3>
                    </div>
                    <form action="{{asset('/shoes/admin/bills/timkiem')}}" method="get" class="search">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                        <div class="input-group" style="width: 260px; margin-left: 800px; background: silver">
                        <input type="text" name="key" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>             
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @elseif (Session()->has('flash_level'))
                            <div class="alert alert-success">
                                <ul>
                                    {!! Session::get('flash_massage') !!}   
                                </ul>
                            </div>
                        @endif
                    <div class="box-body">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên khách hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Ngày đặt</th>
                                    <th>Total</th>
                                    <th>Trạng thái</th>
                                    <th>Chi tiết</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $i =>$row)
                                <tr style="height: 50px;">
                                    <td>{{$i}}</td>
                                    <td>{{$row->customer_name}}</td>
                                    <td>{{$row->address}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>{{$row->total}} VNĐ</td>
                                    <td>
                                        @if($row->status ==0)
                                            <span style="color:#d35400;">Chưa xác nhận</span>
                                        @else
                                            <span style="color:#27ae60;"> Đã xác nhận</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="{!!url('shoes/admin/bills/detail/'.$row->id)!!}" title="Chi tiết"><i class="fa fa-info-circle" aria-hidden="true"></i>  </a> &nbsp;
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="{!!url('shoes/admin/bills/del/'.$row->id)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="padding-left: 925px;">{!! $data->render() !!}</div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
	<script src="admin_asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="admin_asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script>
    	$(function () {
    	$('#example1').DataTable()
    	$('#example2').DataTable({
    	'paging'      : true,
    	'lengthChange': false,
    	'searching'   : false,
    	'ordering'    : true,
    	'info'        : true,
    	'autoWidth'   : false
    	})
    	})
    </script>
@endsection