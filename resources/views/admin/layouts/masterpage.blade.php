<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="">
     <title> Image </title>

     @include('admin.layouts.stylesheet')
     @yield('stylesheet')

</head>
<body>
     <div id="wrapper">
     
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
             <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                <a class="navbar-brand"> Image </a>
            </div>
                     
            @include('admin.layouts.header')
                     
            @include('admin.layouts.left-sidebar')

        </nav>

         <div id="page-wrapper">
             <div class="container-fluid">
                 @yield('admin')
                 @yield('show')
                 @yield('viewimagebar')
                 @yield('viewimageicon')
                 @yield('add')
                 @yield('update')

             </div>
             
         </div>

     </div>

     @include('admin.layouts.scripts')
     @yield('scripts')
     
</body>
</html>