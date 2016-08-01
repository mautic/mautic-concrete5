<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<div xmlns="http://www.w3.org/1999/html">
    <div class="form-group">
        <label for="mauticVideoUrl" class="control-label"><?php echo t('Mautic URL') ?></label>
        <input id="mauticVideoUrl" name="mautic_base_url" value="<?php echo $mautic_base_url ?>" class="form-control" placeholder="http://" />
    </div>
    <div class="form-group">
        <label for="mauticSrc" class="control-label"><?php echo t('Video URL') ?></label>
        <input id="mauticSrc" name="mautic_src" value="<?php echo $mautic_src ?>" class="form-control" placeholder="http://" />
    </div>
    <div class="form-group">
        <label for="mauticGateTime" class="control-label"><?php echo t('Gate Time') ?></label>
        <input id="mauticGateTime" name="mautic_gate_time" value="<?php echo $mautic_gate_time ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label for="mauticFormId" class="control-label"><?php echo t('Form ID') ?></label>
        <input id="mauticFormId" name="mautic_form_id" value="<?php echo $mautic_form_id ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label for="mauticWidth" class="control-label"><?php echo t('Video Width') ?></label>
        <input id="mauticWidth" name="mautic_width" value="<?php echo $mautic_width ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label for="mauticHeight" class="control-label"><?php echo t('Video Height') ?></label>
        <input id="mauticHeight" name="mautic_height" value="<?php echo $mautic_height ?>" class="form-control" />
    </div>
</div>