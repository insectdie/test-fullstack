</div> <!-- /.container-fluid -->
    
    <footer class="footer">
      <div class="container-fluid">
        <p class="text-muted pull-left">&copy; 2023 insectdie</p>
        <p class="text-muted pull-right ">Theme by <a href="http://www.getbootstrap.com" target="_blank">Bootstrap</a></p>
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
      $(function () {

        //datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });

        // toolip
        $('[data-toggle="tooltip"]').tooltip();
      })
    </script>
  </body>
</html>