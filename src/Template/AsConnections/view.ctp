<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AsConnection $asConnection
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit As Connection'), ['action' => 'edit', $asConnection->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete As Connection'), ['action' => 'delete', $asConnection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $asConnection->id)]) ?> </li>
        <li><?= $this->Html->link(__('List As Connections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New As Connection'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="asConnections view large-9 medium-8 columns content">
    <h3><?= h($asConnection->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Locations') ?></th>
            <td><?= h($asConnection->locations) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($asConnection->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo') ?></th>
            <td><?= h($asConnection->logo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longi') ?></th>
            <td><?= h($asConnection->longi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latii') ?></th>
            <td><?= h($asConnection->latii) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($asConnection->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Added By') ?></th>
            <td><?= $this->Number->format($asConnection->added_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($asConnection->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Owner') ?></th>
            <td><?= $this->Number->format($asConnection->owner) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $this->Number->format($asConnection->user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verified Status') ?></th>
            <td><?= $this->Number->format($asConnection->verified_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Program Status') ?></th>
            <td><?= $this->Number->format($asConnection->program_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Health Fund Status') ?></th>
            <td><?= $this->Number->format($asConnection->health_fund_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ts') ?></th>
            <td><?= h($asConnection->ts) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Date Added') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->date_added)); ?>
    </div>
    <div class="row">
        <h4><?= __('Entry Type') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->entry_type)); ?>
    </div>
    <div class="row">
        <h4><?= __('Visibility') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->visibility)); ?>
    </div>
    <div class="row">
        <h4><?= __('Slug') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->slug)); ?>
    </div>
    <div class="row">
        <h4><?= __('Family Name') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->family_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Honorific Prefix') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->honorific_prefix)); ?>
    </div>
    <div class="row">
        <h4><?= __('First Name') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->first_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Middle Name') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->middle_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Last Name') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->last_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Honorific Suffix') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->honorific_suffix)); ?>
    </div>
    <div class="row">
        <h4><?= __('Title') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->title)); ?>
    </div>
    <div class="row">
        <h4><?= __('Organization') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->organization)); ?>
    </div>
    <div class="row">
        <h4><?= __('Organization Visibility') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->organization_visibility)); ?>
    </div>
    <div class="row">
        <h4><?= __('Department') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->department)); ?>
    </div>
    <div class="row">
        <h4><?= __('Contact First Name') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->contact_first_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Contact Last Name') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->contact_last_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Contact Visibility') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->contact_visibility)); ?>
    </div>
    <div class="row">
        <h4><?= __('Addresses') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->addresses)); ?>
    </div>
    <div class="row">
        <h4><?= __('Phone Numbers') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->phone_numbers)); ?>
    </div>
    <div class="row">
        <h4><?= __('Email') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->email)); ?>
    </div>
    <div class="row">
        <h4><?= __('Im') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->im)); ?>
    </div>
    <div class="row">
        <h4><?= __('Social') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->social)); ?>
    </div>
    <div class="row">
        <h4><?= __('Links') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->links)); ?>
    </div>
    <div class="row">
        <h4><?= __('Dates') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->dates)); ?>
    </div>
    <div class="row">
        <h4><?= __('Birthday') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->birthday)); ?>
    </div>
    <div class="row">
        <h4><?= __('Anniversary') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->anniversary)); ?>
    </div>
    <div class="row">
        <h4><?= __('Bio') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->bio)); ?>
    </div>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->notes)); ?>
    </div>
    <div class="row">
        <h4><?= __('Options') ?></h4>
        <?= $this->Text->autoParagraph(h($asConnection->options)); ?>
    </div>
</div>
