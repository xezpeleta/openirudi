<ul class="sf_admin_actions">
  <?php if($sf_user->hasCredential('trans_unit_delete')):?>
  	<?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php endif;?> 
	
  <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Cancel',)) ?>

  <?php if(!$form->isNew()):?>
	  <?php if($sf_user->hasCredential('trans_unit_show')):?>
		<?php echo $helper->linkToShow($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'show',  'label' => 'Show',)) ?>
	  <?php endif;?> 
  <?php endif;?>

  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>

  <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save_and_add',  'label' => 'Save and add',)) ?>
</ul>
