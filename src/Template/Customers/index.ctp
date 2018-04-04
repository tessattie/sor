<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Advisors'), ['controller' => 'Advisors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Advisor'), ['controller' => 'Advisors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customers index large-9 medium-8 columns content">
    <h3><?= __('Customers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NIF') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cellulaire') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entreprise') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employeur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel_employeur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('post_occupe') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adresse_employeur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_carte') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_client') ?></th>
                <th scope="col"><?= $this->Paginator->sort('carte_identite') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $this->Number->format($customer->id) ?></td>
                <td><?= h($customer->first_name) ?></td>
                <td><?= h($customer->last_name) ?></td>
                <td><?= h($customer->NIF) ?></td>
                <td><?= $this->Number->format($customer->telephone) ?></td>
                <td><?= $this->Number->format($customer->cellulaire) ?></td>
                <td><?= h($customer->address) ?></td>
                <td><?= h($customer->email) ?></td>
                <td><?= h($customer->entreprise) ?></td>
                <td><?= h($customer->employeur) ?></td>
                <td><?= $this->Number->format($customer->tel_employeur) ?></td>
                <td><?= h($customer->post_occupe) ?></td>
                <td><?= h($customer->adresse_employeur) ?></td>
                <td><?= $this->Number->format($customer->status) ?></td>
                <td><?= $this->Number->format($customer->type_carte) ?></td>
                <td><?= h($customer->num_client) ?></td>
                <td><?= h($customer->carte_identite) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
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
