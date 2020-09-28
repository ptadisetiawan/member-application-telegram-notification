@include('layouts.dashboard.partials.__head')

  <body>
    <div id="app">
      <div class="main-wrapper">
       @include('layouts.dashboard.partials.__navbar')
        @include('layouts.dashboard.partials.__sidebar')

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            @include('layouts.dashboard.partials.__header')

            <div class="section-body">
              @yield('content')

            </div>
          </section>
        </div>
        @include('layouts.dashboard.partials.__footer')
      </div>
    </div>
    @include('sweetalert::alert')
    @include('layouts.dashboard.partials.__script')
    @yield('customjs')
  </body>
  </html>
