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
    /** The core javascript libs to register
     * @var array
     */
    private $coreJs = array(<?php foreach($corejs as $lib) { echo " '$lib',"; } ?>);
    <?php } echo "\n"; ?>
    public function init()
    {
    }
    public function run()
    {
    }
}
