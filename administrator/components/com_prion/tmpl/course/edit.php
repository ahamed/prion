<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_content
 *
 * @copyright   (C) 2008 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->document->getWebAssetManager();
$wa->useScript('keepalive')
	->useScript('form.validate');

$app = Factory::getApplication();
$input = $app->getInput();

$this->useCoreUI = true;

// In case of modal
$isModal = $input->get('layout') === 'modal';
$layout  = $isModal ? 'modal' : 'edit';
$tmpl    = $isModal || $input->get('tmpl', '', 'cmd') === 'component' ? '&tmpl=component' : '';
?>

<form action="<?php echo Route::_('index.php?option=com_prion&layout=' . $layout . $tmpl . '&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="course-form" aria-label="<?php echo Text::_('COM_PRION_COURSE_' . ( (int) $this->item->id === 0 ? 'NEW' : 'EDIT'), true); ?>" class="form-validate">

	<?php echo LayoutHelper::render('joomla.edit.title_alias', $this); ?>

	<div>
		<?php echo HTMLHelper::_('uitab.startTabSet', 'myTab', array('active' => 'details')); ?>

		<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'details', Text::_('COM_PRION_GLOBAL_TAB_BASIC')); ?>
		<div class="row">
			<div class="col-lg-9">
				<div class="card">
					<div class="card-body">
						The form fields could be rendered here.
						Your can render field by using - <br />
						<code>&lt;?php echo $this->form->renderField('fieldName'); ?&gt;</code>
						<?php
							$icons = ['wifi', 'cog', 'times', 'stop', 'spinner', 'stop', 'smiley-2',
							'smiley-happy-2',
							'smiley-happy',
							'smiley-neutral-2',
							'smiley-neutral',
							'smiley-sad-2',
							'smiley-sad',
							'smiley'];
						?>
						<div class="d-flex justify-content-between">
							<?php foreach ($icons as $icon): ?>
								<?php echo HTMLHelper::_('icon.render', $icon); ?>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card">
					<div class="card-body">
						<?php $this->set('fields',
								array(
									'published',
									'created_by',
									'created',
									'access',
									'language'
								)
						); ?>
						<?php echo LayoutHelper::render('joomla.edit.global', $this); ?>
						<?php $this->set('fields', null); ?>
					</div>
				</div>
			</div>
		</div>
		<?php echo HTMLHelper::_('uitab.endTab'); ?>
		<?php echo HTMLHelper::_('uitab.endTabSet'); ?>
	</div>
	<input type="hidden" name="task" value="">
	<input type="hidden" name="forcedLanguage" value="<?php echo $input->get('forcedLanguage', '', 'cmd'); ?>">
	<?php echo HTMLHelper::_('form.token'); ?>
</form>
