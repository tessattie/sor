<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Advisors'), ['controller' => 'Advisors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Advisor'), ['controller' => 'Advisors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customers form large-9 medium-8 columns content">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Edit Customer') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('NIF');
            echo $this->Form->control('telephone');
            echo $this->Form->control('cellulaire');
            echo $this->Form->control('address');
            echo $this->Form->control('email');
            echo $this->Form->control('entreprise');
            echo $this->Form->control('employeur');
            echo $this->Form->control('tel_employeur');
            echo $this->Form->control('post_occupe');
            echo $this->Form->control('adresse_employeur');
            echo $this->Form->control('status');
            echo $this->Form->control('type_carte');
            echo $this->Form->control('num_client');
            echo $this->Form->control('carte_identite');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
