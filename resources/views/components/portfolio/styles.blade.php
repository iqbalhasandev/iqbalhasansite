@props(['color','variant','design'])


<!-- CSS Assets -->
<link rel="stylesheet" href="{{ portfolio_asset('css/bootstrap-custom.min.css')}}">
<link
    href="https://fonts.googleapis.com/css?family=Exo+2:400%7CPoppins:300,400,500,600,700%7CRaleway:300,400,500,600,700,800"
    rel="stylesheet">
<link rel="stylesheet" href="{{ portfolio_asset('css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{ portfolio_asset('css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{ portfolio_asset('css/hamburgers-custom.min.css')}}">
<link rel="stylesheet" href="{{ portfolio_asset('css/lity.min.css')}}">
<!-- <link rel="stylesheet" href="{{ portfolio_asset('css/owl.carousel.min.css')}}"> -->
<!-- toastr Css -->
<link rel="stylesheet" href="{{admin_asset('libs/toastr/toastr.min.css')}}">
<link rel="stylesheet" href="{{ portfolio_asset('css/swiper.min.css')}}">
<link rel="stylesheet" href="{{ portfolio_asset('css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{ portfolio_asset('css/main.min.css')}}">
<link rel="stylesheet" href="{{ portfolio_asset('css/custom.min.css')}}">
<link rel="stylesheet" href="{{ portfolio_asset('css/colors/main-'.$color.'.min.css')}}" id="color-scheme">
<link rel="stylesheet" href="{{ portfolio_asset('css/color.css')}}">
<link rel="stylesheet" href="{{ portfolio_asset('css/variants/'.$design.'.min.css')}}">

<link rel="stylesheet" href="{{ portfolio_asset('css/variants/'.$variant.'.min.css')}}">
<!--removeIf(delDemoTool)-->
<!-- inject:demoToolCSS:css -->
<link rel="stylesheet" href="{{ portfolio_asset('demo_tool/demo-tool.css')}}">
<!-- endinject -->
<!--endRemoveIf(delDemoTool)-->
