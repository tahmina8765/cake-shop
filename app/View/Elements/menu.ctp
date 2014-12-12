<nav class="top-bar">
    <ul class="title-area">
        <!-- Title Area -->
        <li class="name">
            <h1><?php echo $this->Html->link(__('Cake Shop'), '/'); ?></h1>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
        <!-- Left Nav Section -->
        <?php
        $groupId = AuthComponent::user('group_id');
        switch ($groupId) {
            case 1:
                echo $this->element('admin_menu');
                break;
            case 2:
                echo $this->element('agent_menu');
                break;
            default:
                echo $this->element('guest_menu');
                break;
        }
        ?>


        <!-- Right Nav Section -->
        <ul class="right">
            <li class="divider hide-for-small"></li>
                <?php
                $userId = AuthComponent::user('id');
                if (!empty($userId)) {
                    ?>
                <li><?php echo $this->Html->link(__('Logout'), array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'logout')); ?></li>
                <li><?php echo $this->Html->link(__('Change Password'), array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'changePassword')); ?></li>
                <?php
            } else {
                ?>
                <li><?php echo $this->Html->link('Login', array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'login')); ?></li>
                <?php
            }
            ?>
        </ul>
    </section>
</nav>