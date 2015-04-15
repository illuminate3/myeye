<div class="container-fluid">
     <nav class="navbar navbar-inverse navbar-fixed-top">
       <div class="container">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <ul class="nav navbar-nav">
           <li class=" {{Request::is('eyewear') ? 'active' : ''}}"><a href="/eyewear/#/rxeyewear">عینک طبی <span class="sr-only">(current)</span></a></li>
           <li class="{{Request::is('sun-eyewear') ? 'active' : ''}}"><a  href="/sun-eyewear#/seyewear">عینک آفتابی</a></li>
           {{--<li class="dropdown">--}}
             {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>--}}
             {{--<ul class="dropdown-menu" role="menu">--}}
               {{--<li><a href="#">Action</a></li>--}}
               {{--<li><a href="#">Another action</a></li>--}}
               {{--<li><a href="#">Something else here</a></li>--}}
               {{--<li class="divider"></li>--}}
               {{--<li><a href="#">Separated link</a></li>--}}
               {{--<li class="divider"></li>--}}
               {{--<li><a href="#">One more separated link</a></li>--}}
             {{--</ul>--}}
           {{--</li>--}}
         </ul>
           {{--<a class="navbar-brand {{Request::is('eyewear') ? 'active' : ''}}" href="/eyewear/#/rxeyewear">عینک طبی</a>--}}
           {{--<a class="navbar-brand {{Request::is('sun-eyewear') ? 'active' : ''}}" href="/sun-eyewear#/seyewear"> عینک آفتابی</a>--}}
         </div>
         {{--<div id="navbar" class="navbar-collapse collapse">--}}
           {{--<form class="navbar-form navbar-right">--}}
             {{--<div class="form-group">--}}
               {{--<input type="text" placeholder="Email" class="form-control">--}}
             {{--</div>--}}
             {{--<div class="form-group">--}}
               {{--<input type="password" placeholder="Password" class="form-control">--}}
             {{--</div>--}}
             {{--<button type="submit" class="btn btn-success">Sign in</button>--}}
           {{--</form>--}}
         {{--</div><!--/.navbar-collapse -->--}}
       </div>
     </nav>
 </div>
