<?php
/**
* @version      4.3.1 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');

displaySubmenuOptions();
$rows=$this->rows;
$i=0;
?>
<form action="index.php?option=com_jshopping&controller=units" method="post" name="adminForm" id="adminForm">

<table class="table table-striped">
<thead>
  <tr>
    <th class="title" width ="10">
      #
    </th>
    <th width="20">
	  <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
    </th>
    <th align="left">
      <?php echo _JSHOP_TITLE;?>
    </th>    
    <th width="50">
    	<?php print _JSHOP_EDIT?>
    </th>
    <th width="40">
        <?php echo _JSHOP_ID;?>
    </th>
  </tr>
</thead>
<?php $count=count($rows); foreach($rows as $row){?>
  <tr class="row<?php echo $i % 2;?>">
   <td>
     <?php echo $i+1;?>
   </td>
   <td>     
     <?php echo JHtml::_('grid.id', $i, $row->id);?>
   </td>
   <td>
     <a href="index.php?option=com_jshopping&controller=units&task=edit&id=<?php echo $row->id;?>"><?php echo $row->name;?></a>
   </td>
	<td align="center">
		<a href='index.php?option=com_jshopping&controller=units&task=edit&id=<?php print $row->id;?>'><img src='components/com_jshopping/images/icon-16-edit.png'></a>
	</td>
    <td align="center">
        <?php print $row->id;?>
    </td>
  </tr>
<?php
$i++;  
}
?>
</table>

<input type="hidden" name="task" value="" />
<input type="hidden" name="hidemainmenu" value="0" />
<input type="hidden" name="boxchecked" value="0" />
</form>