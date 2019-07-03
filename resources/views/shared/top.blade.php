<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="app-ui">

<head>
    <!-- Meta -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="SADC Parliamentary Forum - Diversity Form"/>
    <meta name="author" content="Ronald Windwaai"/>
    <meta name="robots" content="noindex, nofollow"/>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('themes/assets/img/favicons/apple-touch-icon.png')}}"/>
    <link rel="icon" href="{{asset('themes/assets/img/favicons/favicon.ico')}}"/>

    <!-- Google fonts -->
    <link rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400"/>

@yield('css')
    <!-- AppUI CSS stylesheets -->
    <link rel="stylesheet" id="css-font-awesome" href="{{asset('themes/assets/css/font-awesome.css')}}"/>
    <link rel="stylesheet" id="css-ionicons" href="{{asset('themes/assets/css/ionicons.css')}}"/>
    <link rel="stylesheet" id="css-bootstrap" href="{{asset('themes/assets/css/bootstrap.css')}}"/>
    <link rel="stylesheet" id="css-app" href="{{asset('themes/assets/css/app.css')}}"/>
    <link rel="stylesheet" id="css-app-custom" href="{{asset('themes/assets/css/app-custom.css')}}"/>


    <!-- End Stylesheets -->
</head>