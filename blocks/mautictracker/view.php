<?php defined('C5_EXECUTE') or die(_("Access Denied."));

if (\Page::getCurrentPage()->isEditMode()) { ?>
    <div class="ccm-edit-mode-disabled-item">
        <?php echo t('Mautic Tracker disabled in edit mode.') ?>
    </div>
<?php } else { ?>
    <img style="display:none" src="<?php  print $mautic_base_url; ?>/mtracking.gif<?php echo $encodedAttrs ?>" />
<?php }
