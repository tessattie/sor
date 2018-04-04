<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Advisor[]|\Cake\Collection\CollectionInterface $advisors
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Advisor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="advisors index large-9 medium-8 columns content">
    <h3><?= __('Advisors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($advisors as $advisor): ?>
            <tr>
                <td><?= $this->Number->format($advisor->id) ?></td>
                <td><?= $advisor->has('customer') ? $this->Html->link($advisor->customer->id, ['controller' => 'Customers', 'action' => 'view', $advisor->customer->id]) : '' ?></td>
                <td><?= h($advisor->first_name) ?></td>
                <td><?= h($advisor->address) ?></td>
                <td><?= $this->Number->format($advisor->phone) ?></td>
                <td><?= h($advisor->email) ?></td>
                <td><?= h($advisor->employer) ?></td>
                <td><?= h($advisor->last_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $advisor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $advisor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $advisor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $advisor->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
