

  <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script src="{{ asset('js/main.js') }}"></script>

  <script type="application/javascript">

      let token = document.head.querySelector('meta[name="csrf-token"]');
      if (token) {
          window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
      } else {
          console.error('CSRF token not found!!');
      }

      toastr.options.closeButton = true;

      @if(session()->has('success'))
        toastr.success("{{session('success')}}");
      @endif

      @if(session()->has('info'))
        toastr.info("{{session('info')}}");
      @endif

      @if($errors->any())
          @if($errors->count() == 1)
            toastr.error("{{ $errors->first() }}");
          @else
            toastr.error("@forEach($errors->all() as $error) <p>{{$error}}</p>  @endforeach", {timeOut: 60000} );
          @endif
      @endif

  </script>

  @yield('extra-js')

  </body>
</html>
