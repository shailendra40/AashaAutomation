<script src="{{ asset('adminassets/assets/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminassets/assets/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminassets/assets/toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminassets/assets/datatables.net/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminassets/assets/datatables.net/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminassets/assets/datatables.net/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminassets/assets/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminassets/vendors/popper/popper.min.js') }}"></script>
<script src="{{ asset('adminassets/vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('adminassets/vendors/anchorjs/anchor.min.js') }}"></script>
<script src="{{ asset('adminassets/vendors/is/is.min.js') }}"></script>
<script src="{{ asset('adminassets/vendors/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('adminassets/vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('adminassets/vendors/lodash/lodash.min.js') }}"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{ asset('adminassets/vendors/list.js/list.min.js') }}"></script>
<script src="{{ asset('adminassets/assets/js/theme.js') }}"></script>
<script src="{{ asset('adminassets/wwwroot/assets/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminassets/assets/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('adminassets/assets/jquery-mask/dist/jquery.mask.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminassets/scripts/language.js') }}"></script>
<script src="{{ asset('adminassets/scripts/common.js') }}"></script>
<script src="{{ asset('adminassets/assets/js/flatpickr.js') }}"></script>


<script type="text/javascript">
    InitializeUnicodeNepali();
</script>

<script>
    $(function(){
        var current = location.pathname;
        $('.navbar .nav-item .nav-link ').each(function(){
            var $this = $(this);
            // if the current path is like this link, make it active
            if($this.attr('href').indexOf(current) !== -1){
                $this.closest("nav-link.dropdown-indicator.collapsed").removeClass('collapsed');
                $this.closest(".nav.false.collapse").addClass('show');
                $this.addClass('active');
            }
        })
    })
</script>
{{-- For side-items active at admin panel --}}

<script>
    // Get the current URL or route
    var currentURL = window.location.href; // or use the appropriate method to get the current URL

    // Function to check if the given URL or route matches the current URL or route
    function isActive(url) {
      return currentURL.includes(url);
    }

    // Add the 'active' class to the corresponding navigation item if it matches the current URL or route
    var navLinks = document.querySelectorAll('#navbarVerticalNav .nav-link');
    navLinks.forEach(function (link) {
      var href = link.getAttribute('href');

      if (isActive(href)) {
        link.classList.add('active');

        // If the navigation item has a parent 'nav' element with class 'collapse',
        // make sure it is expanded to show the active item
        var collapseParent = link.closest('.collapse');
        if (collapseParent) {
          collapseParent.classList.add('show');
        }
      }
    });
  </script>
