<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Advisors'), ['controller' => 'Advisors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Advisor'), ['controller' => 'Advisors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($customer->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($customer->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NIF') ?></th>
            <td><?= h($customer->NIF) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($customer->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($customer->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entreprise') ?></th>
            <td><?= h($customer->entreprise) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employeur') ?></th>
            <td><?= h($customer->employeur) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Post Occupe') ?></th>
            <td><?= h($customer->post_occupe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adresse Employeur') ?></th>
            <td><?= h($customer->adresse_employeur) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Client') ?></th>
            <td><?= h($customer->num_client) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Carte Identite') ?></th>
            <td><?= h($customer->carte_identite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= $this->Number->format($customer->telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cellulaire') ?></th>
            <td><?= $this->Number->format($customer->cellulaire) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel Employeur') ?></th>
            <td><?= $this->Number->format($customer->tel_employeur) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($customer->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Carte') ?></th>
            <td><?= $this->Number->format($customer->type_carte) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Advisors') ?></h4>
        <?php if (!empty($customer->advisors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Employer') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->advisors as $advisors): ?>
            <tr>
                <td><?= h($advisors->id) ?></td>
                <td><?= h($advisors->customer_id) ?></td>
                <td><?= h($advisors->first_name) ?></td>
                <td><?= h($advisors->address) ?></td>
                <td><?= h($advisors->phone) ?></td>
                <td><?= h($advisors->email) ?></td>
                <td><?= h($advisors->employer) ?></td>
                <td><?= h($advisors->last_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Advisors', 'action' => 'view', $advisors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Advisors', 'action' => 'edit', $advisors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Advisors', 'action' => 'delete', $advisors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $advisors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
