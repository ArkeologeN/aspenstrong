<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $asConnection->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $asConnection->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List As Connections'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="asConnections form large-9 medium-8 columns content">
    <?= $this->Form->create($asConnection) ?>
    <fieldset>
        <legend><?= __('Edit As Connection') ?></legend>
        <?php
            echo $this->Form->control('ts');
            echo $this->Form->control('date_added');
            echo $this->Form->control('entry_type');
            echo $this->Form->control('visibility');
            echo $this->Form->control('slug');
            echo $this->Form->control('family_name');
            echo $this->Form->control('honorific_prefix');
            echo $this->Form->control('first_name');
            echo $this->Form->control('middle_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('honorific_suffix');
            echo $this->Form->control('title');
            echo $this->Form->control('organization');
            echo $this->Form->control('organization_visibility');
            echo $this->Form->control('department');
            echo $this->Form->control('contact_first_name');
            echo $this->Form->control('contact_last_name');
            echo $this->Form->control('contact_visibility');
            echo $this->Form->control('addresses');
            echo $this->Form->control('phone_numbers');
            echo $this->Form->control('email');
            echo $this->Form->control('im');
            echo $this->Form->control('social');
            echo $this->Form->control('links');
            echo $this->Form->control('dates');
            echo $this->Form->control('birthday');
            echo $this->Form->control('anniversary');
            echo $this->Form->control('bio');
            echo $this->Form->control('notes');
            echo $this->Form->control('options');
            echo $this->Form->control('locations');
            echo $this->Form->control('added_by');
            echo $this->Form->control('edited_by');
            echo $this->Form->control('owner');
            echo $this->Form->control('user');
            echo $this->Form->control('status');
            echo $this->Form->control('verified_status');
            echo $this->Form->control('program_status');
            echo $this->Form->control('health_fund_status');
            echo $this->Form->control('logo');
            echo $this->Form->control('longi');
            echo $this->Form->control('latii');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
