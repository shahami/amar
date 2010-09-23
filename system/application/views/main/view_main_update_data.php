<div id="right">

<script type="text/javascript" src="<?php echo base_url();?>system/application/views/them/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->

<?php

/*          $caption= array(
    'name'        => 'caption',
    'id'          => 'caption',
    'style'       => 'margin:10px',
    );

        $value = array(
    'name'        => 'value',
    'id'          => 'value',
    'cols'       => '50',
    'style'       => 'margin:10px',
    );
*/
        echo form_open('main/update_data');
        echo form_hidden('data_id',$this->uri->segment(3));
/*		$this->load->library('table');
		$this->table->add_row('sadf','sdf');
		echo $this->table->generate();  */ 
		echo form_label('عنوان بخش', 'section_id');
		echo form_dropdown('section_id', $this->mainmodel->section_dropdown_option(),$this->uri->segment(5));
		echo "<br>";
		echo form_label('عنوان محور', 'category_id');
		echo form_dropdown('category_id', $this->mainmodel->category_dropdown_option(),$this->uri->segment(4));
		echo "<br>";
		echo form_label('عنوان', 'caption');
		echo form_input('caption',$caption);
		echo(form_error('caption'));
		echo "<br>";
		echo form_label('واحد', 'unit');
		echo form_input('unit',$unit);
		echo(form_error('unit'));
		echo "<br>";
		echo form_label('سال', 'year');
		echo form_input('year',$year);
		echo(form_error('year'));
		echo "<br>";
		echo form_label('ماه', 'month');
		echo form_input('month',$month);
		echo(form_error('month'));
		echo "<br>";
		echo form_label('محتوا', 'value');
		echo form_input('value',$value);
		echo(form_error('value'));
		echo "<br>";
		echo form_submit('', 'فرستادن محتوا');
		echo('</form><br>');
?>
</div>
       
