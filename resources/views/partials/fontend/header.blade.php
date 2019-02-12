<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$siteTitle}} | Tanbir</title>
  <link rel="icon" href="{{url('images/author.jpg')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="@php  $content = isset($siteContents)?$siteContents : 'Hi I am TANBIR, an web application developer and i am from a beautiful country, Bangladesh. I have been working on PHP, Twitter Bootstrap, javascript and Laravel 5.6'; $full_description = preg_replace('/<[^>]*>/', '', $content);
  echo $full_description; @endphp "/>
  <meta name="keywords" content="@foreach($SiteData['tag'] as $tags) {{$tags->name}},@endforeach tanbir, zihad, chowdhury, html5, php, laravel,blog, bangla blog, diary, vue js, web artisan, js, javascript, bangladesh, dhaka, barishal, infra, infra student, bubt, bubt student" />
  <meta name="author" content="Tanbir Chowdhury" />

  <!-- Facebook and Twitter integration -->
  <meta property="og:title" content="{{$siteTitle}} | Tanbir"/>
  <meta property="og:image" content="{{ isset($siteImage)?asset('images/'.$siteImage) : asset('images/author.jpg')}}"/>
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{Request::url()}}"/>
  <meta property="og:site_name" content="Tanbir Chowdhury"/>
  <meta property="og:description" content="@php  $content = isset($siteContents)?$siteContents : 'Hi I am TANBIR, an web application developer and i am from a beautiful country, Bangladesh. I have been working on PHP, Twitter Bootstrap, javascript and Laravel 5.6'; $full_description = preg_replace('/<[^>]*>/', '', $content);
echo $full_description; @endphp "/>
  <meta name="twitter:title" content="{{$siteTitle}} | Tanbir" />
  <meta name="twitter:image" content="{{url('images/author.jpg')}}" />
  <meta name="twitter:site" content="@tanbir_me" />
  <meta name="twitter:creator" content="@tanbir_me" />
  <meta name="twitter:url" content="@tanbir_me" />
  <meta name="twitter:card" content="summary" />
  <meta name="google-site-verification" content="MBeAPJDkpzbseRM6ASJt1o14mK_Tg1PVbD2LB2KFw8Q" />

@section('google-rich-content')
      <script type="application/ld+json">
       "@context": "http://schema.org",
      "@type": "Blog",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{url('/')}}"
      },
      "headline": "Tanbir Chowdhury",
      "keywords": "@foreach($SiteData['tag'] as $tags) {{$tags->name}},@endforeach tanbir, zihad, chowdhury, html5, php, laravel, , blog, bangla blog, diary, vue js, web artisan, js, javascript, bangladesh, dhaka, barishal, infra, infra student, bubt, bubt student",
      "image": {
        "@type": "ImageObject",
        "url": "{{asset('images/author.jpg')}}",
        "height": "500px",
        "width": "500px"
      },
      "author": {
        "@type": "Person",
        "name": "Tanbir Chowdhury"
      },
       "publisher": {
        "@type": "Organization",
        "name": "Tanbir"
      },
      "editor": "Tanbir",
      "description": "This is Tanbir's own Blog Site, if you Want to Be as a Blog Reader"
}
  </script>
@show

  
  <!-- laravel mix css-->
  <link rel="stylesheet" href="{{mix('css/app.css')}}">
  
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  
  <!-- jQuery main -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>


<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/foundation.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>


  <script>
$(function() {  
   $("body").niceScroll({zindex: 999999});
});

</script>
  </head>
  <body>
    
  <!-- <div class="colorlib-loader"></div> -->

  <div id="page">
    <nav class="colorlib-nav navbar-fixed-top" role="navigation">
      <div class="top-menu">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-6">
              <div id="colorlib-logo"><a href="/">Tanbir's Diary</a></div>
            </div>
            <div class="col-xs-6 text-right menu-1">
              <ul>
                <li><a href="/">Home</a></li>
                <!-- <li class="has-dropdown">
                  <a href="blog.html">Blog</a>
                  <ul class="dropdown">
                    <li><a href="#">Commercial</a></li>
                    <li><a href="#">Apartment</a></li>
                    <li><a href="#">House</a></li>
                    <li><a href="#">Building</a></li>
                  </ul>
                </li> -->
                <li><a href="https://github.com/totanbir">Coder</a></li>
                <li><a href="{{route('about')}}">About Me</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li><a href="#">Resume</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>