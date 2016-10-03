@extends('admin.layout.master')
@section('body.content')
<div class="row" ng-app="songApp" ng-controller="songCtrl">
	<div class="col-sm-12">
		<button class="btn btn-success" data-toggle="modal" data-target="#songModal">Add New</button>
		<!-- Modal -->
		<div class="modal fade" id="songModal" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add New Song</h4>
					</div>
					<div class="modal-body">
						<!-- Display error validation -->
						<div id="validationError" class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Have some errors:</strong>
							<ul>
							</ul>
						</div>
						<!-- End Display error validation -->
						<form class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-2">
									<label class="control-label">Song's name:</label>
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
									<label class="control-label">Composer:</label>
								</div>
								<div class="col-sm-9">
									<label class="btn btn-default btn-file">
										Choose composer<input type="button" style="display: none;" data-toggle="modal" data-target="#composerModal">
									</label>
									<!-- Composer Modal -->
									<div class="modal fade" id="composerModal" role="dialog">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-body">
													<script>
														$('#composerModal .modal-body').load('/templates/get_composer_quick_form.html');
													</script>
												</div>
											</div>
										</div>
									</div>
									<!-- End Composer Modal -->
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
									<label class="control-label">Singer:</label>
								</div>
								<div class="col-sm-9">
									<label class="btn btn-default btn-file">
										Choose singer<input type="button" style="display: none;" data-toggle="modal" data-target="#singerModal">
									</label>
									<!-- Singer Modal -->
									<div class="modal fade" id="singerModal" role="dialog">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-body">
													<p><a href="#"><span class="glyphicon glyphicon-plus"></span>Add New</a></p>
													<p><a href="#"><span class="glyphicon glyphicon-refresh"></span>Refesh</a></p>
													<div class="checkbox">
														<label><input type="checkbox" value="">Maroon5</label>
													</div>
													<div class="checkbox">
														<label><input type="checkbox" value="">Coldplay</label>
													</div>
													<div class="checkbox">
														<label><input type="checkbox" value="">Eminem</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End Singer Modal -->
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
									<label class="control-label">Category:</label>
								</div>
								<div class="col-sm-9">
									<label class="btn btn-default btn-file">
										Choose category<input type="button" style="display: none;" data-toggle="modal" data-target="#categoriesModal">
									</label>
									<!-- Categories Modal -->
									<div class="modal fade" id="categoriesModal" role="dialog">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-body">
													<p><a href="#"><span class="glyphicon glyphicon-plus"></span>Add New</a></p>
													<p><a href="#"><span class="glyphicon glyphicon-refresh"></span>Refesh</a></p>
													<div class="checkbox">
														<label><input type="checkbox" value="">Pop</label>
													</div>
													<div class="checkbox">
														<label><input type="checkbox" value="">Rock</label>
													</div>
													<div class="checkbox">
														<label><input type="checkbox" value="">Rap</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End Categories Modal -->
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
									<label class="control-label">Year composed:</label>
								</div>
								<div class="col-sm-9">
									<input type="date" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
									<label class="control-label">Description:</label>
								</div>
								<div class="col-sm-9">
									<textarea class="form-control" rows="5" id=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
									<label class="control-label">Audio:</label>
								</div>
								<div class="col-sm-9">
									<label class="btn btn-default btn-file">
										Upload audio<input id="audioFile" name="audioFile" type="file" style="display: none;" onchange="angular.element(this).scope().getAudioFile(this.files)">
									</label>
									<p id="audioFileName"></p>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
									<label class="control-label">Image:</label>
								</div>
								<div class="col-sm-9">
									<label class="btn btn-default btn-file">
										Upload image<input id="imageFile" type="file" style="display: none;" onchange="angular.element(this).scope().getImageFile(this.files)">
									</label>
									<img src="" alt="" id="imgContent">
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" ng-click="storeAudioFile()">Insert</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Modal -->
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Year Composed</th>
					<th>Description</th>
					<th>Path</th>
				</tr>
			</thead>
			<tbody>
				@foreach($songs as $song)
				<tr>
					<td>{{$song->id}}</td>
					<td>{{$song->name}}</td>
					<td>{{$song->year_composed}}</td>
					<td>{{$song->description}}</td>
					<td>{{$song->path}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop