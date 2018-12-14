@extends('admin.public.common')

@section('main')
	<!-- 内容 -->
	<div class="col-md-10">

		<ol class="breadcrumb">
			<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
			<li><a href="">用户管理</a></li>
			<li class="active">用户列表</li>

			<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
		</ol>

		<!-- 面版 -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除</button>
				<a href="/admin/goods/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加商品</a>
				<p class="pull-right tots" >共有  条数据</p>
				<form action="" class="form-inline pull-right">
					<div class="form-group">
						<input type="text" name="search" class="form-control" placeholder="请输入你要搜索的内容" id="">
					</div>

					<input type="submit" value="搜索" class="btn btn-success">
				</form>


			</div>
			<table class="table-bordered table table-hover">
				<th>ID</th>
				<th>TITLE</th>
				<th>INFO</th>
				<th>IMG</th>
				<th>PRICE</th>
				<TH>操作</TH>
				@foreach($data as $value)
					<tr>
						<td><input type="checkbox" name="" id=""></td>
						<td>{{ $value->id }}</td>
						<td>{{ $value->title }}</td>
						<td>{{ $value->info }}</td>
						<td>
							<img src="/Uploads/goods/{{ $value->img }}" width="200px" alt="">
							<br>
							@foreach($value->tupian as $val)
								<img src="/Uploads/goods/{{ $val->img }}" width="50px" alt="">
							@endforeach
						</td>
						<td>{{ $value->price }}</td>
						<td>{{ $value->num }}</td>
						<td><a href="">修改</a><a href="">删除</a></td>
					</tr>
				@endforeach


			</table>
			<!-- 分页效果 -->
			<div class="panel-footer">
				<nav style="text-align:center;">
					{{ $data->links() }}
				</nav>
			</div>
		</div>
	</div>

@endsection