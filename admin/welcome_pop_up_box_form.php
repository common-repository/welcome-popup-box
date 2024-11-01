<?php 
$page=sanitize_text_field($_REQUEST["page"]);
$current_url = esc_url(admin_url( "admin.php?page=".$page));
if(isset($_REQUEST['Submit']) && trim($_REQUEST['Submit']) == "Update")	{
				
			if (empty($_REQUEST['vartext'])){
			$error = 'Your message is empty';
			
			}
			if (!empty($_REQUEST['vartext'])){
			$allowed_html = welcome_pop_up_box_allowed_html();
			$vartext= wp_kses($_REQUEST['vartext'], $allowed_html);
			$result = $wpdb->query($wpdb->prepare( "UPDATE welcome_pop_up_box SET  
						vartext='$vartext'" ));
			if ($result){
			header("location:$current_url&msg=edit");
			die();
			}			
			}						
}	
$vartext1="";
$result = $wpdb->get_results($wpdb->prepare("SELECT * FROM welcome_pop_up_box"));
if($result){
foreach($result as $row){
		   		$vartext1 = stripslashes($row->vartext);
				
			}
}
		
?>
<div style="float:none" class="well center-block col-md-7 #container">
 <form name="myform" id="myform" action="" method="post" enctype="multipart/form-data">
 <table  width="100%" border="0" align="#center" cellpadding="#2" cellspacing="#2">
<tr>
<strong>
<span style="color:red">	
<h3>
<?php
if (!empty($error)){ 
echo esc_html(" &#8727; $error");
}else if(empty($error) && isset($_REQUEST['msg'])){
echo esc_html($mess[$_REQUEST['msg']]); 
}else {
echo'Create Welcome Box...';
}
?>
</h3>
</span>
</strong>
</tr>
<tr>
Message :*<br>
<textarea style="width:100%;max-width:100%" name="vartext" rows="40" id="vartext">
<?php 

$allowed_html = welcome_pop_up_box_allowed_html();

echo wp_kses($vartext1, $allowed_html);			 
?>
</textarea>
<div style="clear:both"><br></div>
</tr>
<tr>
<div style="width:100%;max-width:100% clear:both"><br></div>      
<input name="Submit" type="submit" class="btn" id="submit" value="Update" onclick="return check();"/>
 </tr>
</table>
</form>
 <?php echo esc_html(welcome_pop_up_box_editor()); ?>                                                       
</div>

	

	