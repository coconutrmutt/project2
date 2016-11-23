@extends('admin.layouts.masterpage')
        @section('show')
        <div class="container">
                 <div class="page-header">
                    <h1 class="h2"> All Image </h1>
                 </div>

              <div class="row">

                <div class='list-group gallery'>

                  <?php foreach ($results as $value) { ?>
                                               
                            <div class="col-md-5">
                                        
                              <a class="fancybox" rel="ligthbox" href="{{asset( $value->image)}}" title="Name: {{( $value->name )}}, Date: {{( $value->date )}}, Size: {{( $value->size )}}, Type: {{( $value->Type )}}">     
                              <img  src="{{ ( $value->image )}}" width='250' height='250'></a>

                            </div>  
     
                  <?php } ?>

                </div>
                                 
              </div>
        </div>
                  <?php echo str_replace('/?', '?', $results->render()); ?>
        @stop