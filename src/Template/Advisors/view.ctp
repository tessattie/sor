<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advisor $advisor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Advisor'), ['action' => 'edit', $advisor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Advisor'), ['action' => 'delete', $advisor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $advisor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Advisors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Advisor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="advisors view large-9 medium-8 columns content">
    <h3><?= h($advisor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $advisor->has('customer') ? $this->Html->link($advisor->customer->id, ['controller' => 'Customers', 'action' => 'view', $advisor->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($advisor->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($advisor->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($advisor->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employer') ?></th>
            <td><?= h($advisor->employer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($advisor->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($advisor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $this->Number->format($advisor->phone) ?></td>
        </tr>
    </table>
</div>
