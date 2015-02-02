<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>  
<div>
    <div class="form-group">
        <label for="mauticTrackingUrl" class="control-label"><?php echo t('Mautic URL') ?></label>
        <input id="mauticTrackingUrl" name="mautic_base_url" value="<?php echo $mautic_base_url ?>" class="form-control" placeholder="http://" />
    </div>
</div>