<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' ' . Yii::t('news','Referral');
$this->breadcrumbs=array(
    Yii::t('news','Referral'),
);
?>
<h2 class='h2'><?php echo Yii::t('news','Referral') ?></h2>

<div>

    <span class='question'>
        1. Basis
    </span>
    <span class="answer">
        1.1 Every user registered on the site cronofunds.com hereinafter referred to as the Investor,
        participate in referral program<br />
        1.2 The referral link as http://cronofunds.com/?ref=username is appropriated to every investor. The personal referral
        link is available to the Investor in his personal cabinet. Passing your referral
        link and extending in different ways Investor accept all the conditions of this agreement.<br />
        1.3 Investor is considered involved (further Involved investor) if he accomplished the following actions<br />
         - Receive an invitation from Investor in the form of a referral link.<br />
         - Click on the referral link and register on the site cronofunds.com indicated vali data during the registration of your account.
    </span>
</div>
<div>

    <span class='question'>
        2. Payment period and amount of remuneration to Investor according to the referral program
    </span>
    <span class="answer">
        2.1 Remuneration payment according to the referral program is daily on weekdays at 13:00 (London time). Amount of
        referral remuneration  - <?php echo 100 * Referral::REFERRAL_PERCENT; ?>%  from daily income of Involved investor.
    </span>
</div>
<div>

    <span class='question'>
        3. Responsibilities:
    </span>
    <span class="answer">
         3.1 Investor is prohibited to register himself  by the referral link. In case of detection (IP, MAC etc.)
        such actions payments for the referral program are stopped.
    </span>
</div>