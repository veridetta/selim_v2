<!-- BEGIN: Footer-->
<footer
  class="footer footer-light {{ $configData['footerType'] === 'footer-hidden' ? 'd-none' : '' }} {{ $configData['footerType'] }}">
  <p class="clearfix mb-0 text-center">
    <span class=" d-block d-md-inline-block mt-25">COPYRIGHT &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>
      <span class="d-none d-sm-inline-block">All rights Reserved</span>
    </span>
  </p>
</footer>
<button class="btn btn-danger btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->
