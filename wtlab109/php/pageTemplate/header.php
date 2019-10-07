<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" integrity="sha384-IT8OQ5/IfeLGe8ZMxjj3QQNqT0zhBJSiFCL3uolrGgKRuenIU+mMS94kck/AHZWu" crossorigin="anonymous">
    <link rel="stylesheet" href="css/ezFonts.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/header.js"></script>
    <meta charset="utf-8">
  </head>
  <body>
    <!-- top bar -->
    <div id="top_bar" class="ez-container">
      <button id="menu_toggle" type="button"><i class="fas fa-bars"></i></button>
      <!-- <img id="main-logo" src="ez-logo.png"> -->
      <form id="search_bar">
        <div class="ez-container">
          <input type="text" class="form-control ez-round-large" placeholder="search...">
          <button type="submit" name="submit"><i class="fas fa-search"></i></button>
        </div>
      </form>
    </div>
    <!-- sidebar -->
    <nav class="sidebar ez-sidebar ez-collapse flex-column">
      <!-- user related info -->
      <div class="mt-2" id="user_functions">
        <button id="user_profile" type="button" class="ez-menu-control" control-target="menu">
          <img id="profile_pic" src="image/user.jpg" alt="profile pic" class="rounded-circle">
          <p id="user_name">username</p>
        </button>
        <!-- user related functions menu -->
        <ul id="menu" class="ez-hidden-menu">
          <li><a href="http://www.google.com">登入</a></li>
          <li><a>登123</a></li>
          <li><a>235235</a></li>
          <li><a>12345</a></li>
        </ul>
      </div>
      <!-- basic functions -->
      <button class="mt-2"><i class="fas fa-home"></i></button>
      <div class="" id="histories">
      </div>
    </nav>
