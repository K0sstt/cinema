<div class="row">
	<div class="col-4"></div>
	<div class="col-4">
		<a class="btn btn-lg btn-block btn-outline-secondary mt-3 text-uppercase font-weight-bold" href="/">Back</a>
	</div>
	<div class="col-4"></div>
</div>
<div class="row">
	<div class="col-3 mt-4">
		<div id="<?php echo $film['id']; ?>" class="card text-center">
			<div class="card-body">
				<h5 class="card-title"><?php echo $film['title']; ?></h5>
				<p class="card-text"><?php echo $film['year']; ?></p>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-<?php echo $film['id'] ?>">
					More
				</button>
			</div>
		</div>

		<div class="modal fade" id="modal-<?php echo $film['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-<?php echo $film['id'] ?>-Label" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modal-<?php echo $film['id'] ?>-Label">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="edit" method="post">
						<div class="modal-body">
							<div class="form-group">
								<input type="number" value="<?php echo $film['id'] ?>" name="film_id" hidden>
								<label for="title">Title</label>
								<input type="text" class="form-control" id="title" name="film" value="<?php echo $film['title'] ?>">
							</div>
							<div class="form-group">
								<label for="year">Year</label>
								<input type="text" class="form-control" id="year" name="year" value="<?php echo $film['year'] ?>">
							</div>
							<div class="form-group">
								<label for="format">Format</label>
								<select name="format_id" id="format" class="custom-select">
									<?php foreach($formats as $format): ?>
										<?php if($format['format'] == $film['format']): ?>
											<option value="<?php echo $format['id'] ?>" selected><?php echo $format['format'] ?></option>
											<?php continue; ?>
										<?php endif; ?>
										<option value="<?php echo $format['id'] ?>"><?php echo $format['format'] ?></option>
									<?php endforeach; ?>
								</select>
								<!-- <input type="text" class="form-control" id="format" value="<?php echo $film['format'] ?>"> -->
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col">
										<p>First name</p>
									</div>
									<div class="col">
										<p>Last name</p>
									</div>
								</div>
								<?php foreach($actors as $actor): ?>
									<?php if($film['title'] == $actor['title']): ?>
										<div class="row mt-2">
											<input type="number" value="<?php echo $actor['id'] ?>" name="actor_id_<?php echo $actor['id'] ?>" hidden>
											<div class="col">
												<input type="text" class="form-control" name="first_name_<?php echo $actor['id'] ?>" value="<?php echo $actor['first_name'] ?>">
											</div>
											<div class="col">
												<input type="text" class="form-control" name="last_name_<?php echo $actor['id'] ?>" value="<?php echo $actor['last_name'] ?>">
											</div>
										</div>
										<div class="row">
											<div class="col-6 offset-3">
												<input type="number" value="<?php echo $actor['id'] ?>" name="delete_actor" hidden>
												<button type="submit" class="btn btn-sm btn-block btn-outline-danger mr-auto m-1" name="button" value="delete_actor">Delete</button>
											</div>
										</div>
										<hr>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
							<div class="form-group">
								<h3 class="text-center">New actor</h3>
								<div class="row">
									<div class="col">
										<p>First name</p>
									</div>
									<div class="col">
										<p>Last name</p>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col">
										<input type="text" class="form-control" name="new_first_name" >
									</div>
									<div class="col">
										<input type="text" class="form-control" name="new_last_name">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<div class="container">
								<div class="d-flex">
									<button type="submit" class="btn btn-danger mr-auto m-1" name="button" value="delete">Delete</button>
									<button type="button" class="btn btn-secondary m-1" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary m-1" name="button" value="update">Save changes</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>