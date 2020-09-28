<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
    <link rel="stylesheet" href="{{asset('owl/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('owl/assets/owl.theme.default.min.css')}}">
    <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
    <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
    <script src="{{asset('owl/owl.carousel.min.js')}}"></script>
    <title>MemberApp</title>
    <style>
        body{
            max-width: 480px !important;
            margin:auto !important;
        }
        .header{
            height: 300px;
            background: rgb(244,126,30);
            background: linear-gradient(148deg, rgba(244,126,30,1) 35%, rgba(142,73,17,1) 100%);
            text-align: center;
            align-items: center;
            margin-bottom: 110px;
        }
        .isi{
            border-top-left-radius: 35px;
            border-top-right-radius: 35px;
            padding-top:40px;
            padding-left: 20px;
            padding-right: 20px;
            background-color:#FFFFFF;
            height: 50%;
            -webkit-box-shadow: 0px -5px 25px -13px rgba(0,0,0,0.69);
            -moz-box-shadow: 0px -5px 25px -13px rgba(0,0,0,0.69);
            box-shadow: 0px -5px 25px -13px rgba(0,0,0,0.69);
        }
        .title{
            font-size: 20px;
            color: #FFFFFF;
        }
        .padding{
            padding-top: 10%;
        }
        .btn-login{
            float: right;
            background-color: #F47E1E;
            border-radius: 30px;
            padding: 5px 30px 5px 30px;
            font-size: 15px;
        }

        ons-input{
            width: 100%;
        }

        .card  {
            height: 200px !important;
            margin-top: 35px;
            margin-left: 20px;
            margin-right: 20px;
            background:linear-gradient(148deg, rgba(13,0,116,0.9) 12%, rgba(0,0,0,0.9) 100%), url('/img/batik2.png');
            background-size:cover;
            -webkit-box-shadow: 11px 14px 15px -9px rgba(0,0,0,0.44);
            -moz-box-shadow: 11px 14px 15px -9px rgba(0,0,0,0.44);
            box-shadow: 11px 14px 15px -9px rgba(0,0,0,0.44);
        }

        .iklan{
            border-radius:15px;
        }

    </style>
</head>
<body>
    <ons-page>
        <div class="header">
            <ons-row vertical-align="center" style="padding-top: 10px;">
                <ons-col width="50px">
                    <a href="{{route('index')}}">
                        <ons-icon style="font-size: 30px; color:#FFFFFF;" icon="fa-chevron-left"></ons-icon>
                    </a></ons-col>
                <ons-col style="text-align: center"><strong style="color:#FFFFFF;">{{$member->telepon ?? ''}}</strong></ons-col>
                <ons-col width="50px" style="padding-right:15px">
                    <img style="float: right; border-radius:100px;" src="{{asset('img/user.png')}}" alt="logo" width="50">
                </ons-col>
            </ons-row>
            <div style="padding-left: 20px; margin-top:-25px">
                <p style="font-size: 25px; color:#FFFFFF; text-align:left;">Poin</p>
                <div style="font-size: 75px; color:#FFFFFF; text-align:left; line-height:40px">
                    <strong>
                        {{$member->balance ?? 0}}
                    </strong>
                    </div>
            </div>
            <div class="card">
                <div style="font-size: 20px; color:#FFFFFF; font-style:italic; padding-bottom:20%"><strong> MEMBER CARD </strong></div>
                <ons-row vertical-align="center" style="padding-bottom:10px">
                    <ons-col>
                        <div style="color:#FFFFFF; font-size:18px; text-align:left">
                            {{ \Illuminate\Support\Str::limit($member->nama, 20, $end='...') }}
                        </div>
                        <div style="color:#FFFFFF; font-size:15px;  text-align:left">
                            <ons-icon style="color: #FFFFFF; margin-right:5px;"
                            icon="fa-map-marker">
                            </ons-icon> {{$member->kota}}
                        </div>
                    </ons-col>
                    <ons-col>
                        <div style="color:#FFFFFF; float:right; font-size:50px">
                            <strong>
                            {{$member->kode}}
                            </strong>
                        </div>
                    </ons-col>
                  </ons-row>
            </div>
        </div>
        <div style="text-align: center" class="isi">
            <div style="padding-bottom:25px; font-size:25px"><strong>BARCODE</strong></div>
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($member->kode, 'C93')}}" alt="barcode" height="50" />
            <div style="padding-top:20px; color: grey; padding-bottom:10px; text-align:left"><strong>Promo terbaru</strong></div>

            <div class="owl-carousel">
                @foreach ($iklan as $item)
                <img class="iklan" src="{{asset($item->gambar)}}" alt="Iklan">
                @endforeach
            </div>
        </div>

      </ons-page>
      <script>
        $(document).ready(function(){
          $(".owl-carousel").owlCarousel({
              loop:true,
              margin:10,
              nav:false,
              responsive:{
                  0:{
                      items:1.3
                  },
                  600:{
                      items:1.3
                  },
                  1000:{
                      items:1.3
                  }
              }
          });
          });
    </script>
</body>
</html>
