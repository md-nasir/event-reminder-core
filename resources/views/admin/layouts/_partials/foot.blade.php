<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/vendors/base/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/vendors/select2/dist/js/select2.js') }}"></script>
@yield('corporation-review-location')
@yield('page_vendor_scripts')
<script src="{{ asset('assets/admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/admin/js/template.js') }}"></script>
<script src="{{ asset('assets/admin/js/theme.js') }}"></script>
@yield('page_scripts')
<script>
  function confirmationDelete(){
      return confirm('Do you wants to delete this item?');  
  }
</script>
</body>

</html>