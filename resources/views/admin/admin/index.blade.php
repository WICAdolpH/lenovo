@extends("admin.public.common")
@section("main")
<!-- 内容 -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="#">管理员管理</a></li>
		<li class="active">管理员列表</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除</button>
			<a href="javascript:;" data-toggle="modal" data-target="#add"  class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加管理员</a>

			<p class="pull-right tots" >共有 <span id="tot">{{ $tot }}</span> 条数据</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
				</div>

				<input type="submit" value="搜索" class="btn btn-success">
			</form>


		</div>
		<table class="table-bordered table table-hover">
			<th><input type="checkbox" name="" id=""></th>
			<th>ID</th>
			<th>NAME</th>

			<th>上次登录时间</th>
			<th>状态</th>
			<th>操作</th>
			@foreach($data as $value)
			<tr>
				<td><input type="checkbox" name="" id=""></td>
				<td>{{$value->id}}</td>
				<td>{{$value->name}}</td>

				<td>{{ date("Y-m-d H:i:s",$value->time) }}</td>
				@if($value->status)
					<td><span class="btn btn-danger"  onclick="status(this,'{{$value->id}}',1)">禁止</span></td>
				@else
					<td><span class="btn btn-success" onclick="status(this,'{{$value->id}}',0)">开启</span></td>
				@endif
				<td><a href="javascript:;" class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#edit" onclick="edit({{$value->id}})"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="glyphicon glyphicon-trash" onclick="deletes(this,{{$value->id}})"></a></td>
			</tr>
			@endforeach



		</table>
		<!-- 分页效果 -->
		<div class="panel-footer">
			{{ $data->links() }}

		</div>
	</div>
</div>
<!-- 添加管理员的摸态框 -->
<div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">添加管理员</h4>
			</div>
			<div class="modal-body">
				<form action="" onsubmit="return false;" id="formAdd">
					<div class="form-group">
						<label for="">用户名</label>
						<input type="text" name="name" class="form-control" placeholder="请输入用户名" id="name">
						<div id="userInfo">

						</div>
					</div>
					<div class="form-group">
						<label for="">新密码</label>
						<input type="password" name="pass" class="form-control" placeholder="请输入新密码" id="pass">
						<div id="passInfo">

						</div>
					</div>
					<div class="form-group">
						<label for="">确认密码</label>
						<input type="password" name="repass" class="form-control" placeholder="请再次输入密码" id="repass">
					</div>
					<div class="form-group ">
						<lable for="">状态</lable>
						<br>
						<input type="radio" name="status" value="0" id="" checked>正常
						<input type="radio" name="status" value="1" id="">禁用
					</div>
					<div class="form-group pull-right">
						<input type="submit" value="提交" onclick="add()" class="btn btn-success">
						<input type="reset" id="reset" value="重置" class="btn btn-danger">
					</div>


					<div style="clear:both"></div>
				</form>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- 修改管理员的摸态框 -->
<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">添加管理员</h4>
			</div>
			<div class="modal-body" id="body">

			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
	//ajax无刷新添加内容
	function add(){
	    var str=$("#formAdd").serialize();
	    //提交到下一个页面
		$.post('/admin/admin',{str:str,'_token':'{{csrf_token()}}'},function(data){
			if(data == 1){
			    //关闭弹框
			    $(".close").click();
			    //重置表单内容
			    $("#reset").click();

                // 清空提示信息

                $("#passInfo").html('');
                $("#nameInfo").html('');

                window.location.reload();
			}else if(data){
                // 用户名提示信息
                var str='';
                if (data.name) {
                    str="<div class='alert alert-danger'>"+data.name+"</div>";
                }else{
                    str="<div class='alert alert-success'>√</div>";
                }

                $("#userInfo").html(str);

                // 密码提示信息

                if (data.pass) {
                    str="<div class='alert alert-danger'>"+data.pass+"</div>";
                }else{
                    str="<div class='alert alert-success'>√</div>";
                }

                $("#passInfo").html(str);


            }else{
                alert('添加失败');
            }
		});
	}
	//ajax无刷新删除内容
	function deletes(obj,id) {

        $.post("/admin/admin/"+id,{"_token":'{{csrf_token()}}',"_method":"delete"},function(data){
		    //判断是否成功

            if(data == 1) {
			    //移除数据
				$(obj).parent().parent().remove();
				//数量计算
				tot = Number($("#tot").html());
				$("#tot").html(--tot);
            }else {
			    alert(data);
            }
		});
    }
    //无刷新修改status状态
	function status(obj,id,status){
	    if(status) {
	        $.post("/admin/admin/ajaxStatus",{id:id,"_token":'{{csrf_token()}}','_method':"post","status":"0"},function(data){
                if (data==1) {
                    $(obj).parent().html('<td><span class="btn btn-success" onclick="status(this,'+id+',0)">正常</span></td>')
                }else{
                    alert('修改失败');
                }
			})
		}else{
            $.post("/admin/admin/ajaxStatus",{id:id,"_token":'{{csrf_token()}}','_method':"post","status":"1"},function(data){
                if (data==1) {
                    $(obj).parent().html('<td><span class="btn btn-danger" onclick="status(this,'+id+',1)">禁用</span></td>')
                }else{

                    alert('修改失败');
                }
            })
		}
	}
	//无刷新修改
	function edit(id) {
		$.get("/admin/admin/"+id+"/edit",{"_token":"{{csrf_token()}}","_method":"get"},function (data) {
            if(data){
                $('#body').html(data);
            }
        })
    }
    //ajax无刷新修改数据
	function save(){
	    //表单序列化
        str=$("#formEdit").serialize();
        // 提交到下一个页面

        $.post("/admin/admin/1",{str:str,"_method":'put','_token':'{{csrf_token()}}'},function(data){

            // 判断data
            if (data==1) {

                window.location.reload();

            }else if(data){


                // 密码提示信息

                if (data.pass) {
                    str="<div class='alert alert-danger'>"+data.pass+"</div>";
                }else{
                    str="<div class='alert alert-success'>√</div>";
                }

                $("#passInfo1").html(str);



            }else{
                alert('添加失败');
            }
        });
	}
</script>
@endsection