<?php $systemconfig = erLhcoreClassModelChatConfig::fetch($attribute);?>
<label><?php echo htmlspecialchars($systemconfig->explain); ?></label>

<?php if ( $systemconfig->type == erLhcoreClassModelChatConfig::SITE_ACCESS_PARAM_ON ) : ?>

    <?php foreach (erConfigClassLhConfig::getInstance()->getSetting('site','available_site_access') as $siteaccess) : 
    $siteaccessOptions = erConfigClassLhConfig::getInstance()->getSetting('site_access_options',$siteaccess); ?>
    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/editchatconfig','Value in');?> - &quot;<?php echo htmlspecialchars($siteaccess);?>&quot; <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/editchatconfig','site access');?></label>
    <input class="default-input" name="<?php echo $attribute?>Value<?php echo $siteaccess?>" type="text" value="<?php isset($systemconfig->data[$siteaccess]) ? print htmlspecialchars($systemconfig->data[$siteaccess]) : ''?>" />
    <?php endforeach;?>
	
<?php else : ?>
    <input class="default-input" type="text" name="<?php echo $attribute?>ValueParam" value="<?php echo htmlspecialchars($systemconfig->value);?>" />
<?php endif;?>