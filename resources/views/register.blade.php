<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
    <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
    <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
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

        .error{
            color: red;
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
        .social-link{
            color: #FFFFFF;
            text-decoration:none;
            font-size:15px;
        }
    </style>
</head>
<body>
    <ons-page>
        <div class="header">
            <div class="padding"></div>
            <img src="{{asset('img/logo.png')}}" alt="logo" width="200">
            <p class="title ">
                <div class="social-link" style="font-size:20px;" >Follow sosial media kami:</div>
                <div><a href="https://www.facebook.com/SuryaPanganCV/" class="social-link"><i class="fa fa-facebook-square" aria-hidden="true"></i> CV. Surya Pangan</a></div>
                <div><a href="https://www.instagram.com/surya.pangan/?hl=id" class="social-link"><i class="fa fa-instagram" aria-hidden="true"></i> surya.pangan</a></div>
            </p>
            <div class="padding"></div>
        </div>
        <div class="isi">
        <form id="form" action="{{route('member.handledaftar')}}" method="post">
            @csrf
                  <p>
                    <ons-input value="{{old('nama')}}" id="nama" name="nama" required placeholder="Masukkan nama" modifier="underbar"></ons-input>
                    @error('nama')
                    <div class="error">{{ $message }}</div>
                @enderror
                  </p>

                  <p style="padding-top: 10px">
                    <ons-input
                      id="alamat"
                      name="alamat"
                      placeholder="Masukkan alamat"
                      modifier="underbar"
                      required
                      value="{{old('alamat')}}"
                    >
                    @error('alamat')
                    <div class="error">{{ $message }}</div>
                @enderror
                    </ons-input>
                  </p>
                  <p style="padding-top: 10px">
                    <ons-input
                      id="kota"
                      name="kota"
                      placeholder="Masukkan Kota"
                      modifier="underbar"
                      required
                      value="{{old('kota')}}"
                    >
                    @error('kota')
                    <div class="error">{{ $message }}</div>
                @enderror
                    </ons-input>
                  </p>

                  <p style="padding-top: 10px">
                    <ons-input
                      id="telepon"
                      name="telepon"
                      placeholder="Masukkan nomor telepon"
                      modifier="underbar"
                      required
                      value="{{old('telepon')}}"
                    >
                    @error('telepon')
                    <div class="error">{{ $message }}</div>
                @enderror
                    </ons-input>
                  </p>

                  <p style="padding-top: 10px">
                    <span style="color:#999999">Tanggal Lahir</span>
                    <ons-input
                      id="tgl_lahir"
                      name="tgl_lahir"
                      placeholder="Masukkan tanggal lahir"
                      modifier="underbar"
                      required
                      type="date"
                      value="{{old('tgl_lahir')}}"
                    >
                    @error('tgl_lahir')
                    <div class="error">{{ $message }}</div>
                @enderror
                    </ons-input>
                  </p>

                  <p>
                      <input class="btn-login" type="submit" value="Daftar">
                  </p>
                  <div class="panel">
                    <p>Sudah terdaftar sebagai member? <a class="link-register" href="{{route('index')}}">Masuk lewat sini</a></p>

                </div>
            </form>
        </div>

      </ons-page>
</body>
</html>
