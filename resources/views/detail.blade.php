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
            margin-bottom: 120px;
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
            min-height: 200px;
            max-width: 425px;
            max-height: 260px;
            min-width: 200px;
            margin-top: 35px;
            margin-left: 20px;
            margin-right: 20px;
            padding:0;
            transition: transform 0.5s;
            transform-style: preserve-3d;
            cursor: pointer;
            -webkit-box-shadow: 11px 14px 15px -9px rgba(0,0,0,0.44);
            -moz-box-shadow: 11px 14px 15px -9px rgba(0,0,0,0.44);
            box-shadow: 11px 14px 15px -9px rgba(0,0,0,0.44);
        }

        .front, .back {
            position: absolute;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            backface-visibility: hidden;
            height: 100%;
            width:100%;
            margin: 0;
        }

        .front {
        background-image: url('img/template.png');
        background-repeat:no-repeat;
        background-size:100% 100%;

        }

        .back {
        /* background-image: url('img/template.png');
        background-repeat:no-repeat;
        background-size:100% 100%; */
        transform: rotateY(180deg);
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
            <div class="card" onclick="flip(event)">
                <div class="front">
                    <ons-row vertical-align="center" style="padding-bottom:10px; padding-top:35%">
                        <ons-col style="background-color:blue">
                        </ons-col>
                        <ons-col>
                            <div style="color:#EF7A13; font-size:14px; text-align:right; padding-right:10px;"><strong>
                                {{ \Illuminate\Support\Str::limit($member->nama, 25, $end='...') }}
                                </strong>
                            </div>
                            <div style="color: #EF7A13; float:right; font-size:12px; padding-right:10px;">
                                <strong>
                                {{$member->kode ?? ''}}
                                </strong>
                            </div>
                        </ons-col>
                      </ons-row>
                  </div>
                  <div class="back">
                    {!! QrCode::size(150)->generate($member->kode); !!}
                    {{-- <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($member->kode, 'C93')}}" alt="barcode" height="50" /> --}}
                  </div>

            </div>
        </div>
        <div style="text-align: center" class="isi">
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
              autoplay:true,
              autoplayTimeout:3000,
              autoplayHoverPause:true,
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

          function flip(event){
            var element = event.currentTarget;
            if (element.className === "card") {
            if(element.style.transform == "rotateY(180deg)") {
            element.style.transform = "rotateY(0deg)";
            }
            else {
            element.style.transform = "rotateY(180deg)";
            }
        }
        };
    </script>
</body>
</html>
