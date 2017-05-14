<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Packages</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    body {
      padding-top: 55px;
    }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{URL::to('/')}}">Home</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{URL::to('messages')}}">Messages @include('messenger::unread-count')</a></li>
                <li><a href="{{URL::to('/messenger/messages/create')}}">New Message</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
    <div class="container">
        @yield('content')
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    @if (Auth::check())
      <!-- Login timer for logout -->
      <script>function timerIncrement(){idleTime++,idleTime>14&&axios.post("https://www.sarahrenner.work/logout").then(function(){window.location.replace(document.location.protocol+"//"+document.location.hostname+"/login")})}var idleTime=0;$(document).ready(function(){setInterval(timerIncrement,6e4);$(this).mousemove(function(){console.log("Event mousemove"),idleTime=0}),$(this).keypress(function(){console.log("Event keypress"),idleTime=0})});</script>
      <script>
          $( '.js-click-post' ).click(function(e) {
              e.preventDefault; // Prevent the default behavior of the  element.
              var post = $(this).closest('.media-heading'); // Find the parent .post element
              var postId = post.attr('data-post-id'); // Get the post ID from our data attribute
              registerPostClick(postId); // Pass that ID to our function.
          });

          function registerPostClick(postId) {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              })
              $.ajax({
                  type: 'post',
                  dataType: 'JSON',
                  url: '/messenger/messages/' + postId + '/click',
                  error: function (xhr, ajaxOptions, thrownError) {
                      console.log(xhr.status);
                      console.log(JSON.stringify(xhr.responseText));
                  }
              });
          }
      </script>
    @endif
  </body>
</html>
