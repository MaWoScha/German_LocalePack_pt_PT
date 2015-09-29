<?php
/**
 * @category  German
 * @package   German_LocalePack
 * @authors   MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>
 * @developer MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>  
 * @version   0.4.0.
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
$installer = $this;

$installer->startSetup();

$blockContent = <<<EOD
Se você tiver dúvidas ou sugestões, entre em contato conosco ou
por e-mail <a href="mailto:{{var store_email}}">{{var store_email}}</a>,
pelo telefone <a href="tel:{{var phone}}">{{var store_phone}}</a>,
via <a title="My Service-Site on Skype" href="skype:my.shop?chat" target="_blank">Skype-Chat</a> (Usuário: my.shop)
ou no Facebook em nossa <a title="My Fanpage in Facebook" href="http://www.facebook.com/my.shop" target="_blank">My Fanpage</a>.
EOD;

$storeId = 5;

$staticBlocks = array(
    array(
        'title'         => 'eMail Template Say Hello (pt)',
        'identifier'    => 'email_template_say_hello',
        'content'       => 'Caro/a',
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Contact (pt)',
        'identifier'    => 'email_template_contact',
        'content'       => $blockContent,
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Say Bye (pt)',
        'identifier'    => 'email_template_say_bye',
        'content'       => 'Obrigado pela sua confiança!',
        'is_active'     => 0,
        'stores'        => array($storeId)
    )
);

/**
 * Insert default blocks
 */
foreach ($staticBlocks as $data) {
    try {
        Mage::getModel('cms/block')->setData($data)->save();
    } catch (Exception $e) {
        # To prevent exception "A block identifier with the same properties already exists
        # in the selected store." in "app:code:core:Mage:Cms:Model:Resource:Block.php"
#        throw new Exception("Oops, mi error in PT German LocalePack");
    }
}

$installer->endSetup();

?>
