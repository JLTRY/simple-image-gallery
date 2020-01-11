<?php
/**
 * @version      4.0.0
 * @package      Simple Image Gallery (plugin)
 * @author       JoomlaWorks - https://www.joomlaworks.net
 * @copyright    Copyright (c) 2006 - 2020 JoomlaWorks Ltd. All rights reserved.
 * @license      GNU/GPL license: https://www.gnu.org/licenses/gpl.html
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$extraClass = 'fancybox-gallery';
$customLinkAttributes = 'data-fancybox="gallery'.$gal_id.'"';

$stylesheets = array(
    'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css'
);
$stylesheetDeclarations = array();
$scripts = array(
    'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js'
);

if(!defined('PE_FANCYBOX_LOADED')){
    define('PE_FANCYBOX_LOADED', true);
    $scriptDeclarations = array("
        (function($) {
            $(document).ready(function() {
                $('a.fancybox-gallery').fancybox({
                    buttons: [
                        'slideShow',
                        'fullScreen',
                        'thumbs',
                        'share',
                        'download',
                        //'zoom',
                        'close'
                    ],
                    beforeShow: function(instance, current) {
                        if (current.type === 'image') {
                            var title = current.opts.\$orig.attr('title');
                            current.opts.caption = (title.length ? '<b class=\"fancyboxCounter\">".JText::_('JW_PLG_SIG_FB_IMAGE')." ' + (current.index + 1) + ' ".JText::_('JW_PLG_SIG_FB_OF')." ' + instance.group.length + '</b>' + ' | ' + title : '');
                        }
                    }
                });
            });
        })(jQuery);
    ");
} else {
    $scriptDeclarations = array();
}
