<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion     = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?></title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('foundation.css');
        echo $this->Html->css('marketing.css');
        echo $this->Html->css('style.css');
        echo $this->Html->css('fonts.css');
        echo $this->Html->script('vendor/modernizr.js');
        echo $this->Html->script('vendor/jquery.js');
        echo $this->Html->script('vendor/fastclick.js');
        echo $this->Html->script('foundation/foundation.js');
        echo $this->Html->script('vcp.js');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <script src="http://static.opentok.com/webrtc/v2.2.9/js/opentok.min.js"></script>
        <!--<script src="http://static.opentok.com/webrtc/v2.0/js/TB.min.js" type="text/javascript" charset="utf-8"></script>-->
    </head>
    <body>
        <?php
        echo $this->element('menu');
        ?>
        <div id="container">
            <div id="main-content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <?php // echo $this->element('sql_dump'); ?>
        <script src="http://foundation3.zurb.com/docs/assets/vendor/zepto.js"></script>
        <script src="http://foundation3.zurb.com/docs/assets/docs.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>
