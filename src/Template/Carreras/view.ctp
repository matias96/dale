<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carrera $carrera
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Carrera'), ['action' => 'edit', $carrera->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Carrera'), ['action' => 'delete', $carrera->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carrera->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Carreras'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Carrera'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materias'), ['controller' => 'Materias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Materia'), ['controller' => 'Materias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="carreras view large-9 medium-8 columns content">
    <h3><?= h($carrera->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($carrera->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Materia Id') ?></th>
            <td><?= h($carrera->materia_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= $this->Number->format($carrera->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sala') ?></th>
            <td><?= $this->Number->format($carrera->sala) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Materias') ?></h4>
        <?php if (!empty($carrera->materias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Carrera Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Apellido') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($carrera->materias as $materias): ?>
            <tr>
                <td><?= h($materias->id) ?></td>
                <td><?= h($materias->carrera_id) ?></td>
                <td><?= h($materias->nombre) ?></td>
                <td><?= h($materias->apellido) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Materias', 'action' => 'view', $materias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Materias', 'action' => 'edit', $materias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Materias', 'action' => 'delete', $materias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materias->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
