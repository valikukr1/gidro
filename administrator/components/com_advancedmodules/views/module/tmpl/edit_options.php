<?php
/**
 * @package         Advanced Module Manager
 * @version         4.4.5
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2012 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

/**
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php foreach ($this->fieldsets as $name => $fieldset) : ?>
	<?php if (!in_array($fieldset->name, array('description', 'basic'))) : ?>
		<div class="tab-pane" id="options-<?php echo $name; ?>">
			<?php $label = !empty($fieldset->label) ? $fieldset->label : 'COM_MODULES_' . $name . '_FIELDSET_LABEL'; ?>
			<?php if (isset($fieldset->description) && trim($fieldset->description)) : ?>
				<p class="tip"><?php echo $this->escape(JText::_($fieldset->description)); ?></p>
			<?php endif; ?>
			<?php foreach ($this->form->getFieldset($name) as $field) : ?>
				<?php if (!$field->hidden) : ?>
					<div class="control-group">
						<div class="control-label">
							<?php echo $field->label; ?>
						</div>
						<div class="controls">
							<?php echo $field->input; ?>
						</div>
					</div>
				<?php else : ?>
					<?php $this->hidden_fields .= $field->input; ?>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
<?php endforeach; ?>
