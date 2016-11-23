@extends('admin.layouts.masterpage')
        @section('viewimageicon')
          <div class="container">
                   <div class="page-header">
                      <h1 class="h2"> View Image Icon </h1>
                   </div>

                  <?php foreach ($pictures as $value) { ?>
                    
                            <div class="col-md-3">

                              <a class="fancybox" rel="ligthbox" href="{{asset( $value->image)}}" title="Name: {{( $value->name )}}, Date: {{( $value->date )}}, Size: {{( $value->size )}}, Type: {{( $value->Type )}}">
                              <p><img src = "{{( $value->image )}}" width="90"></p>
                              <p><span>{{( $value->name )}}</span></p></a>
                            </div>
                    
                  <?php } ?>

          </div>

          <?php echo str_replace('/?', '?', $pictures->render()); ?>
    
        @stop