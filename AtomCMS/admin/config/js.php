<?php
//JavaScript : 713402
?>
<!-- Including Font Awesome CDN -->
<script src="https://use.fontawesome.com/4a311fd8cf.js"></script>		
<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!--jQuery UI-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Tinymce JS -->
<script src="js/tinymce/tinymce.min.js"></script>
<!-- DropZone JS -->
<script src="js/dropzone/dropzone.js"></script>

<script>
	$(document).ready(function(){
		$("#console-debug").hide();
		$("#btn-debug").click(function(){
			$("#console-debug").toggle();
		});

		$(".btn-delete").on("click", function(){
			var selected = $(this).attr("id");
			var pageid = selected.split("del_").join("");

			var confirmed = confirm("Are you sure you want to delete page ?");
			if(confirmed == true) {
				$.get("ajax/pages.php?id="+pageid);
				$("#page_"+pageid).remove();
			}
			
		});
		
	});
	
	tinymce.init({
		  selector: 'textarea',
		  height: 500,
		  theme: 'modern',
		  plugins: [
		    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		    'searchreplace wordcount visualblocks visualchars code fullscreen',
		    'insertdatetime media nonbreaking save table contextmenu directionality',
		    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
		  ],
		  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
		  image_advtab: true,
		  templates: [
		    { title: 'Test template 1', content: 'Test 1' },
		    { title: 'Test template 2', content: 'Test 2' }
		  ],
		  content_css: [
		    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		    '//www.tinymce.com/css/codepen.min.css'
		  ]
		 });
	
</script>