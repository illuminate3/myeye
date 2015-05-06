<div class="container-fluid" >
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
               <li class="{{Request::is('sunEyewear') ? 'active' : ''}}"><a  href="/sunEyewear/#/suneyewear">عینک آفتابی</a></li>
           </ul>


         </div>
         <ul class='nav pull-right'>
            <div>
                <i><a href="/shop/#/basket"><img src="/images/marker20.png" alt=""/></a></i>
            </div>
          @if(Auth::user())
            <ul class="nav navbar-right top-nav">
                  <li class="dropdown">
                      <a href="" class="dropdown-toggle" data-toggle="dropdown"> <b class="caret"></b>{{Auth::user()->name}} <i class="fa fa-user"></i> </a>
                      <a href="/auth/logout" class="dropdown-toggle" data-toggle="dropdown"> <b class="caret"></b>خروج <i class="fa fa-user"></i> </a>

                  </li>
              </ul>
          @else
                <li><a href='/auth/login'>ورود </a></li>
          @endif
         </ul>
       </div>
     </nav>
 </div>
