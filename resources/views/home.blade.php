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
            min-height: 300px;
            max-height: 400px;
            height: 320px;
            background: rgb(244,126,30);
            background: linear-gradient(148deg, rgba(244,126,30,1) 35%, rgba(142,73,17,1) 100%);
            text-align: center;
            align-items: center;
        }
        .isi{
            border-top-left-radius: 35px;
            border-top-right-radius: 35px;
            padding-top:50px;
            margin-top:-50px;
            padding-left: 20px;
            padding-right: 20px;
            background-color:#FFFFFF;
            min-height: 60%;
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
            border:0;
            color: #FFFFFF;
            padding: 10px 30px 10px 30px;
            font-size: 15px;
        }

        ons-input{
            width: 100%;
        }

        .panel{
            padding-top:50px;
        }
        .link-register{
            color: #F47E1E;
            font-weight: 700;
            text-decoration: none;
        }
        .alert{
            color: #F47E1E;
        }
        .iklan{
            border-radius:15px;
        }
        .social-link{
            color: #FFFFFF;
            text-decoration:none;
            font-size:32px;
            display:inline;
            margin: 0 4px 0 4px;
        }
    </style>
</head>
<body>
    <ons-page>
        <div class="header">
            <div class="padding"></div>
            <img src="{{asset('img/logo.png')}}" alt="logo" width="200">
            <p class="title ">
                <div class="social-link" style="font-size:12px;" >Tetap terhubung melalui</div>
                <div>
                    <a href="https://www.facebook.com/SuryaPanganCV/" class="social-link"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/surya.pangan/?hl=id" class="social-link"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="https://wa.link/w0jhnj" class="social-link"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                </div>
            </p>
        </div>
        <div class="isi">
            @if ($message = Session::get('message'))
            <div class="alert">
                <strong>{{ $message }}</strong>
            </div>
          @endif
        <form id="form" action="{{route('member.masuk')}}" method="post">
            @csrf
                <p>
                    <ons-input value="{{old('telepon')}}" id="telepon" name="telepon" placeholder="Nomor telepon terdaftar" modifier="underbar"></ons-input>
                  </p>

                  <p style="padding-top: 10px">
                    <ons-input
                      id="pin"
                      name="pin"
                      placeholder="4 digit terakhir nomor telepon"
                      modifier="underbar"
                      value="{{old('pin')}}"
                    >
                    </ons-input>
                  </p>
                  @if($errors->any())
                  <span style="color:red">{{ implode('', $errors->all(':message')) }}</span>
                    @endif
                  <p>
                      <input class="btn-login" type="submit" value="Masuk">
                  </p>
            </form>
            <div class="panel">
                <p>Belum terdaftar sebagai member? <a class="link-register" href="{{route('member.daftar')}}">Daftar Sekarang!</a></p>

            </div>
            <div>
                <div class="owl-carousel">
                    @foreach ($iklan as $item)
                    <img class="iklan" src="{{asset($item->gambar)}}" alt="Iklan">
                    @endforeach
                  </div>
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
