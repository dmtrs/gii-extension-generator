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
        <div class='tooltip'>
            Widget base class
        </div>
    </div>
<?php $this->endWidget(); ?>
