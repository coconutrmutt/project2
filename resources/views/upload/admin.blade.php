@extends('admin.layouts.masterpage')
@section('admin')
    <div class="container">

            <div class="page-header">
                <h1 class="h2"> View ImageEdit </h1>
            </div>

            <br/>

        <div class="row">
            <?php foreach ($results as $row)  { ?>

              
                <div class="col-xs-6">
                  <p class="page-header"><?php echo $row->name ?></p>
                    <img src="{{ asset($row->image) }}"  width='150' height='150'></a>
                  <p class="page-header">
                  
                  <span>
                    <a class="btn btn-info" href="<?php echo url('formupdate'); ?>/<?php echo $row->id ?>">
                      <span class="glyphicon glyphicon-edit"></span>Update</a>
                    <a class="btn btn-danger" href="<?php echo url('uploads/logo/delete'); ?>/<?php echo $row->id ?>" onClick="alert('Sure you delete!')">
                      <span class="glyphicon glyphicon-remove-circle"></span>Delete</a></p>
                  </span>
                </div>
               
            <?php  } ?>
              
        </div>

         

    </div>

            <?php echo str_replace('/?', '?', $results->render()); ?>
@stop