<?php defined('C5_EXECUTE') or die(_("Access Denied."));

$video_type = 'mp4';

if (preg_match('/^.*((youtu.be)|(youtube.com))\/((v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))?\??v?=?([^#\&\?]*).*/', $mautic_src)) {
    $video_type = 'youtube';
}

if (preg_match('/^.*(vimeo\.com\/)((channels\/[A-z]+\/)|(groups\/[A-z]+\/videos\/))?([0-9]+)/', $mautic_src)) {
    $video_type = 'vimeo';
}

?>

<div id="MauticVideoBlock<?php echo intval($bID) ?>">
    <video height="<?php echo $mautic_height ?>" width="<?php echo $mautic_width ?>" data-form-id="<?php echo $mautic_form_id ?>"
           data-gate-time="<?php echo $mautic_gate_time ?>">
        <source type="video/<?php echo $video_type ?>" src="<?php echo $mautic_src ?>"/>
    </video>
</div>