<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @inertiaHead

    <!-- <script src="{{ asset('node_modules/flowbite/dist/flowbite.min.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <title>booqy</title>
    <link rel="icon" href="{{ asset('/images/favicon.ico') }}">
    <style>
      link {
        cursor: pointer;
      }
    </style>
    
  </head>
  <body>
    @inertia
  </body>

  <script>
  </script>

</html>