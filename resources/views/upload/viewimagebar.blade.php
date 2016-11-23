@extends('admin.layouts.masterpage')
        @section('viewimagebar')
        <div class="container">
                 <div class="page-header">
                    <h1 class="h2"> View Image Bar </h1>
                 </div>

                <div class="bs-example">
                        <table class="table">

                          <thead>
                            <tr>
                              <th>Image</th>
                              <th>Date</th>
                              <th>Size</th>
                              <th>Type</th>
                            </tr>
                          </thead>

                            <?php foreach ($pictures as $value) { ?>
           
                                <tr>
                                  <td><img src="{{( $value->image )}}" width="90" height='90'></td>
                                  <td>{{( $value->date )}}</td>
                                  <td>{{( $value->size )}}</td>
                                  <td>{{( $value->Type )}}</td>
                                </tr>
                            
                            <?php } ?>
                        
                        </table>
                </div>

        </div>

          <?php echo str_replace('/?', '?', $pictures->render()); ?>

        @stop