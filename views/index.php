<h1>Widget Generator</h1>
<?php $form = $this->beginWidget('CCodeForm', array('model'=>$model)); ?>
    <!-- widget name -->
    <div class='row' >
        <?php echo $form->labelEx($model, 'widgetName'); ?>
        <?php echo $form->textField($model, 'widgetName', array('size'=>45)); ?>
        <div class='tooltip'>
            Widget name must only contain word characters
        </div>
        <?php echo $form->error($model, 'widgetName'); ?>
    </div>
    <!-- widget base class -->
    <div class='row'>
        <?php echo $form->labelEx($model, 'widgetClass'); ?>
        <?php echo $form->dropDownList($model, 'widgetClass', array(
            'CWidget'=>'CWidget',
            'CBaseListView'=>'CBaseListView',
            'CBasePager'=>'CBasePager',
            'CInputWidget'=>'CInputWidget',
            'CJuiWidget'=>'CJuiWidget',
        )); ?>
    </div>

    <div class='row no-tooltip' >
        <?php echo $form->checkBox($model, 'assets'); ?>
        <?php echo $model->getAttributeLabel('assets'); ?>
    </div>

    <div class='row no-tooltip' >
        <?php echo $form->checkBox($model, 'coreJquery'); ?>
        <?php echo $model->getAttributeLabel('coreJquery'); ?>
        <?php echo $form->checkBox($model, 'coreJqueryUi'); ?>
        <?php echo $model->getAttributeLabel('coreJqueryUi'); ?>
    </div>
<?php $this->endWidget(); ?>
