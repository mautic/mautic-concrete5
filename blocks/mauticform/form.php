<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>  
<div>
    <div class="form-group">
        <label for="mauticFormUrl" class="control-label"><?php echo t('Mautic URL') ?></label>
        <input id="mauticFormUrl" name="mautic_base_url" value="<?php echo $mautic_base_url ?>" class="form-control" placeholder="http://" />
    </div>
    <div class="form-group">
        <label for="mauticFormId" class="control-label"><?php echo t('Form ID') ?></label>
        <input id="mauticFormId" name="mautic_form_id" value="<?php echo $mautic_form_id ?>" class="form-control" placeholder="1" />
    </div>
</div>