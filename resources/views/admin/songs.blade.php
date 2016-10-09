@extends('admin.layout.master')
@section('body.content')
<div class="row" ng-app="songApp" ng-controller="songCtrl">
	<div class="col-sm-12">
		<button id="btnAddNew" class="btn btn-success" data-toggle="modal" data-target="#songModal">Add New</button>
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
							<strong>Have some errors:</strong>
							<ul>
							</ul>
						</div>
						<!-- End Display error validation -->
						<form class="form-horizontal" name="form">
							<div class="form-group">
								<div class="col-sm-2">
									<label class="control-label">Song's name:</label>
								</div>
								<div class="col-sm-9">
									<input type="text" ng-model="name_song" name="name_song" class="form-control" required>
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
													<script>
														$('#singerModal .modal-body').load('/templates/get_singer_quick_form.html');
													</script>
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
										Choose category<input type="button" style="display: none;" data-toggle="modal" data-target="#cateModal">
									</label>
									<!-- Categories Modal -->
									<div class="modal fade" id="cateModal" role="dialog">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-body">
													<script>
														$('#cateModal .modal-body').load('/templates/get_cate_quick_form.html');
													</script>
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
									<input type="number" class="form-control" ng-model="year_composed" name="year_composed" min="1950" max="<% currentYear %>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
									<label class="control-label">Lyric:</label>
								</div>
								<div class="col-sm-9">
									<textarea class="form-control" rows="5" id="" ng-model="lyric"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
									<label class="control-label">Audio file:</label>
								</div>
								<div class="col-sm-2">
									<label class="btn btn-default btn-file form-control" ng-show="audioFile == null">
										Upload audio
										<input id="imageFile" type="file" ngf-select ng-model="audioFile" name="audioFile" style="display: none;">
									</label>
									<span ng-show="audioFile != null"> <% audioFile.name %></span>
								</div>
								<div class="col-sm-1">
									<a style="font-size: 125%; text-decoration: none;" class="glyphicon glyphicon-upload" ng-click="uploadAudio(audioFile)" ng-show="audioFile&&!audioFile.result"></a>
								</div>
								<div class="col-sm-1">
									<a style="font-size: 125%; text-decoration: none;" class="glyphicon glyphicon-trash" ng-click="audioFile = null; removeUploadedAudio()" ng-show="audioFile"></a>
								</div>
								<div class="col-sm-4">
									<div class="progress" ng-show="audioFile.progress >= 0">
										<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<%audioFile.progress%>" aria-valuemin="0" aria-valuemax="100" style="width: <%audioFile.progress%>%">
											<span><% audioFile.progress + '%' %></span>
											<span ng-show="audioFile.result">Upload Successful</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
									<label class="control-label">Image file:</label>
								</div>
								<div class="col-sm-2">
									<label class="btn btn-default btn-file form-control" ng-show="imageFile == null">
										Upload image
										<input id="imageFile" type="file" ngf-select ng-model="imageFile" name="imageFile" style="display: none;">
									</label>
									<span ng-show="imageFile != null"> <% imageFile.name %></span>
								</div>
								<div class="col-sm-1">
									<a style="font-size: 125%; text-decoration: none;" class="glyphicon glyphicon-upload" ng-click="uploadImage(imageFile)" ng-show="imageFile&&!imageFile.result"></a>
								</div>
								<div class="col-sm-1">
									<a style="font-size: 125%; text-decoration: none;" class="glyphicon glyphicon-trash" ng-click="imageFile = null; removeUploadedImage()" ng-show="imageFile"></a>
								</div>
								<div class="col-sm-4">
									<div class="progress" ng-show="imageFile.progress >= 0">
										<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<%imageFile.progress%>" aria-valuemin="0" aria-valuemax="100" style="width: <%imageFile.progress%>%">
											<span><% imageFile.progress + '%' %></span>
											<span ng-show="imageFile.result">Upload Successful</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2">
									<label class="control-label"></label>
								</div>
								<div class="col-sm-2" ng-show="imageFile != null">
									<img style="width: 150px; height: 150px;" ngf-thumbnail="imageFile" alt="" id="imgContent">
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" ng-click="uploadSong(audioFile, imageFile)">Insert</button>
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
					<th>Singer</th>
					<th>Category</th>
					<th>Year Composed</th>
				</tr>
			</thead>
			<tbody>
				@foreach($songs as $song)
				<tr>
					<td>{{$song->id}}</td>
					<td>{{$song->name}}</td>
					<td>{{$song->singer}}</td>
					<td>{{$song->cate}}</td>
					<td>{{$song->year_composed}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop