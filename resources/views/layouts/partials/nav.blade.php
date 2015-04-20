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
           </ul>
         </div>
       </div>
     </nav>
 </div>
