@extends('admin.layouts.masterpage')
        @section('update')
		<div class="container">

			<div class="page-header">
		    	<h1 class="h2"> Update image </h1>
		    </div>

		    		@if(Session::has('success'))
                      <div class="alert-box success">
                      <h2>{!! Session::get('success') !!}</h2>
                      </div>
                    @endif

				<form action="<?PHP echo url('/'); ?>/update" method="post" enctype="multipart/form-data">

					<table class="table table-bordered table-responsive">

						<tr>
							<td><label>Name</label></td>
							<td><input name="name" type="text" value="<?PHP echo $results->name; ?>" ><br/></td>
						</tr>

						<tr>
							<td><label>Image</label></td>
							<td><input type="file" name="image" multiple="multiple" value="<?PHP echo $results->image; ?>"><br></td>
						</tr>

							@if(Session::has('error'))
                                <div class="alert-box error">
                                <h2>{!! Session::get('error') !!}</h2>
                                </div>
                            @endif

						<tr>
							<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
							<input type="hidden" name="id" value="<?php echo $results->id; ?>">
							<td colspan="2"><button name="submit" type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-save"></span> Update
							</button>
						</tr>

					</table>

				</form>

		</div>
  @stop