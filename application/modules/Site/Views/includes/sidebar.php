<?php $app = isset($_GET['i']) && is_numeric($_GET['i']) ? mysqli_real_escape_string($mysqli, (int)$_GET['i']) : get_app_info('restricted_to_app'); ?>

<div class="sidebar-nav sidebar-box">
	
	<?php if(get_app_info('campaigns_only')==0):?>
	    <ul class="nav nav-list">
	        <li class="nav-header" style="margin-top: 0px;"><?php echo _('Campaigns');?></li>
	        <li <?php if(currentPage()=='app'){echo 'class="active"';}?>><a href="<?php echo get_app_info('path').'/index.php/site/app?i='.$app;?>"><i class="icon-home <?php if(currentPage()=='app.php'){echo 'icon-white';}?>"></i> <?php echo _('All campaigns');?></a></li>
	        <li <?php if(currentPage()=='create' || currentPage()=='send-to' || currentPage()=='edit'){echo 'class="active"';}?>><a href="<?php echo get_app_info('path').'/index.php/site/create?i='.$app;?>"><i class="icon-edit  <?php if(currentPage()=='create' || currentPage()=='send-to' || currentPage()=='edit'){echo 'icon-white';}?>"></i> <?php echo _('New campaign');?></a></li>
	    </ul>	
	<?php endif;?>
	
	<?php if(get_app_info('templates_only')==0):?>
	    <ul class="nav nav-list">
	        <li class="nav-header"><?php echo _('Templates');?></li>
	        <li <?php if(currentPage()=='templates' || currentPage()=='edit-template' || currentPage()=='create-template'){echo 'class="active"';}?>><a href="<?php echo get_app_info('path').'/index.php/site/templates?i='.$app;?>"><i class="icon-envelope <?php if(currentPage()=='templates' || currentPage()=='edit-template' || currentPage()=='create-template'){echo 'icon-white';}?>"></i> <?php echo _('All templates');?></a></li>
	    </ul>
	<?php endif;?>
    
    <?php if(get_app_info('lists_only')==0):?>
	    <ul class="nav nav-list">
	        <li class="nav-header"><?php echo _('Lists & subscribers');?></li>
	        <li <?php if(currentPage()=='list' || currentPage()=='subscribers' || currentPage()=='new-list' || currentPage()=='update-list' || currentPage()=='delete-from-list' || currentPage()=='edit-list' || currentPage()=='custom-fields' || currentPage()=='autoresponders-list' || currentPage()=='autoresponders-create' || currentPage()=='autoresponders-emails' || currentPage()=='autoresponders-edit' || currentPage()=='autoresponders-report' || currentPage()=='search-all-lists' || currentPage()=='segments-list' || currentPage()=='segment'){echo 'class="active"';}?>><a href="<?php echo get_app_info('path').'/index.php/site/list?i='.$app;?>"><i class="icon-align-justify  <?php if(currentPage()=='list' || currentPage()=='subscribers' || currentPage()=='new-list' || currentPage()=='update-list' || currentPage()=='delete-from-list' || currentPage()=='edit-list' || currentPage()=='custom-fields' || currentPage()=='autoresponders-list' || currentPage()=='autoresponders-create' || currentPage()=='autoresponders-emails' || currentPage()=='autoresponders-edit' || currentPage()=='autoresponders-report' || currentPage()=='search-all-lists' || currentPage()=='segments-list' || currentPage()=='segment'){echo 'icon-white';}?>"></i> <?php echo _('View all lists');?></a></li>
	        <li <?php if(currentPage()=='housekeeping-unconfirmed' || currentPage()=='housekeeping-inactive'){echo 'class="active"';}?>><a href="<?php echo get_app_info('path').'/index.php/site/housekeeping-unconfirmed?i='.$app;?>"><i class="icon-leaf" <?php if(currentPage()=='housekeeping-unconfirmed' || currentPage()=='housekeeping-unconfirmed'){echo 'icon-white';}?>></i> <?php echo _('Housekeeping');?></a></li>
	        <li <?php if(currentPage()=='blacklist-suppression' || currentPage()=='blacklist-blocked-domains'){echo 'class="active"';}?>><a href="<?php echo get_app_info('path').'/index.php/site/blacklist-suppression?i='.$app;?>"><i class="icon-ban-circle" <?php if(currentPage()=='blacklist-suppression' || currentPage()=='blacklist-blocked-domains'){echo 'icon-white';}?>></i> <?php echo _('Blacklist');?></a></li>
	    </ul>
	<?php endif;?>
    
    <?php if(get_app_info('reports_only')==0):?>
	    <ul class="nav nav-list">
	        <li class="nav-header"><?php echo _('Reports');?></li>
	        <li <?php if(currentPage()=='report' || currentPage()=='reports'){echo 'class="active"';}?>><a href="<?php echo get_app_info('path').'/index.php/site/reports?i='.$app;?>"><i class="icon-bar-chart  <?php if(currentPage()=='report' || currentPage()=='reports'){echo 'icon-white';}?>"></i> <?php echo _('See reports');?></a></li>
	    </ul>
	<?php endif;?>
    
</div>