<?php
defined('C5_EXECUTE') or die("Access Denied.");
$ps = Core::make('helper/form/page_selector');
$al = Core::make('helper/concrete/asset_library');
$editor = Core::make('editor');
?>
<fieldset>
    <legend>
        <?=t('Location')?>
    </legend>
    <div class="form-group">
        <?php echo $form->label('title', t('Title')); ?>
        <?php echo $form->text('title', $title); ?>
    </div>
    <div class="form-group">
        <?php echo $form->label('addressLine1', t('Address Line 1')); ?>
        <?php echo $form->text('addressLine1', $addressLine1); ?>
    </div>
    <div class="form-group">
        <?php echo $form->label('addressLine2', t('Address Line 2')); ?>
        <?php echo $form->text('addressLine2', $addressLine2); ?>
    </div>
    <div class="form-group">
        <?php echo $form->label('city', t('City')); ?>
        <?php echo $form->text('city', $city); ?>
    </div>
    <div class="form-group">
        <?php echo $form->label('state', t('State')); ?>
        <?php echo $form->text('state', $state); ?>
    </div>
    <div class="form-group">
        <?php echo $form->label('zip', t('Zip')); ?>
        <?php echo $form->text('zip', $zip); ?>
    </div>
    <div class="form-group">
        <?php echo $form->label('country', t('Country')); ?>
        <?php echo $form->text('country', $country); ?>
    </div>
    <div class="form-group">
        <?php echo $form->label('customLink', t('Marker Link')); ?>
        <?php echo $form->text('customLink', $customLink); ?>
    </div>
</fieldset>
