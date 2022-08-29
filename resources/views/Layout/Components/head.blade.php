<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TC2WGLMVM7"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-TC2WGLMVM7');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Moongo</title>

    <link rel="icon" href="{{asset('assets/img/favicon.png')}}">

    @include('Layout.Components.styles')
    <link href="{{asset('assets/font/css2.css')}}" rel="stylesheet">
    @php 
    /*<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">*/
     header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0');
    @endphp
    
   
</head>
<!-- Google tag (gtag.js) -->
