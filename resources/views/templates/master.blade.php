<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title> @yield('title')</title>
		<link href="/{!! url('public/css/bootstrap.min.css') !!}" type="text/css" rel="stylesheet" />
		<link href="/{!! url('public/css/dataTables.bootstrap.min.css') !!}" type="text/css" rel="stylesheet" />
		<link href="/{!! url('public/css/bootstrap-custom.css') !!}" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			@section('content')
			@show
		</div>
		<script
		src="https://code.jquery.com/jquery-3.4.1.js"
		integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
		crossorigin="anonymous"></script>
		<script type="text/javascript" src="/{!! url('public/js/jquery.min.js') !!}"></script>
		<script type="text/javascript" src="/{!! url('public/js/bootstrap.min.js') !!}"></script>
		<script type="text/javascript" src="/{!! url('public/js/jquery.dataTables.min.js') !!}"></script>
		<script type="text/javascript" src="/{!! url('public/js/dataTables.bootstrap.min.js') !!}"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#DataList").DataTable({
					"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tất cả"]],
					"iDisplayLength": 10,
					"oLanguage": {
						"sLengthMenu": "Hiển thị _MENU_ dòng mỗi trang",
						"oPaginate": {
							"sFirst": "<span class='glyphicon glyphicon-step-backward' aria-hidden='true'></span>",
							"sLast": "<span class='glyphicon glyphicon-step-forward' aria-hidden='true'></span>",
							"sNext": "<span class='glyphicon glyphicon-triangle-right' aria-hidden='true'></span>",
							"sPrevious": "<span class='glyphicon glyphicon-triangle-left' aria-hidden='true'></span>"
						},
						"sEmptyTable": "Không có dữ liệu",
						"sSearch": "Tìm kiếm:",
						"sZeroRecords": "Không có dữ liệu",
						"sInfo": "Hiển thị từ _START_ đến _END_ trong tổng số _TOTAL_ dòng được tìm thấy",
						"sInfoEmpty" : "Không tìm thấy",
						"sInfoFiltered": " (trong tổng số _MAX_ dòng)"
					}
				});
			});
		</script>
	</body>
</html>