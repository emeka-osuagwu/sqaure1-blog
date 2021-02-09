<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <title>Square1</title>
      <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
      
      <!-- Bootstrap core CSS -->
      <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('assets/blog.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/signin.css') }}">

      <style>
         .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
         }

         @media (min-width: 768px) {
            .bd-placeholder-img-lg {
               font-size: 3.5rem;
            }
         }
      </style>

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

      <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
   </head>
   <body>
      <div id="app"></div>
      <script src="{{mix('js/app.js')}}"></script>
   </body>
</html>