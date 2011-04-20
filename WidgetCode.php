<?php
class WidgetCode extends CCodeModel
{
    /** Register jquery core lib.
     * @var boolean
     * @since 0.1
     */
    public $coreJquery;
    /** Register jquery ui core lib.
     * @var boolean
     * @since 0.1
     */
    public $coreJqueryUi; 
    /** The base class widget will extend.
     * @var string 
     * @since 0.1
     */
    public $widgetClass;
    /** The widget name. This name will be used for the folder as well.
     * @var string 
     * @since 0.1
     */
    public $widgetName;
    /** If there is a need for an asset folder.
     * @var boolean 
     * @since 0.1
     */
    public $assets;

    //Check http://www.yiiframework.com/doc/guide/1.1/en/topics.gii
    public function rules()
    {
        return array_merge(parent::rules(), array(
            array('widgetName, widgetClass', 'required'),
            array('assets, coreJquery, coreJqueryUi' , 'safe'),
        ));
    }
    public function prepare()
    {
        $basePathAlias = 'ext.'.$this->widgetName;
        $basePath = Yii::getPathOfAlias($basePathAlias);
        $path = Yii::getPathOfAlias($basePathAlias.'.'.$this->widgetName).'.php';

        $code = $this->render($this->templatepath.'/widget.php');

        $this->files[] = new CCodeFile($path, $code);

        if((bool) $this->assets ) { 
            foreach( array('js','css') as $fileType)
            {
                $ap = $basePath."/assets/".strtolower($this->widgetName).".".$fileType;
                $this->files[] = new CCodeFile($ap, "/* Put ".$fileType." code in here */\n");
            }
        }
    }
}
