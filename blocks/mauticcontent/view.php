<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<div id="MauticContentBlock<?php echo intval($bID)?>">
    <div class="mautic-slot" data-slot-name="<?php echo $mautic_slot_name ?>"><?php echo $mautic_slot_default_content ?></div>
</div>