
  @extends('main')
  @section('title','| HomePage')

    @section('content')

      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
          <img src="http://www.nanium.com/_gi/nanium-logo.svg">
            <h4 style="text-align: justify;text-align: center;">Welcome to NANIUM's Guests and Visitors Management System</h4>
          
       
          </div>
        </div>
      </div>
      <!-- end of header .row -->
      @if(!isset($user))
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Login Information</b></div>
                <div class="panel-body">

             <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="username" type="password" class="form-control" name="username" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                           
                            </div>
                        </div>
                    </form>
             </div>
         </div>
     </div>
 </div>
</div>
@else
@endif

 <div class="row">
            <div class="col-md-8">
            @if(!isset($user->fk_idSecurity))
            @elseif($user->fk_idSecurity == 1)
            <h4>Your next meetings:</h4><hr>
                
                @foreach($hostMeetings as $meet)

                    <div class="post" >
                    <img src="/images/{{ Auth::user()->photo }}" style="width:32px; height:32px;border-radius:50%"></img>
                        <h4><b>{{ $meet->meetingName }}</b></h4>{{ date('M j, Y H:i', strtotime($meet->meetStartDate)) }} 
                        <p>{{ substr(strip_tags($meet->visitorCompanyName), 0, 300) }}{{ strlen(strip_tags($meet->visitReason)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('meetings') }}" class="btn btn-primary btn-sm">See More</a>
                    </div>

                    <hr>
                    
                @endforeach
                 {!! $hostMeetings->links(); !!}         
@else

            <h4>Next meetings:</h4><hr>
                @foreach($meetings as $meet)
                 <img src="/images/{{$userPhoto->find($meet->meetIdHost)->photo}}" style="width:32px; height:32px;border-radius:50%"></img>
                   
                    <div class="post" >
                        <h4><b>{{ $meet->meetingName }}</b></h4>{{ date('M j, Y H:i', strtotime($meet->meetStartDate)) }} 
                        <p>{{ substr(strip_tags($meet->visitorCompanyName), 0, 300) }}{{ strlen(strip_tags($meet->visitReason)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('meetings') }}" class="btn btn-primary btn-sm">See More</a>
                    </div>

                    <hr>

                @endforeach
                {!! $meetings->links(); !!}
@endif
                </div>
                <div class="col-md-8" style='float:left;'>
                <h4>Last delivers:</h4><hr>
                @foreach($delivers as $deliver)
                <h4><b>{{ $deliver->deFirmSupplier }}</b></h4>{{ date('M j, Y H:i', strtotime($deliver->deEntryTime)) }} 
                        <p>{{ substr(strip_tags($deliver->deDriverName), 0, 300) }}{{ strlen(strip_tags($deliver->visitReason)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('delivers') }}" class="btn btn-primary btn-sm">See More</a>

                @endforeach
                </div>
      
        @if(isset($user))    
        <div class="col-md-3 col-md-offset-1">
    <h4 style="margin-left: 68px">Lost and Found:</h4>
               
                @foreach($lostItems as $item)

                    <div class="mySlides" >
                       <b style="color: #0078ab;
    margin-left: 93px;">Category:

     


                       @if($item->itemCategory==1)
                       Electronic
                       @elseif($item->itemCategory==2)
                       Document
                       @elseif($item->itemCategory==3)
                       Money
                       @elseif($item->itemCategory==4)
                       Gadget
                       @elseif($item->itemCategory==5)
                       Cloth
                       @else Other
                       @endif
                     </b>
                      @if(!empty($item->photo))
            <div class="thumbnail">
               <div class="image">
       

              <img src="{{ asset('images/'. $item->photo)}}" height="150"  width="200" style="margin-left: 35px;" alt="Some awesome text"/>

             
      </div>
                </div>
                 @else
<h3>No photo available</h3>
             
              @endif
                     
                        <h5>Found Date: {{ $item->foundDate ? date('F j, Y', strtotime($item->foundDate)) : '' }}</h5>  
                        
                        <a href="{{ url('/losts/' . $item->idLostFound) }}" class="btn btn-primary btn-sm">See More</a>
                    </div>
                

                    <hr>

                @endforeach
                      <div class="tedelivert-center">
                 {!! $lostItems->links(); !!}
                     </div>
@else
@endif
<style>
      @import url('https://fonts.googleapis.com/css?family=Amarante');

html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
  outline: none;
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
html { overflow-y: scroll; }
body { 
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 62.5%;
  line-height: 1;
  color: #585858;
  padding: 22px 10px;
  padding-bottom: 55px;
}

::selection { background: #5f74a0; color: #fff; }
::-moz-selection { background: #5f74a0; color: #fff; }
::-webkit-selection { background: #5f74a0; color: #fff; }

br { display: block; line-height: 1.6em; } 

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
ol, ul { list-style: none; }

input, textarea { 
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: none; 
}

blockquote, q { quotes: none; }
blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
strong, b { font-weight: bold; } 

table { border-collapse: collapse; border-spacing: 0; }
img { border: 0; max-width: 100%; }

h1 { 
  font-family: 'Amarante', Tahoma, sans-serif;
  font-weight: bold;
  font-size: 3.6em;
  line-height: 1.7em;
  margin-bottom: 10px;
  text-align: center;
}


/** page structure **/
#wrapper {
  display: block;
  width: 850px;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}

#keywords {
  margin: 0 auto;
  font-size: 1.2em;
  margin-bottom: 15px;
}


#keywords thead {
  cursor: pointer;
  background: #c9dff0;
}
#keywords thead tr th { 
  font-weight: bold;
  padding: 12px 30px;
  padding-left: 42px;
}
#keywords thead tr th span { 
  padding-right: 20px;
  background-repeat: no-repeat;
  background-position: 100% 100%;
}

#keywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
  background: #acc8dd;
}

#keywords thead tr th.headerSortUp span {
  background-image: url('https://i.imgur.com/SP99ZPJ.png');
}
#keywords thead tr th.headerSortDown span {
  background-image: url('https://i.imgur.com/RkA9MBo.png');
}


#keywords tbody tr { 
  color: #555;
}
#keywords tbody tr td {
  text-align: center;
  padding: 15px 10px;
}
#keywords tbody tr td.lalign {
  text-align: left;
}
    </style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>

</head>

<body translate="no" >

  <body>
 <div id="wrapper">
  <h1>Your next meetings</h1>
  
  <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>Keywords</span></th>
        <th><span>Impressions</span></th>
        <th><span>Clicks</span></th>
        <th><span>CTR</span></th>
        <th><span>Rank</span></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="lalign">silly tshirts</td>
        <td>6,000</td>
        <td>110</td>
        <td>1.8%</td>
        <td>22.2</td>
      </tr>
      <tr>
        <td class="lalign">desktop workspace photos</td>
        <td>2,200</td>
        <td>500</td>
        <td>22%</td>
        <td>8.9</td>
      </tr>
      <tr>
        <td class="lalign">arrested development quotes</td>
        <td>13,500</td>
        <td>900</td>
        <td>6.7%</td>
        <td>12.0</td>
      </tr>
      <tr>
        <td class="lalign">popular web series</td>
        <td>8,700</td>
        <td>350</td>
        <td>4%</td>
        <td>7.0</td>
      </tr>
      <tr>
        <td class="lalign">2013 webapps</td>
        <td>9,900</td>
        <td>460</td>
        <td>4.6%</td>
        <td>11.5</td>
      </tr>
      <tr>
        <td class="lalign">ring bananaphone</td>
        <td>10,500</td>
        <td>748</td>
        <td>7.1%</td>
        <td>17.3</td>
      </tr>
    </tbody>
  </table>
 </div> 
</body>
    <script src="//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js"></script>

  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.14/js/jquery.tablesorter.min.js'></script>

    <script>
    $(function(){
  $('#keywords').tablesorter(); 
});
  //# sourceURL=pen.js
  </script>

  
  

</body>
      <script>
            var myIndex = 0;
            carousel();
                         function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                 x[i].style.display = "none";  
             }
             myIndex++;
             if (myIndex > x.length) {myIndex = 1}    
                x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
</div>

      </div>
@endsection
  