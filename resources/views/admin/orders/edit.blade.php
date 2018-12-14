@extends('admin.public.common')

@section('main')
	<!-- 内容 -->
	<div class="col-md-10">

		<ol class="breadcrumb">
			<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
			<li><a href="">订单管理</a></li>
			<li class="active">订单列表</li>

			<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
		</ol>

		<!-- 面版 -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<button class="btn btn-danger">订单展示</button>
				<p class="pull-right tots" >共有  条数据</p>
				<form action="" class="form-inline pull-right">
					<div class="form-group">
						<input type="text" name="search" class="form-control" placeholder="请输入你要搜索的内容" id="">
					</div>

					<input type="submit" value="搜索" class="btn btn-success">
				</form>


			</div>

			<div class="panel-body">
				<form action="" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<lable for="">订单号</lable>
						<input class="form-control" type="text" name="" value="{{$_GET['code']}}" id="">
					</div>

					<div class="form-group">
						<lable for="">订单号</lable>
						<select name="sid" id="" class="form-control">
							@foreach($data as $value)
								@if($_GET['sid']==$value->id)
									<option selected value="{{$value->id}}">{{$value->name}}</option>
								@else
									<option value="{{$value->id}}">{{$value->name}}</option>

								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="提交">
					</div>
				</form>
			</div>

			<!-- 分页效果 -->
			<div class="panel-footer">


			</div>
		</div>
	</div>

@endsection