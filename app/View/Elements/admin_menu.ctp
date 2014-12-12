<ul class="left">
    <li class="divider"></li>
    <li class="active"><a href="#">Main Item 1</a></li>
    <li class="divider"></li>
    <li><a href="#">Setup</a></li>
    <li class="divider"></li>
    <li class="has-dropdown"><a href="#">Setup</a>

        <ul class="dropdown">
            <li class="has-dropdown"><a href="#"><?php echo __('Groups'); ?></a>
                <ul class="dropdown">
                    <li><?php echo $this->Html->link(__('New Group'), array('plugin' => 'cauth', 'controller' => 'groups', 'action' => 'add')); ?></li>
                    <li><?php echo $this->Html->link(__('List Groups'), array('plugin' => 'cauth', 'controller' => 'groups', 'action' => 'index')); ?></li>
                </ul>
            </li>
            <li class="has-dropdown"><a href="#"><?php echo __('Users'); ?></a>
                <ul class="dropdown">
                    <li><?php echo $this->Html->link(__('New User'), array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'add')); ?></li>
                    <li><?php echo $this->Html->link(__('List Users'), array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'index')); ?></li>
                </ul>
            </li>
            <li class="has-dropdown"><a href="#"><?php echo __('Others'); ?></a>
                <ul class="dropdown">
                    <li><?php echo $this->Html->link(__('Permission'), array('plugin' => 'cauth', 'controller' => 'utils', 'action' => 'index')); ?></li>                    
                    <li class="divider"></li>
                    <li><?php echo $this->Html->link(__('New Item'), array('plugin' => 'cauth', 'controller' => 'items', 'action' => 'add')); ?></li>
                    <li><?php echo $this->Html->link(__('List Items'), array('plugin' => 'cauth', 'controller' => 'items', 'action' => 'index')); ?></li>
                    <li class="divider"></li>
                    <li><?php echo $this->Html->link(__('Synchronization'), array('plugin' => 'cauth', 'controller' => 'utils', 'action' => 'acoSync')); ?></li>
                    <li><?php echo $this->Html->link(__('Update Item (must run after synchronization)'), array('plugin' => 'cauth', 'controller' => 'utils', 'action' => 'updateItem')); ?></li>
                    <li><?php echo $this->Html->link(__('Initialize DB'), array('plugin' => 'cauth', 'controller' => 'utils', 'action' => 'initDB')); ?></li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="divider"></li>
</ul>