<?php
class WidgetCode extends CCodeModel
{
    /** The base class widget will extend.
     *  @var string 
     */
    public $widgetClass;
    /** The widget name. This name will be used for the folder as well.
     *  @var stirng 
     */
    public $widgetName;

    //Check http://www.yiiframework.com/doc/guide/1.1/en/topics.gii
    public function rules()
    {
        return array_merge(parent::rules(), array(
            array('widgetName, widgetClass', 'required'),
        ));
    }
    public function prepare()
    {
        $path = Yii::getPathOfAlias('ext.'.$this->widgetName.'.'.$this->widgetName).'.php';

        $code = $this->render($this->templatepath.'/widget.php');

        $this->files[] = new CCodeFile($path, $code);
    }
}
