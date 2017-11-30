<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materia $materia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Materia'), ['action' => 'edit', $materia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Materia'), ['action' => 'delete', $materia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Materias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Materia'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Carreras'), ['controller' => 'Carreras', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Carrera'), ['controller' => 'Carreras', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materias view large-9 medium-8 columns content">
    <h3><?= h($materia->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($materia->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Carrera Id') ?></th>
            <td><?= h($materia->carrera_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= $this->Number->format($materia->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido') ?></th>
            <td><?= $this->Number->format($materia->apellido) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Carreras') ?></h4>
        <?php if (!empty($materia->carreras)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Sala') ?></th>
                <th scope="col"><?= __('Materia Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($materia->carreras as $carreras): ?>
            <tr>
                <td><?= h($carreras->id) ?></td>
                <td><?= h($carreras->nombre) ?></td>
                <td><?= h($carreras->sala) ?></td>
                <td><?= h($carreras->materia_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Carreras', 'action' => 'view', $carreras->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Carreras', 'action' => 'edit', $carreras->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Carreras', 'action' => 'delete', $carreras->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carreras->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
