@extends('layouts.Myapp')
@section('content')
@if (Auth::check())
<div style="background:#fff;padding:3%;;width:100%;margin:auto">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Date De debut</th>
            <th scope="col">Equipe Home</th>
            <th scope="col">Equipe Away</th>
            <th scope="col">score Home</th>
            <th scope="col">scofe Away</th>
            <th scope="col">image Home</th>
            <th scope="col">image Away</th>
            <th scope="col">Chaine</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        @foreach ($matchs as $match)
        <tr>
            <td>{{ $match->date_debut}}</td>
            <td>{{ $match->equipe_home}}</td>
            <td>{{ $match->equipe_away}}</td>
            <td>{{ $match->score_home}}</td>
            <td>{{ $match->score_away}}</td>
            <td>{{ $match->chaine}}</td>
            <td>  <img src="images/{{$match->image_home}}" width="35px" heigth="auto"/></td>
            <td><img src="images/{{$match->image_away}}" width="35px" heigth="auto"/></td>
            <td><form action="{{ route('match.destroy', $match->id)}}" method="post">
                @method('DELETE')
                @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
          </form></td>
            <td><form action="{{ route('match.show', $match->id)}}" method="get">
                @csrf
            <button class="btn btn-danger" type="submit">Afficher</button>
          </form></td>
        </tr>
        @endforeach
    </table>

<form action="/match" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input class="form-control @error('date_debut') is-invalid @enderror" type="date" name="date_debut"/>
        @error('date_debut')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('score_home') is-invalid @enderror" type="text" name="score_home" placeholder="Score Home"/>
        @error('score_home')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('score_away') is-invalid @enderror" type="text" name="score_away" placeholder="Score Away"/>
        @error('score_away')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('equipe_home') is-invalid @enderror" type="text" name="equipe_home" placeholder="Equipe Home"/>
        @error('equipe_home')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('equipe_away') is-invalid @enderror" type="text" name="equipe_away" placeholder="equipe Away"/>
        @error('equipe_away')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('chaine') is-invalid @enderror" type="text" name="chaine" placeholder="chaine"/>
        @error('chaine')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input class="form-control @error('image_home') is-invalid @enderror" type="file" name="image_home"/>
        @error('image_home')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror


        <input class="form-control @error('image_away') is-invalid @enderror" type="file" name="image_away"/>
        @error('image_away')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>
@endif

<head>
<meta charset=UTF-8>


<script async src="{{ asset('js/v0.js') }}"></script>
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<style amp-custom>
@font-face{font-family:'Cairo';font-style:normal;font-weight:700;src:local('Cairo Bold'),local('Cairo-Bold'),url(https://fonts.gstatic.com/s/cairo/v2/RLgQnjqLWN5-LcxkRZr1cBTbgVql8nDJpwnrE27mub0.woff2) format('woff2');unicode-range:U+0600-06FF,U+200C-200E,U+2010-2011,U+FB50-FDFF,U+FE80-FEFC}
*{margin:0;padding:0;outline:0;transition:all .5s ease;-webkit-transition:all .5s ease;-moz-transition:all .5s ease;-o-transition:all .5s ease}
*,:before,:after{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
a,abbr,acronym,address,applet,b,big,blockquote,body,caption,center,cite,code,dd,del,dfn,div,dl,dt,em,fieldset,font,form,h1,h2,h3,h4,h5,h6,html,i,iframe,img,ins,kbd,label,legend,li,object,p,pre,q,s,samp,small,span,strike,strong,sub,sup,table,tbody,td,tfoot,th,thead,tr,tt,u,ul,var{padding:0;border:0;outline:0;vertical-align:baseline;background:0 0}
.fa{transition:all 0 ease;-webkit-transition:all 0 ease;-moz-transition:all 0 ease;-o-transition:all 0 ease}
ins{text-decoration:underline}
del{text-decoration:line-through}
blockquote{font-style:italic;color:#888}
dl,ul{list-style-position:inside;list-style:none;font-size:12px}
ul li{list-style:none}
caption,th{text-align:center}
img{border:none;position:relative}
a,a:visited{text-decoration:none;font-weight:400}
a{color:#333}
a:hover{color:#111}
q:after,q:before{content:''}
p{margin:0}
img{max-width:100%}
body{background-color:RGB(242,242,242);color:rgb(51,51,51);font-size:16px;line-height:1.42857143;font-family:'Cairo';font-style:normal;font-weight:400}
#outer-wrap{position:relative;margin-top:15px;margin-bottom:15px;background:rgb(243,243,243);z-index:5;-webkit-box-shadow:0 0 73px -17px rgba(9,11,25,0.48);-moz-box-shadow:0 0 73px -17px rgba(9,11,25,0.48);box-shadow:0 0 73px -17px rgba(9,11,25,0.48);-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;overflow:hidden;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;margin-left:auto;margin-right:auto;width:1000px}
#header-wrapper{padding:12px;display:block;background:rgb(255,255,255);position:relative;z-index:222;border-bottom:solid 2px rgb(238,238,238);margin:0 0 15px;float:right;width:100%}
#content-wrapper{float:right;width:100%;padding:10px 30px 10px 30px;overflow:hidden}
.row{float:right;width:100%;display:block}
#main-wrapper{width:72%;padding-right:15px;margin-bottom:0;margin-top:0;float:left}
.right-main{float:right;padding-left:0px;padding-right:0}
#sidebar-wrapper{float:right;width:28%;margin-bottom:0}
.left-sidebar{float:left}
#footer-wrapper{float:right;width:100%;background:#fff;padding:20px 12px 0;margin-top:12px;border-top:solid 2px rgb(238,238,238);overflow:hidden}
#header-logo{display:block;float:right;margin:0 0 0 35px;width:200px}
#header-logo img{max-width:100%;height:auto;display:block}
.title{margin:0;padding:0}
.header-left{display:block;float:right;width:-webkit-calc(100% - 235px);width:-moz-calc(100% - 235px);width:calc(100% - 235px)}
#header-navbar{display:block;width:100%}
#header-navbar li{display:inline-block}
#header-navbar li a{display:block;padding:0 12px;color:#555;font-size:13px;font-weight:700;position:relative}
#header-navbar li a::after{content:"";position:absolute;left:0;height:6px;width:1px;background:#ccc;top:-webkit-calc(50% - 2px);top:-moz-calc(50% - 2px);top:calc(50% - 2px)}
#header-navbar li a:hover{color:rgb(224,0,37)}

.ul-social{float:left;margin-left:24px;margin-top:5px;margin-bottom:-5px}
.social-top a{font-style:normal;z-index:1;width:27px;height:26px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;margin-right:4px;float:left}

.ads{background:#fff;padding:10px;height:90px;width:100%;margin-bottom:15px;text-align:center;color:#999;font-size:20px;line-height:69px;border:solid 1px rgb(224,224,224);float:right}
.h150{height:150px;line-height:127px}
.h250{height:250px;line-height:227px}
.alba-live-table{position:relative;z-index:1;padding:0}
.filter-days{height:40px;border:0}
.filter-days a{float:right;width:33.33%;text-align:center;padding:0 5px;height:30px;line-height:29px;color:rgb(255,255,255);font-weight:700;font-size:12px}
.filter-days a.yesterday{background:-webkit-gradient(linear,left top,left bottom,from(rgb(4,142,227)),to(rgb(1,97,159)));background:-webkit-linear-gradient(top,rgb(4,142,227) 0%,rgb(1,97,159) 100%);background:-moz-linear-gradient(top,rgb(4,142,227) 0%,rgb(1,97,159) 100%);background:-o-linear-gradient(top,rgb(4,142,227) 0%,rgb(1,97,159) 100%);background:linear-gradient(to bottom,rgb(4,142,227) 0%,rgb(1,97,159) 100%)}
.filter-days a.today{background:-webkit-gradient(linear,left top,left bottom,from(RGB(255,36,35)),to(rgb(210,12,12)));background:-webkit-linear-gradient(top,RGB(255,36,35) 0%,rgb(210,12,12) 100%);background:-moz-linear-gradient(top,RGB(255,36,35) 0%,rgb(210,12,12) 100%);background:-o-linear-gradient(top,RGB(255,36,35) 0%,rgb(210,12,12) 100%);background:linear-gradient(to bottom,RGB(255,36,35) 0%,rgb(210,12,12) 100%)}
.filter-days a.tomorrow{background-image:-webkit-gradient(linear,left top,left bottom,from(RGB(255,200,63)),to(RGB(255,156,0)));background-image:-webkit-linear-gradient(top,RGB(255,200,63) 0%,RGB(255,156,0) 100%);background-image:-moz-linear-gradient(top,RGB(255,200,63) 0%,RGB(255,156,0) 100%);background-image:-o-linear-gradient(top,RGB(255,200,63) 0%,RGB(255,156,0) 100%);background-image:linear-gradient(to bottom,RGB(255,200,63) 0%,RGB(255,156,0) 100%)}
.alba_sports_events-event_item{text-align:center;width:80%;display:block;overflow:hidden;margin:10px 10px 10px 50px;position:relative;z-index:9999;padding:0 7px}
.event_inner{margin:0;width:100%;float:right;padding:0 20px;position:relative;height:32px;display:block;color:beige}
.team-aria{position:relative;float:right;width:-webkit-calc(50% - 75px);width:-moz-calc(50% - 75px);width:calc(50% - 75px);display:block;text-align:center;height:32px;z-index:22;color:rgb(119,119,119);background:-webkit-gradient(linear,left top,left bottom,from(rgb(255,255,255)),to(rgb(239,239,239)));background:-webkit-linear-gradient(top,rgb(255,255,255) 0%,rgb(239,239,239) 100%);background:-moz-linear-gradient(top,rgb(255,255,255) 0%,rgb(239,239,239) 100%);background:-o-linear-gradient(top,rgb(255,255,255) 0%,rgb(239,239,239) 100%);background:linear-gradient(to bottom,rgb(255,255,255) 0%,rgb(239,239,239) 100%);-webkit-box-shadow:inset 0 -1px 0 1px rgba(0,0,0,0.05),inset 0 -1px 15px rgba(0,0,0,0.19);-moz-box-shadow:inset 0 -1px 0 1px rgba(0,0,0,0.05),inset 0 -1px 15px rgba(0,0,0,0.19);box-shadow:inset 0 -1px 0 1px rgba(0,0,0,0.05),inset 0 -1px 15px rgba(0,0,0,0.19)}
.team-first{-webkit-transform:skew(-30deg);-moz-transform:skew(-30deg);-ms-transform:skew(-30deg);-o-transform:skew(-30deg);transform:skew(-30deg);-webkit-border-radius:8px 0;-moz-border-radius:8px 0;border-radius:8px 0}
.team-second{-webkit-transform:skew(30deg);-moz-transform:skew(30deg);-ms-transform:skew(30deg);-o-transform:skew(30deg);transform:skew(30deg);-webkit-border-radius:0 8px;-moz-border-radius:0 8px;border-radius:0 8px}
.event_title_wrapper{width:150px;display:table;float:right;color:rgb(255,255,255);position:relative;font-weight:700;text-align:center}
.event_title_wrapper,.event_title_wrapper:after,.event_title_wrapper:before{background:-webkit-gradient(linear,left top,left bottom,from(rgb(6,126,200)),to(rgb(4,76,123)));background:-webkit-linear-gradient(top,rgb(6,126,200) 0%,rgb(4,76,123) 100%);background:-moz-linear-gradient(top,rgb(6,126,200) 0%,rgb(4,76,123) 100%);background:-o-linear-gradient(top,rgb(6,126,200) 0%,rgb(4,76,123) 100%);background:linear-gradient(to bottom,rgb(6,126,200) 0%,rgb(4,76,123) 100%);height:32px}
.event_title_wrapper:after{content:"";width:15px;position:absolute;right:-15px;z-index:-1;top:0}
.event_title_wrapper:before{content:"";width:15px;position:absolute;left:-15px;z-index:-1;top:0}
.event_title_wrapper span{display:table-cell;vertical-align:middle}
.event_status{display:inline-block;width:70px;padding:7px 0 0;font-size:13px}
.soon .event_status{width:auto;padding-top:9px}
.events-team_score.numb{color:rgb(255,255,255);font-weight:700;font-size:17px;text-align:center;position:relative;top:2px;display:inline-block}
.alba-team_logo{display:inline-block;width:50px}
.team-first .alba-team_logo{float:right;margin-right:-25px;-webkit-transform:skew(30deg);-moz-transform:skew(30deg);-ms-transform:skew(30deg);-o-transform:skew(30deg);transform:skew(30deg)}
.team-second .alba-team_logo{float:left;margin-left:-25px;-webkit-transform:skew(-30deg);-moz-transform:skew(-30deg);-ms-transform:skew(-30deg);-o-transform:skew(-30deg);transform:skew(-30deg)}
.team-first .alba_sports_events-team_title{-webkit-transform:skew(30deg);-moz-transform:skew(30deg);-ms-transform:skew(30deg);-o-transform:skew(30deg);transform:skew(30deg)}
.team-second .alba_sports_events-team_title{-webkit-transform:skew(-30deg);-moz-transform:skew(-30deg);-ms-transform:skew(-30deg);-o-transform:skew(-30deg);transform:skew(-30deg)}
.alba-team_logo img{display:block;margin:0 auto 10px;max-height:40px;width:auto}
.alba_sports_events-team_title{font-size:13px;color:rgb(60,75,123);font-weight:700;margin-top:8px;text-align:center;display:inline-block}
.events-info{width:75%;margin:0 auto;color:rgb(60,75,123);font-size:10px;height:25px;display:block;position:relative}
.events-info::before{content:"";position:absolute;right:-24px;height:25px;top:0;width:35px;-webkit-transform:skew(-20deg);-moz-transform:skew(-20deg);-ms-transform:skew(-20deg);-o-transform:skew(-20deg);transform:skew(-20deg);-webkit-border-radius:0 0 8px;-moz-border-radius:0 0 8px;border-radius:0 0 8px}
.events-info:after{content:"";position:absolute;left:-24px;height:25px;top:0;width:35px;-webkit-transform:skew(20deg);-moz-transform:skew(20deg);-ms-transform:skew(20deg);-o-transform:skew(20deg);transform:skew(20deg);-webkit-border-radius:0 0 0 8px;-moz-border-radius:0 0 0 8px;border-radius:0 0 0 8px}
.events-info span{padding:0 10px;float:right;width:33.33333333%;color:rgb(255,255,255);font-weight:700;line-height:22px;border-right:solid 1px rgba(194,225,245,0.28)}
.events-info span::before,.general-infos span::before{content:"";display:inline-block;width:14px;height:16px;margin-left:5px;position:relative;top:4px;-webkit-background-size:120px 120px;-moz-background-size:120px;-o-background-size:120px;background-size:120px}
.event_commenter::before{background-position:-59px -7px}
.event_shampion::before{background-position:-78px -6px}
.event_chanel::before{background-position:-44px -6px}
.live .event_title_wrapper,.live .event_title_wrapper:after,.live .event_title_wrapper:before{color:rgb(255,255,255);text-shadow:0 -1px 0 rgba(0,0,0,0.2);background:-webkit-gradient(linear,left top,left bottom,from(RGB(255,36,35)),to(rgb(210,12,12)));background:-webkit-linear-gradient(top,RGB(255,36,35) 0%,rgb(210,12,12) 100%);background:-moz-linear-gradient(top,RGB(255,36,35) 0%,rgb(210,12,12) 100%);background:-o-linear-gradient(top,RGB(255,36,35) 0%,rgb(210,12,12) 100%);background:linear-gradient(to bottom,RGB(255,36,35) 0%,rgb(210,12,12) 100%);font-weight:700}
.gools .event_title_wrapper,.gools .event_title_wrapper:after,.gools .event_title_wrapper:before{background-image:-webkit-gradient(linear,left top,left bottom,from(RGB(255,200,63)),to(RGB(255,156,0)));background-image:-webkit-linear-gradient(top,RGB(255,200,63) 0%,RGB(255,156,0) 100%);background-image:-moz-linear-gradient(top,RGB(255,200,63) 0%,RGB(255,156,0) 100%);background-image:-o-linear-gradient(top,RGB(255,200,63) 0%,RGB(255,156,0) 100%);background-image:linear-gradient(to bottom,RGB(255,200,63) 0%,RGB(255,156,0) 100%)}
.finshed .event_title_wrapper,.finshed .event_title_wrapper::after,.finshed .event_title_wrapper::before{background-image:-webkit-gradient(linear,left top,left bottom,from(rgb(114,114,114)),to(rgb(98,98,98)));background-image:-webkit-linear-gradient(top,rgb(114,114,114) 0%,rgb(98,98,98) 100%);background-image:-moz-linear-gradient(top,rgb(114,114,114) 0%,rgb(98,98,98) 100%);background-image:-o-linear-gradient(top,rgb(114,114,114) 0%,rgb(98,98,98) 100%);background-image:linear-gradient(to bottom,rgb(114,114,114) 0%,rgb(98,98,98) 100%)}
.blu,.events-info,.events-info:before,.events-info:after{background:-webkit-gradient(linear,left top,left bottom,from(rgb(4,142,227)),to(rgb(1,97,159)));background:-webkit-linear-gradient(top,rgb(4,142,227) 0%,rgb(1,97,159) 100%);background:-moz-linear-gradient(top,rgb(4,142,227) 0%,rgb(1,97,159) 100%);background:-o-linear-gradient(top,rgb(4,142,227) 0%,rgb(1,97,159) 100%);background:linear-gradient(to bottom,rgb(4,142,227) 0%,rgb(1,97,159) 100%)}
.soon .event_title_wrapper,.soon .event_title_wrapper::after,.soon .event_title_wrapper::before{background-image:-webkit-gradient(linear,left top,left bottom,from(rgb(0,215,10)),to(rgb(4,170,0)));background-image:-webkit-linear-gradient(top,rgb(0,215,10) 0%,rgb(4,170,0) 100%);background-image:-moz-linear-gradient(top,rgb(0,215,10) 0%,rgb(4,170,0) 100%);background-image:-o-linear-gradient(top,rgb(0,215,10) 0%,rgb(4,170,0) 100%);background-image:linear-gradient(to bottom,rgb(0,215,10) 0%,rgb(4,170,0) 100%)}
.alba_sports_events-event_mask{position:absolute;top:0;right:0;bottom:0;left:0;display:none;z-index:9999}
.event_mask_inner{-webkit-box-pack:center;-webkit-justify-content:center;-moz-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-moz-box-align:center;-ms-flex-align:center;align-items:center;height:100%;background:rgba(2,119,192,0.6);display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;width:-webkit-calc(100% - 10px);width:-moz-calc(100% - 10px);width:calc(100% - 10px);margin:0 auto;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px}
.alba_sports_events-event_mask_inner_text{margin-top:0;background:-webkit-gradient(linear,left top,left bottom,from(RGB(255,36,35)),to(rgb(210,12,12)));background:-webkit-linear-gradient(top,RGB(255,36,35) 0%,rgb(210,12,12) 100%);background:-moz-linear-gradient(top,RGB(255,36,35) 0%,rgb(210,12,12) 100%);background:-o-linear-gradient(top,RGB(255,36,35) 0%,rgb(210,12,12) 100%);background:linear-gradient(to bottom,RGB(255,36,35) 0%,rgb(210,12,12) 100%);color:rgb(255,255,255);padding:5px 30px;font-size:14px;line-height:22px;text-decoration:none;z-index:555}
.alba_sports_events-event_item:hover .alba_sports_events-event_mask{display:block}
.sid-titel{z-index:1;position:relative;display:block;padding:10px;overflow:hidden;background:-webkit-gradient(linear,left top,left bottom,from(RGB(250,250,250)),to(RGB(245,245,245))) repeat scroll 0% 0% transparent;background:-webkit-linear-gradient(RGB(250,250,250),RGB(245,245,245)) repeat scroll 0% 0% transparent;background:-moz-linear-gradient(RGB(250,250,250),RGB(245,245,245)) repeat scroll 0% 0% transparent;background:-o-linear-gradient(RGB(250,250,250),RGB(245,245,245)) repeat scroll 0% 0% transparent;background:linear-gradient(RGB(250,250,250),RGB(245,245,245)) repeat scroll 0% 0% transparent;border-bottom:1px dotted RGB(196,196,196);font-size:17px;margin-bottom:12px}
.shamp-side h2{float:right;width:100%;border-top:solid 1px rgb(238,238,238)}
.shamp-side h2 span{float:right;height:33px;margin-left:12px}
.shamp-side h2 img{height:100%;width:auto}
.shamp-side h2 a{font-size:12px;font-weight:700;line-height:31px;vertical-align:middle;display:block;overflow:hidden;height:40px;padding:4px}
.shamp-side h3{float:right;width:100%;border-top:solid 1px rgb(238,238,238)}
.shamp-side h3 span{float:right;height:33px;margin-left:12px}
.shamp-side h3 img{height:100%;width:auto}
.shamp-side h3 a{font-size:12px;font-weight:700;line-height:31px;vertical-align:middle;display:block;overflow:hidden;height:40px;padding:4px}
#search{position:relative;width:100%}
.search-submit{height:35px;border:0;position:absolute;top:0;left:0;width:35px;padding:0;cursor:pointer;z-index:9999;background-position:0 -8px}
.form-control{display:block;font-size:14px;font-weight:100;font-family:'Cairo',sans-serif;width:100%;float:right;height:37px;padding:6px 12px;font-size:14px;line-height:1.42857143;color:#666;background-color:rgba(177,177,177,0.2);background-image:none;border:0}
.full-widget,.sidebar-widget{float:right;width:100%;display:block;margin-bottom:15px;overflow:hidden;border:solid 1px rgb(224,224,224);background:rgb(255,255,255);padding:12px;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px}
.box-title{border-bottom:1px solid RGB(238,238,242);position:relative;overflow:hidden;height:30px;float:right;width:100%;margin-bottom:12px}
.box-title .title{float:right;display:inline-block;margin-left:20px;margin-top:0;position:relative;color:rgb(60,75,123);border-bottom:3px solid RGB(67,96,156);font-size:16px;margin-right:2px;padding:0 0 5px;line-height:15px;height:30px}
.more{position:absolute;left:3px;bottom:6px}
.more a{font-size:13px;font-weight:700;background-color:RGB(67,96,156);line-height:17px;color:rgb(255,255,255);-webkit-border-radius:1px;-moz-border-radius:1px;border-radius:1px;padding:2px 12px;font-family:arial}
.widget-content{overflow:hidden;width:100%}
.item-post{float:right;width:25%;padding:3px;overflow:hidden}
.inner-content{position:relative;display:block;width:100%;height:175px;overflow:hidden}
.post-thumbnail{display:block;float:right;width:100%;height:100%;overflow:hidden}
.alba-tumb{height:100%;display:block;width:100%;-webkit-transition:all 0.3s ease-in-out;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;background-repeat:no-repeat;background-position:center center}
.alba-tumb::before{line-height:32px;content:"";width:40px;height:41px;text-align:center;position:absolute;top:-webkit-calc(50% - 30px);top:-moz-calc(50% - 30px);top:calc(50% - 30px);left:-webkit-calc(50% - 20px);left:-moz-calc(50% - 20px);left:calc(50% - 20px);opacity:0.8;z-index:3;background:url(nd/img/play.png);background-repeat:no-repeat;-webkit-background-size:100% 100%;-moz-background-size:100%;-o-background-size:100%;background-size:100%;transform:scale(1) translate(0,0);-webkit-transform:scale(1) translate(0,0);-o-transform:scale(1) translate(0,0);-moz-transform:scale(1) translate(0,0);-ms-transform:scale(1) translate(0,0);-webkit-transition:transform 400ms cubic-bezier(0.52,1.64,0.37,0.66),color 400ms cubic-bezier(0.52,1.64,0.37,0.66);-moz-transition:transform 400ms cubic-bezier(0.52,1.64,0.37,0.66),color 400ms cubic-bezier(0.52,1.64,0.37,0.66);-o-transition:transform 400ms cubic-bezier(0.52,1.64,0.37,0.66),color 400ms cubic-bezier(0.52,1.64,0.37,0.66);-webkit-transition:color 400ms cubic-bezier(0.52,1.64,0.37,0.66),-webkit-transform 400ms cubic-bezier(0.52,1.64,0.37,0.66);transition:color 400ms cubic-bezier(0.52,1.64,0.37,0.66),-webkit-transform 400ms cubic-bezier(0.52,1.64,0.37,0.66);-moz-transition:transform 400ms cubic-bezier(0.52,1.64,0.37,0.66),color 400ms cubic-bezier(0.52,1.64,0.37,0.66),-moz-transform 400ms cubic-bezier(0.52,1.64,0.37,0.66);-o-transition:transform 400ms cubic-bezier(0.52,1.64,0.37,0.66),color 400ms cubic-bezier(0.52,1.64,0.37,0.66),-o-transform 400ms cubic-bezier(0.52,1.64,0.37,0.66);transition:transform 400ms cubic-bezier(0.52,1.64,0.37,0.66),color 400ms cubic-bezier(0.52,1.64,0.37,0.66);transition:transform 400ms cubic-bezier(0.52,1.64,0.37,0.66),color 400ms cubic-bezier(0.52,1.64,0.37,0.66),-webkit-transform 400ms cubic-bezier(0.52,1.64,0.37,0.66),-moz-transform 400ms cubic-bezier(0.52,1.64,0.37,0.66),-o-transform 400ms cubic-bezier(0.52,1.64,0.37,0.66)}
.alba-tumb::after{background:rgba(24,33,58,0.24);position:absolute;width:100%;content:"";height:100%;opacity:1;z-index:1;right:0}

.Alba-Title{padding:10% 11px 12px;font-size:13px;line-height:18px;margin:0}
.card_inner{display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;position:relative;height:220px;width:100%}
.card_events_title,.card_team-aria{margin-top:33px;text-align:center;-webkit-flex-basis:33.3%;-ms-flex-preferred-size:33.3%;flex-basis:33.3%;position:relative}
.card_team_logo{margin:0 auto;width:130px}
.card_team_logo a{display:block}
.card_team_title{font-size:100%;font-weight:700;margin-top:8px}
.card_team_title a{color:rgb(255,255,255);font-size:22px;font-weight:700;text-shadow:-1px 0 1px rgba(35,31,32,.75);margin:5px 0;display:block}
.match-details__uppergraph-middle__round{background-color:rgb(255,255,255);color:rgb(40,70,94);-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;font-size:14px;padding-top:1px;height:23px}
.match-details__winner{opacity:1}
.match-details__looser{opacity:.4}
.scoreplaceholder{font-family:Tahoma;color:rgb(255,255,255);font-size:90px;font-weight:700;margin:0 25px}
.scoreseparator{font-size:75px;font-weight:700;color:rgb(255,255,255);vertical-align:text-bottom;font-family:sans-serif;line-height:90px}
.uppergraph-matchstatus{display:inline-block;color:rgb(255,255,255);-webkit-border-radius:33px;-moz-border-radius:33px;border-radius:33px;background-color:rgba(0,0,0,.45);font-size:14px;text-shadow:-1px 0 1px rgba(35,31,32,.75);padding:4px 18px 2px}
.general-infos{width:80%;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;margin:0 auto;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:-moz-box;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;-moz-box-pack:justify;justify-content:space-between;background:rgb(255,255,255);position:relative;top:25px;padding:0 23px;-webkit-box-shadow:0 0 8px rgb(128,128,128);-moz-box-shadow:0 0 8px rgb(128,128,128);box-shadow:0 0 8px rgb(128,128,128);line-height:50px;height:50px}
.general-infos span{font-size:12px;color:rgb(58,85,106);display:inline-block}
.news-image{width:100%;display:block;overflow:hidden;max-height:350px;clear:both}
.news-title{width:100%;color:rgb(98,98,98);margin-bottom:10px;background-color:RGB(250,250,250);border:1px solid RGB(241,241,241);margin-top:12px;clear:both;line-height:20px;padding:11px}
.news-title h1{font-size:21px}
.news-meta{width:100%;font-size:12px;color:RGB(170,170,170);padding-right:5px;clear:both}
.news-meta span{display:inline-block;padding:0 5px;color:RGB(170,170,170)}
.news-meta span a{color:RGB(170,170,170)}
.news-content{clear:both;padding:10px;overflow:hidden;line-height:25px;width:100%;margin-bottom:15px;color:#555;font-size:14px}
.single-content,.single-news{background:rgb(255,255,255);padding:10px;border:solid 1px rgb(224,224,224);display:block;clear:both;margin-bottom:15px;overflow:hidden}
.filter-server{float:right;width:100%;clear:both}
.filter-server li{float:right;padding:2px}
.filter-server li a{margin-bottom:3px;display:inline-block;cursor:pointer;-webkit-border-radius:1px;-moz-border-radius:1px;border-radius:1px;padding:5px 40px 5px 20px;border:0;font-size:13px;background:rgb(51,51,51);color:rgb(255,255,255);height:30px;position:relative}
.filter-server li.active a,.filter-server li:hover a{background:rgb(59,127,255)}
.filter-server li a::before{content:"";position:absolute;right:0;top:0;width:28px;height:30px;background-color:rgb(85,81,82);text-align:center;background-position:-40px -10px}
.news-image img{width:100%}
.code-aria{background:-webkit-gradient(linear,left top,left bottom,from(rgb(4,142,227)),to(rgb(1,97,159)));background:-webkit-linear-gradient(top,rgb(4,142,227) 0%,rgb(1,97,159) 100%);background:-moz-linear-gradient(top,rgb(4,142,227) 0%,rgb(1,97,159) 100%);background:-o-linear-gradient(top,rgb(4,142,227) 0%,rgb(1,97,159) 100%);background:linear-gradient(to bottom,rgb(4,142,227) 0%,rgb(1,97,159) 100%);width:100%;float:right;overflow:hidden;display:block;padding:1px;margin:0 auto;clear:both;color:rgb(255,255,255);text-align:center;line-height:27px;font-weight:700;font-size:13px}
.code-aria textarea{float:left;width:-webkit-calc(100% - 100px);width:-moz-calc(100% - 100px);width:calc(100% - 100px);line-height:14px;padding:0 5px;height:28px;border:0;font-size:12px;font-weight:400;color:rgb(80,80,80);text-align:left;direction:ltr;overflow:hidden;background:rgb(245,245,245)}
.sharepost li{float:right;width:33.33%;padding:2px}
.sharepost .share-telegram,.sharepost .share-whatsapp{width:50%}
.sharepost li a{display:block;color:rgb(255,255,255);text-align:center;padding:5px;font-size:12px;float:right;width:100%}
.sharepost li a span{width:20px;height:19px;display:inline-block;float:right;margin-left:2px;-webkit-background-size:150px 150px;-moz-background-size:150px;-o-background-size:150px;background-size:150px}

</style>
</head>


<div id="outer-wrap" class="container">

    <div  id="content-wrapper">


                <div class="alba-live-table full-widget">
                    <div class="box-title">
                    <h1 class="title">Match Today</h1>
                    </div>
                    @foreach ($matchs as $m)

<li class="alba_sports_events-event_item">
    <a href="{{ route('match.show', $m->id)}}" title="Voir En Direct">
                            <div class="alba_sports_events-event_mask">
                                <div class="event_mask_inner">
                                    <div class="alba_sports_events-event_mask_inner_text">Voir En Direct</div>
                                </div>
                            </div>
                            <div class="event_inner">
                                <div class="team-aria team-first">
                                    <div class="alba-team_logo">
                                        <amp-img alt="{{$m->equipe_home}}" src="images/{{$m->image_home}}"  width="35" height="35"></amp-img>
                                    </div>
                                    <div class="alba_sports_events-team_title">{{$m->equipe_home}}</div>
                                </div>
                                <div class="event_title_wrapper">
                                        <div class="events-team_score numb"> {{$m->score_home}} </div>
                                        <div class="event_status">-</div>
                                        <div class="events-team_score numb"> {{$m->score_away}} </div>
                                </div><div class="team-aria team-second">
                                    <div class="alba-team_logo">
                                        <amp-img alt="{{$m->equipe_away}}" src="images/{{$m->image_away}}" width="35" height="35"></amp-img>
                                    </div>
                                    <div class="alba_sports_events-team_title">{{$m->equipe_away}}</div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="events-info blu">
                                    <span class="event_shampion">Date de match : {{$m->date_debut}}</span>
                                </div>
                            </div>
                        </a>
                    </li>
        @endforeach

            </div>







</div>



</div>

@endsection






