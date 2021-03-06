<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advisor $advisor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Advisors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="advisors form large-9 medium-8 columns content">
    <?= $this->Form->create($advisor) ?>
    <fieldset>
        <legend><?= __('Add Advisor') ?></legend>
        <?php
            echo $this->Form->control('customer_id', ['options' => $customers]);
            echo $this->Form->control('first_name');
            echo $this->Form->control('address');
            echo $this->Form->control('phone');
            echo $this->Form->control('email');
            echo $this->Form->control('employer');
            echo $this->Form->control('last_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
