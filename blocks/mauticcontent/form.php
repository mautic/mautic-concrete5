<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<div xmlns="http://www.w3.org/1999/html">
    <div class="form-group">
        <label for="mauticDynamicContentUrl" class="control-label"><?php echo t('Mautic URL') ?></label>
        <input id="mauticDynamicContentUrl" name="mautic_base_url" value="<?php echo $mautic_base_url ?>" class="form-control" placeholder="http://" />
    </div>
    <div class="form-group">
        <label for="mauticDynamicContentSlot" class="control-label"><?php echo t('Slot Name') ?></label>
        <input id="mauticDynamicContentSlot" name="mautic_slot_name" value="<?php echo $mautic_slot_name ?>" class="form-control" placeholder="" />
    </div>
    <div class="form-group">
        <label for="mauticDynamicContentDefault" class="control-label"><?php echo t('Default Content') ?></label>
        <textarea id="mauticDynamicContentDefault" name="mautic_slot_default_content" class="form-control">
            <?php echo $mautic_slot_default_content ?>
        </textarea>
    </div>
</div>