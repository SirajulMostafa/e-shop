
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.11
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Sirajul Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Sirajul Updated The product category 1</h4>

                <p>fix new price of the item</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">New 5 item sold</h4>

                <p>Amount of the price</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->

    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!--=============== ./Site wrapper =================== -->
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?=BASE_URL ;?>/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=BASE_URL ;?>/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=BASE_URL ;?>/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=BASE_URL ;?>/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=BASE_URL ;?>/admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=BASE_URL ;?>/admin/dist/js/demo.js"></script>
<!-- <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script> -->

<!-- <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> -->
<script src="<?=BASE_URL ;?>/AdminLTE-2.3.11/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>  -->
<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<!-- parsley js -->
<script src="<?=BASE_URL ;?>/js/parsley/parsley.min.js"></script>
<!-- ./parsley -->
<!-- ajax child option  -->




<script>
 function  get_child_options(selected){
     if(typeof selected === 'undefined'){
         var selected ='';
         //in data ,selected is the post key and :selected is the variable
     }
     var parentID = jQuery('#parent').val();

     jQuery.ajax({

         url: '/e-shop/admin/parsers/child_category.php',
         type: 'POST',
         data: {parentID : parentID, selected:selected},
         success: function (data) {
                      jQuery('#child').html(data);
                    },
                    error: function () {
                      alert("Somthing went wrong !!! with child options.")

                    }
     });
 }
 jQuery('select[name="parent"]').change(function(){

     get_child_options();
 });
 </script>
 <!-- ./ajax child option  -->










<script type="text/javascript">

     $(document).ready(function(){
    $('#viewAll_cat').DataTable(
      {
        "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false

      });
});
    </script>


</body>
</html>


<style type="text/css">
table.dataTable.no-footer {
    border-bottom: 1px solid #F9F6F6;
}
</style>
