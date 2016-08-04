<?php
/**
 * Created by PhpStorm.
 * User: Rangel
 * Date: 3.6.2016 г.
 * Time: 17:07
 */

$operShortnameOrID = '';
$bonusType = 'Casino Apps';
$bonusReplace = '';
$unsetBonusCheck = '';
$unsetStandartCheck = '';
$bonusLimit = '3';
$mobileOS = 'mobilewebsite'; //iosapp, androidapp, mobilewebsite, windowsphone

$bonuses = getBonuses($operShortnameOrID, $bonusType, $bonusReplace, $unsetBonusCheck, $unsetStandartCheck, $bonusLimit);

$count = 0;
$appArray = array();
foreach ($bonuses as $operator => $bonus) {
foreach ($bonus as $bonusName => $options) {
$count++;
if ($options[$mobileOS] == "yes") {
    array_push($appArray, $operator);
    $appArray = array_unique($appArray);
}

$bewertung = number_format((float)EncodeSpecialCharacters($options['10rating']), 1, '.', '');

$bonusAmmountOpp = $options['amount'];
if ($bonusAmmountOpp['usd'] != '') {
    $bonusAmmount = $bonusAmmountOpp['usd'];
    $bonusAmmountSign = '$';
}
if ($bonusAmmountOpp['eur'] != '') {
    $bonusAmmount = $bonusAmmountOpp['eur'];
    $bonusAmmountSign = '€';
}
if ($bonusAmmountOpp['gbp'] != '') {
    $bonusAmmount = $bonusAmmountOpp['gbp'];
    $bonusAmmountSign = '£';
}
if (!is_numeric($bonusAmmount)) {
    $bonusAmmount = 0;
}
?>

<div class="row" style="position: relative;">
    <div class="col-xs-12" id="top3_mobile_ops_sidebar_header"></div>
</div>
<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <?php
            /*
             *  HTML , koito obhwasta Title-a se promenrq ot function.php register_sidebar(),  before_title i after_title
             * */
            if (!empty($instance['title'])) {
                echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
            }
            ?>
        </div>
    </div>
    <!--OPERATOR BOXES-->
    <div class="row">
        <div class="hvr-float">
            <div class="col-xs-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <a href="<?= getUrl($operator, 1); ?>">
                                <img
                                    src="/assets/images/logos_105x53/<?= strip4url($operator); ?>_105x53.png"
                                    alt="<?= $operator ?>" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                                            <span><img src="/assets/images/mobile_logo_sidebar.png"
                                                       alt="android_logo"></span>
                        <strong><span><?= __('Points', 'mini-strap') ?>:</span>
                            <span><?= $bewertung; ?></span></strong>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-md-pull-1">
                <div class="download_button sidebar-dlBtn-mobile text-center text-uppercase">
                    <a href="#">
                        <img src="/assets/images/download-button-mobile.png"
                             alt="App Download" class="img-responsive">
                        <strong><?= _x('app-download', 'button', 'mini-strap') ?></strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>