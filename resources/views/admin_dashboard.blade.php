<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>List</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		<!--
		.heading11 {  FONT-SIZE: 30px; COLOR: #0a2892; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
		}
		-->
		.pagination {
			border-radius: 4px;
			display: inline-block;
			margin: 20px 0;
			padding-left: 0;
		}
		.pagination > li:first-child > a, .pagination > li:first-child > span {
			border-bottom-left-radius: 4px;
			border-top-left-radius: 4px;
			margin-left: 0;
			color:#B5533E;
		}
		.pagination > li > a, .pagination > li > span {
			background-color: #fff;
			border: 1px solid #ddd;
			color: #337ab7;
			float: left;
			line-height: 1.42857;
			margin-left: -1px;
			padding: 6px 12px;
			position: relative;
			text-decoration: none;
		}
		.pagination > li {
			display: inline;
		}
		.pagination a {
			text-decoration: none !important;
		}
		.pagination > li:last-child > a, .pagination > li:last-child > span {
			border-bottom-right-radius: 4px;
			border-top-right-radius: 4px;
		}
		.color{
			font-size: 12px;
			color: #A75314;
		}
		table.dataTable.table-striped>tbody>tr:nth-of-type(2n+1) {
			background-color: #fff!important;
		}
		table.dataTable>tbody>tr{
			background-color: #fff!important;
		}
		thead {
			background: #fff3d7!important;
		}
		table.dataTable>tbody>tr odd{
			background-color: #fff!important;
		}
		table.dataTable.table-striped>tbody>tr.odd>* {
			box-shadow: none!important; 
		}
	</style>
</head>
<body bgcolor="#FFF8E8" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
	<!--title START-->
	<table width="100%"  border="0" cellspacing="10" cellpadding="5" align="center">
		<tr>
			<td align="center" valign="middle" bgcolor="#FFF3D7" style="border-bottom: 1px solid #FFE29F;"><B><SPAN 
				class=heading11>Sample Test Project </SPAN><SPAN class=heading2></SPAN><BR>
			</B></td>
		</tr>
	</table>
	<!--title END-->
	<!--body START-->
	<tr>
		<h4 align="right"><a href="{{route('User_Create')}}" onclick= "return confirm('Are you sure you want to Create?');"class="color">ADD NEW RECORD</a></h4>
	</tr>
	
	<td colspan="2">
		@if (Session::has('success'))
		<div class="alert alert-success">
			<ul>
				<li>{{ Session::get('success') }}</li>
			</ul>
		</div>
		@endif
		@if (Session::has('massage'))
		<div class="alert alert-info">
			<ul>
				<li>{{ Session::get('massage') }}</li>
			</ul>
		</div>
		@endif
		@if (Session::has('delete_massage'))
		<div class="alert alert-danger">
			<ul>
				<li>{{ Session::get('delete_massage') }}</li>
			</ul>
		</div>
		@endif

		<form action="{{route('admin.route')}}" method="get">

			<input type="text" name="userName" placeholder="Search name">
			<input type="text" name="emailAddress"placeholder="Search Email">
			<button type="submit" class="btn btn-success btn-sm">Search</button>
		</form>
		<form action="{{route('admin.route')}}" method="get">

			<input type="hidden" name="all">
			
			<button type="submit" class="btn btn-success btn-sm">ALL Data </button>
		</form>


		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>

				<tr>
					<th>S.No</th>
					<th>userName</th>
					<th>password </th>
					<th>emailAddress</th>
					<th>Preferences </th>
					<th>Profile_img</th>
					<th width="280px">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $key=>$user)
				<tr>
					<td>{{++$key}}</td>
					<td>{{ @$user->userName }}</td>
					<td>{{ @$user->password }}</td>
					<td>{{ @$user->emailAddress }}</td>
					<td>{{ @$user->preferenceName }}</td>
					<td><img src="{{ asset('/images/'.@$user->Profile_img) }}" alt="job image" style="height: 30;width: 30px;" ></td>
					<td><a class="btn btn-primary"  onclick= "return confirm('Are you sure you want to Edit?');" href="{{ route('user_edit',$user->id) }}">Edit</a>
						<a class="btn btn-danger" onclick= "return confirm('Are you sure you want to Delete?');" href="{{ route('user_delete',$user->id) }}">Delete</a>
					</td>

				</tr>
				@endforeach
			</tbody>
			
		</table>
		
		<!--body END-->
		<!--bottom START-->
		<table width="100%"  border="0" cellspacing="10" cellpadding="5" align="center">
			<TR vAlign=bottom align=left>
				<TD colSpan=3 height=40><SPAN class=heading4>© Sample project </SPAN><SPAN class=heading3><B></B></SPAN></TD>
			</TR>
		</table>
		<!--bottom END-->
	</body>
	<script>$(document).ready(function () {
		$('#example').DataTable();
	});</script>
	<script>
		setTimeout(function () {
			$('.alert').fadeOut('slow', function () {
				$(this).remove();

			});
		}, 2000);
	</script>

	</html>
