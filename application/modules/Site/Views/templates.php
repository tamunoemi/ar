<?php include('includes/header.php');?>
<?php include('includes/login/auth.php');?>
<?php include('includes/templates/main.php');?>
<?php
	if(get_app_info('is_sub_user')) 
	{
		if(get_app_info('app')!=get_app_info('restricted_to_app'))
		{
			echo '<script type="text/javascript">window.location="'.addslashes(get_app_info('path')).'/index.php/site/templates?i='.get_app_info('restricted_to_app').'"</script>';
			exit;
		}
		else if(get_app_info('campaigns_only')==1 && get_app_info('templates_only')==1 && get_app_info('lists_only')==1 && get_app_info('reports_only')==1)
		{
			echo '<script type="text/javascript">window.location="'.addslashes(get_app_info('path')).'/index.php/auth/logout"</script>';
			exit;
		}
		else if(get_app_info('templates_only')==1)
		{
			go_to_next_allowed_section();
		}
	}
?>
<div class="row-fluid">
    <div class="span2">
        <?php include('includes/sidebar.php');?>
    </div> 
    <div class="span10">
    	<div>
	    	<p class="lead">
		    	<?php if(get_app_info('is_sub_user')):?>
			    	<?php echo get_app_data('app_name');?>
		    	<?php else:?>
			    	<a href="<?php echo get_app_info('path'); ?>/index.php/site/edit-brand?i=<?php echo get_app_info('app');?>" data-placement="right" title="<?php echo _('Edit brand settings');?>"><?php echo get_app_data('app_name');?></a>
		    	<?php endif;?>
		    </p>
    	</div>
    	<h2><?php echo _('All templates');?></h2><br/>
    	<div style="clear:both;">
    		<a href="<?php echo get_app_info('path');?>/index.php/site/create-template?i=<?php echo get_app_info('app');?>" class="btn"><i class="icon-plus-sign"></i> <?php echo _('Create a new template');?></a>    		
    	</div>
    	
    	<br/>
    	
	    <table class="table table-striped responsive">
		  <thead>
		    <tr>
		      <th><?php echo _('Template name');?></th>
		      <th><?php echo _('Preview');?></th>
		      <?php if(!get_app_info('is_sub_user') || (get_app_info('is_sub_user') && get_app_info('campaigns_only')==0)):?>
			      <th><?php echo _('Use');?></th>
		      <?php endif;?>
		      <th><?php echo _('Edit');?></th>
		      <th><?php echo _('Delete');?></th>
		    </tr>
		  </thead>
		  <tbody>
			  
			<?php 
				//Get sorting preference
				$q = 'SELECT templates_lists_sorting FROM '.APPS.' WHERE id = '.get_app_info('app');
				$r = mysqli_query($mysqli, $q);
				if ($r && mysqli_num_rows($r) > 0) while($row = mysqli_fetch_array($r)) $templates_lists_sorting = $row['templates_lists_sorting'];
				$sortby = $templates_lists_sorting=='date' ? 'id DESC' : 'template_name ASC';
			?>
		  	
		  	<?php 
		  		$limit = 10;
				$total_subs = totals($_GET['i']);
				$total_pages = ceil($total_subs/$limit);
				$p = isset($_GET['p']) ? $_GET['p'] : null;
				$offset = $p!=null ? ($p-1) * $limit : 0;
				
			  	$q = 'SELECT id, template_name FROM '.TEMPLATE.' WHERE userID = '.get_app_info('main_userID').' AND app='.get_app_info('app').' ORDER BY '.$sortby.' LIMIT '.$offset.','.$limit;
			  	$r = mysqli_query($mysqli, $q);
			  	if ($r && mysqli_num_rows($r) > 0)
			  	{
			  	    while($row = mysqli_fetch_array($r))
			  	    {
			  			$id = $row['id'];
			  			$template_name = stripslashes($row['template_name']);
			  			
			  			echo '
					  		<tr id="'.$id.'">
						      <td><a href="edit-template?i='.get_app_info('app').'&t='.$id.'" title=""><i class="icon icon-file-text-alt" style="margin-right:5px;"></i> '.$template_name.'</a></td>
						      <td><a href="'.get_app_info('path').'/index.php/site/template-preview?t='.$id.'" title="" id="preview-btn-'.$id.'" class="iframe-preview"><i class="icon icon-eye-open"></i></a></td>
						      ';
						if(!get_app_info('is_sub_user') || (get_app_info('is_sub_user') && get_app_info('campaigns_only')==0))
						echo '<td><a href="templates/use-template?i='.get_app_info('app').'&t='.$id.'" title="'._('Create a new campaign with this template').'"><i class="icon icon-edit"></i></a></td>'; 
						echo '
						      <td><a href="edit-template?i='.get_app_info('app').'&t='.$id.'" title=""><i class="icon icon-pencil"></i></a></td>
						      <td><a href="javascript:void(0)" title="'._('Delete').' '.$template_name.'?" id="delete-btn-'.$id.'" class="delete-template"><i class="icon icon-trash"></i></a></td>
						      
						      <script type="text/javascript">
						    	$("#delete-btn-'.$id.'").click(function(e){
								e.preventDefault(); 
								c = confirm("'._('This template will be permanently deleted. Confirm delete').' '.$template_name.'?");
								if(c)
								{
									$.post("'.get_app_info('path').'/index.php/site/templates/delete", { template_id: '.$id.' },
									  function(data) {
									      if(data)
									      {
									      	$("#'.$id.'").fadeOut();
									      }
									      else
									      {
									      	alert("'._('Sorry, unable to delete. Please try again later!').'");
									      }
									  }
									);
								}
								});
							  </script>
							  
						    </tr>
					  	';
			  	    }  
			  	}
			  	else
			  	{
				  	echo '
				  		<tr>
					      <td>'._('No templates have been created yet').'. <a href="'.get_app_info('path').'/index.php/site/create-template?i='.get_app_info('app').'" title="" style="text-decoration: underline;">'._('Create one').'</a>!</td>
					      <td></td>
					      <td></td>
					      <td></td>
					      <td></td>
					    </tr>
				  	';
			  	}
		  	?>
		    
		  </tbody>
		</table>
		
		<link rel="stylesheet" type="text/css" href="<?php echo get_app_info('path');?>/css/print.css" media="print" />
		<script type="text/javascript" src="<?php echo get_app_info('path')?>/js/fancybox/jquery.fancybox.pack.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo get_app_info('path')?>/js/fancybox/jquery.fancybox.css" media="screen" />
		<script type="text/javascript">
			$(document).ready(function() {		
				//iframe preview
				$(".iframe-preview").click(function(e) {
					e.preventDefault();
					
					$.fancybox.open({
						href : $(this).attr("href"),
						type : 'iframe',
						padding : 0
					});
				});
			});
		</script>
		
		<?php pagination($limit); ?>
		
    </div>   
</div>
<?php include('includes/footer.php');?>