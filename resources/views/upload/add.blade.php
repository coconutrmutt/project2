@extends('admin.layouts.masterpage')
        @section('add')
    <div class="container">

          <div class="page-header">
              <h1 class="h2"> Add Image </h1>
          </div>
          
                    @if(Session::has('success'))
                      <div class="alert-box success">
                      <h2>{!! Session::get('success') !!}</h2>
                      </div>
                    @endif 
                    
                <form action="add" method="post" enctype="multipart/form-data" files="true">
                     
                         <table class="table table-bordered table-responsive">

                            <tr>
                              <td><label>Name</label></td>
                              <td><input name="name" type="text" ><br></td>
                            </tr>

                            <tr>
                              <td><label>Image</label></td>
                              <td><input type="file" name="images[]" multiple="true"><br></td>
                            </tr>

                             @if(Session::has('error'))
                                <h3><p style="color:red;">{!! Session::get('error') !!}
                                </p></h3>
                             @endif

                            <tr>
                              <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                              <td colspan="2">
                              <button name="submit" type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-save"></span> &nbsp; save
                              </button>
                            </tr>

                         </table>
                </form>
      </div>
    @stop