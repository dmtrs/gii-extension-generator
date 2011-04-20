<?php
class WidgetCode extends CCodeModel
{
    /** Register jquery core lib.
     * @var boolean 
     */
    public $coreJquery;
    /** Register jquery ui core lib.
     * @var boolean
     */
    public $coreJqueryUi; 
    /** The base class widget will extend.
     *  @var string 
     */
    public $widgetClass;
    /** The widget name. This name will be used for the folder as well.
     *  @var stirng 
     */
    public $widgetName;
    /** If there is a need for an asset folder.
     * @var boolean 
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
        /** Create assets folder
        if((bool) $this->assets ) { 
            $this->files[] = new CCodeFile($basePath."/assets/", "");
        }**/
    }
}
