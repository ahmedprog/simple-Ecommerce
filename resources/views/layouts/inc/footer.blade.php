
   <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <p>Ahmed Nasser copyrights © 2018  all rights reserved.</p>
               </div>
               <div class="col-md-6 ">
                  <p class=" pull-right">Designed & Developed by <span>
                     <img src="{{ asset('img/logo.png') }}">
                  </span></p>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
   <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('js/wow.min.js') }}"></script>
   <script src="{{ asset('js/main.j') }}s"></script>
        @if (session('open'))
        <div id="dom-target" style="display: none;">{{session('open')}}</div>
        <script>
  var div = document.getElementById("dom-target");
    var myData = div.textContent;
            $('#'+myData).modal('show');
        </script>
        @endif

        @yield('js')
        @stack('js')
</body>
</html>
