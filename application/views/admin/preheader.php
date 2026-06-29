<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>
   <!-- plugins:js -->
  <script src="<?=base_url('assets/admin/vendors/js/vendor.bundle.base.js')?>"></script>
  <script src="<?=base_url('assets/admin/vendors/js/vendor.bundle.addons.js')?>"></script>
  <!-- endinject -->

  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

  <script src="<?=base_url('assets/admin/tinymce/tinymce.min.js')?>"></script>
  <script>
    tinymce.init({
        selector: ".textarea",theme: "modern",
        branding: false,
        height: "400",
        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
             "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
       ],
       toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
       toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol",

        table_class_list: [
          {title: 'None', value: ''},
          {title: 'Bordered', value: 'table table-bordered'},
          {title: 'Striped', value: 'table table-striped'},
          {title: 'Bordered + Striped', value: 'table table-bordered table-striped'}
        ],

       filemanager_access_key:"SckubleaTFucking01937",
       image_advtab: true ,
       image_class_list: [
            {title: 'None', value: ''},
            {title: 'Биография', value: 'nmmc-leaders'},
            {title: 'Молодёжи НГМК', value: 'nmmc-youth'},
            {title: 'Lightbox', value: 'lightbox-image'},
        ],

        link_class_list: [
            {title: 'None', value: ''},
            {title: 'Lightbox', value: 'lightbox-image'},
        ],
       relative_urls: false,
       remove_script_host: true,
       external_filemanager_path:"<?=base_url('my_manager/')?>",
       filemanager_title:"Responsive Filemanager" ,
       external_plugins: { "filemanager" : "<?=base_url('my_manager/plugin.min.js')?>"},
       setup: function (editor) {
          editor.on('change', function (e) {
            editor.save();
          });
        }
    });
  </script>

  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/vendors/iconfonts/font-awesome/css/all.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/admin/vendors/css/vendor.bundle.base.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/admin/vendors/css/vendor.bundle.addons.css')?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')?>" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/css/style.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/admin/css/app.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url('assets/admin/images/favicon.png')?>" />

  <script src="<?=base_url('assets/admin/js/alias.js')?>"></script>

  <script type="text/javascript">
    var site_url = '<?=site_url()?>';
    var base_url = '<?=base_url()?>';
	  
	$( function() {
    	$( ".sortable" ).sortable();
  	});
	  
	$(document).ready(function(){
		$( ".sortable" ).sortable({
			placeholder : "ui-state-highlight",
			update  : function(event, ui)
			{
				var page_id_array = new Array();
				$('.sortable tr').each(function(){
					page_id_array.push($(this).attr("id"));
				});
				$.ajax({
					url: site_url + "/admin/service/page_order",
					method:"POST",
					data:{page_id_array:page_id_array},
					success:function(data)
					{
						alert(data);
					}
				});
			}
		});

	});
  </script>
</head>

<body class="sidebar-dark">
  <div class="container-scroller">
