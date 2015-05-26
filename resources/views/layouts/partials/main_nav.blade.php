 <nav class="navbar navbar-inverse navbar-static-top">
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
     <ul class='nav navbar-nav navbar-right'>


      @if(Auth::user())
      <li style="margin-top: .5em;margin-left: 2em;">
          <i><a href="/shop/#/basket" id="basket"><span class="badge " >{{$basket_count}}</span> <img  src="/images/marker20.png" alt=""/></a> </i>
      </li>
      <li style="margin-top: .6em;margin-left: 1em;" class="{{Request::is('question') ? 'active' : ''}}">
          <i><a href="/question" id="waranty" style="color: #000;">پشتیبانی </a> </i>
      </li>
      <li class="dropdown" style="color: #000;font-weight: bold;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <b class="caret"></b> {{Auth::user()->name}} <i class="fa fa-user"></i> </a>
          <ul class="dropdown-menu">
              <li>
                  <a href="/userUpdate" >ویرایش اطلاعات کاربری </a>
                  <a href="/auth/logout" > خروج  </a>
              </li>
          </ul>
      </li>

      @else

            <li><a href='/auth/login'>ورود </a></li>
      @endif
      <li style="margin-top: .4em;margin-t: 2em;">
              <i><a href="/"><img id="logo" width="60px" height="40px" src="/images/logo.jpg" alt=""/></a></i>
      </li>

     </ul>
   </div>
 </nav>
