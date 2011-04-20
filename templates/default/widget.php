<?php
$corejs = array();
if((bool)$this->coreJqueryUi) {
    $corejs = array( 'jquery', 'jquery.ui' );
} else if((bool) $this->coreJquery) {
    $corejs = array( 'jquery' );
}
?>

<?php echo "<?php\n"; ?>
/** 
 * <?php echo $this->widgetName."\n"; ?>
 * <?php for($i=0; $i < strlen($this->widgetName); $i++) { echo "="; } echo "\n *\n"; ?>
 * <?php echo "Add description of extension here.\n *\n"; ?>
 * @version 0.1
 * @author
 */
class <?php echo $this->widgetName; ?> extends <?php echo $this->widgetClass."\n"; ?>
{
<?php if(!empty($corejs)) { ?>
    /** The core javascript libs to register.
     * @var array
     */
    private $coreJs = array(<?php foreach($corejs as $lib) { echo " '$lib',"; } ?>);
<?php } echo "\n"; ?>
<?php if(!empty($this->scripts)) { ?>
<?php foreach($this->scripts as $type=>$files)
    {
echo "    /** The $type scripts to register.\n";
echo "     * @var array\n";
echo "     */\n";
echo "    private $$type = array(\n";
        foreach($files as $f) 
        {
        echo "        '$f',\n";
        }
echo "    );\n";
    } 
} ?>

<?php if((bool) $this->assets ) { ?>
    /** The asset folder after published
     * @var string
     */
    private $assets;
<?php } echo "\n";?>
<?php if((bool) $this->assets ) { ?>
    private function publishAssets() 
    {
        $assets = dirname(__FILE__).DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR;
        $this->assets = Yii::app()->getAssetManager()->publish($assets);
    }
<?php } echo "\n"; ?>
<?php if(!empty($this->scripts) || !empty($corejs)) { ?>
    private function registerScripts()
    {
        $cs = Yii::app()->clientScript;
<?php   if(!empty($corejs)) { ?>
        foreach($this->codeJs as $file)
        {
            if(!$cs->isScriptRegistered($file))
                $cs->registerCoreScript($file);
        }        
<?php   } ?>

<?php   if(!empty($this->scripts)) { ?>
<?php //TODO: register scripts js and css here ?>
<?php   } ?>
    }
<?php } echo "\n"; ?>
    public function init()
    {
<?php if((bool) $this->assets ) { ?>
        $this->publishAssets();
<?php } ?>
<?php if(!empty($this->scripts) || !empty($corejs)) { ?>
        $this->registerScripts();
<?php } ?>
    }
    public function run()
    {
    }
}
