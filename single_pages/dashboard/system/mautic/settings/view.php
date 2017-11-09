<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<form method="post" action="<?php echo $this->action('submit'); ?>">
    <?php echo $token->output('submit');?>
    <fieldset>
        <div class="form-group">
            <label for="mauticTrackingUrl" class="control-label"><?php echo t('Mautic URL') ?></label>
            <input id="mauticTrackingUrl" name="mautic_base_url" value="<?php echo $url ?>" class="form-control" placeholder="https://..." />
        </div>
    </fieldset>

    <div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
            <button class="pull-right btn btn-success" type="submit"><?php echo t('Save') ?></button>
        </div>
    </div>
</form>
