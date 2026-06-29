    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
<div class="modal fade" id="crud_view">
    <div class="modal-dialog ">
        <div class="modal-content" id="crud_data">
                
        </div>
    </div>
</div> 
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?=base_url('assets/admin/js/off-canvas.js')?>"></script>
  <script src="<?=base_url('assets/admin/js/hoverable-collapse.js')?>"></script>
  <script src="<?=base_url('assets/admin/js/misc.js')?>"></script>
  <script src="<?=base_url('assets/admin/js/settings.js')?>"></script>
  <script src="<?=base_url('assets/admin/js/todolist.js')?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->

  <script src="<?=base_url('assets/admin/js/form-validation.js')?>"></script>
  <script src="<?=base_url('assets/admin/js/bt-maxLength.js')?>"></script>
  <script src="<?=base_url('assets/admin/js/select2.js')?>"></script>   
  <script src="<?=base_url('assets/admin/js/data-table.js')?>"></script>
  
  <script src="<?=base_url('assets/admin/js/formpickers.js')?>"></script>
  <script src="<?=base_url('assets/admin/js/add_row.js')?>"></script>
  <!-- End custom js for this page-->

  <script type="text/javascript">
	
	  
    $('.deleteArticle').click(function(){
        var xkey = $(this).data('xkey');

        $.ajax({
            url: site_url + 'admin/article/delete',
            method: 'post',
            data: {
                xkey:xkey
            },
            success:function(data){
                $('#crud_data').html(data);
                $('#crud_view').modal("show");
            }
        });
    });    
 

    $('.act_deact').click(function(){
        var xkey = $(this).data('xkey');
        var visibility = $(this).val();

        $.ajax({
            url: site_url + 'admin/menu/active_deactive',
            method: 'post',
            data: {
                xkey:xkey,
                visibility:visibility
            },
            success:function(data){
                $('#crud_data').html(data);
                $('#crud_view').modal("show");
            }
        });
    });    

    $(document).on("click", ".act_deact", function(){
       console.log( this.value );
    });
      
  </script>
  
</body>

</html>