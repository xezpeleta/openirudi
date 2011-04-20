<?php

/**
 * pc module helper.
 *
 * @package    drivers
 * @subpackage pc
 * @author     Your name here
 * @version    SVN: $Id: helper.php 12474 2008-10-31 10:41:27Z fabien $
 */
class pcGeneratorHelper extends BasePcGeneratorHelper
{
	public function linkToShow($object, $params)
  {
    return '<li class="sf_admin_action_show">'.link_to(__($params['label'], array(), 'sf_admin'), 'pc/show?id='.$object->getId()).'</li>';
  }
  
  public function linkToEdit($object, $params)
  {
    return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), 'pc/edit?id='.$object->getId()).'</li>';
  }

  public function linkToDelete($object, $params)
  {
    if ($object->isNew())
    {
      return '';
    }

    return '<li class="sf_admin_action_delete">'.link_to(__($params['label'], array(), 'sf_admin'), 'pc/delete?id='.$object->getId(), array('method' => 'delete', 'confirm' => $params['confirm'])).'</li>';
  } 
}
