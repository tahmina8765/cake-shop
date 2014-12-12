<div class="row">
    <div class="column large-12">
        <h1>Start Chat</h1>
        <p>Please give us some information so we can best serve you!</p>

        <?php echo $this->Form->create('Chat', array('action' => 'start', 'novalidate' => true)); ?>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('email');
        echo $this->Form->input('keywords');
        echo $this->Form->input('reason');
        echo $this->Form->button(__('Submit'));
        ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>