<h1>Widget Generator</h1>
<?php $form = $this->beginWidget('CCodeForm', array('model'=>$model)); ?>
    <!-- widget name -->
    <div class='row' >
        <?php echo $form->labelEx($model, 'widgetName'); ?>
        <?php echo $form->textField($model, 'widgetName', array('size'=>45)); ?>
<!--        <div class='tooltip'>
            Widget name must only contain word characters
        </div>-->
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
<!--        <div class='tooltip'>
            Widget base class
        </div>-->
    </div>
    <div class='row' >
        <?php echo $form->checkBox($model, 'assets'); ?>
        <?php echo $model->getAttributeLabel('assets'); ?>
    </div>

    <div class='row' >
        <?php echo $form->checkBox($model, 'coreJquery'); ?>
        <?php echo $model->getAttributeLabel('coreJquery'); ?>
<!-- BUG  <div class='tooltip'>
            Check if you want to register jquery core lib.
        </div> -->
<!--    </div>
    
    <div class='row' >-->
        <?php echo $form->checkBox($model, 'coreJqueryUi'); ?>
        <?php echo $model->getAttributeLabel('coreJqueryUi'); ?>
<!-- BUG  <div class='tooltip'>
            Check if you want to register jquery core lib.
        </div> -->
    </div>
<?php $this->endWidget(); ?>
