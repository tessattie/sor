<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<div class="customers index large-9 medium-8 columns content">
    <table cellpadding="0" cellspacing="0" id="customersTable">
        <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">NIF</th>
                <th scope="col">Home Phone</th>
                <th scope="col">Cell Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Account Type</th>
                <th scope="col">Status</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td class="text-center"><?= h($customer->first_name) ?></td>
                <td><?= h($customer->last_name) ?></td>
                <td><?= h($customer->NIF) ?></td>
                <td><?= $customer->telephone ?></td>
                <td><?= $customer->cellulaire ?></td>
                <td><?= h($customer->email) ?></td>
                <td><?= $account_types[$customer->type_carte] ?></td>
                <?php if($customer->status == 0) : ?>
                    <td><span class="label label-danger"><?= $status[$customer->status] ?></span></td>
                <?php else : ?>
                    <td><span class="label label-success"><?= $status[$customer->status] ?></span></td>
                <?php endif; ?>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
