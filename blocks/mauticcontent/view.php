<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<div id="QuoteBlock<?php echo intval($bID)?>">
    <script type="text/javascript" src="<?php echo $mautic_base_url ?>/dwc/generate.js?slot=<?php echo $mautic_slot_name ?>"></script>
    <div id="mautic-slot-<?php echo $mautic_slot_name ?>"><?php echo $mautic_slot_default_content ?></div>
</div>