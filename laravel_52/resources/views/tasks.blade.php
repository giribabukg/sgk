@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			@include('common.errors')
			<div class="panel panel-default">
				<div class="panel-heading">
					Add Task
				</div>
				<div class="panel-body">
					<form action="{{url('/task')}}" method="post" class="form-horizontal">
						{{csrf_field()}}

						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">Task</label>
							<div class="col-sm-6">
								<input name="name" id="task-name" class="form-control" value="{{old('task')}}"/>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Task
								</button>
							</div>
						</div>
					</form>
				</div>
				
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					Tasks Listing
				</div>
				<div class="panel-body">
					@if(count($tasks) > 0)
						<table class="table table-stripped task-table">
							<thead>
								<tr>
									<th>Tasks</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($tasks->all() as $task)
								<tr>
									<td class="table-text"><div>{{$task->name}}</div></td>
									<td>
										<form action="{{url('/task/'.$task->id)}}" method="post">
											{{csrf_field()}}
											{{method_field('DELETE')}}
											<button class="btn btn-danger">
												<i class="fa fa-brn fa-trash"></i>Delete
											</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection