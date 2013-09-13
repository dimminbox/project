<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' ' . Yii::t('news','FAQ');
$this->breadcrumbs=array(
    Yii::t('news','FAQ'),
);
?>
<h2 class="h2"><?php echo Yii::t('news','FAQ') ?></h2>

<div>
    <h3 class="h3">1. About Company</h3>
    <span class='question'>
        1.1 How does the company Cronofunds earn? How do you earn money?
    </span>
    <span class="answer">
        We are the company of investment experts in development of profitable and stable investment strategies.
        At present we take part in different economical spheres. In that way we can achieve a high level of
        diversification and secure stable cash flow. You can read in detail about our approach on our web site
    </span>
</div>
<div>
    <h3 class="h3">2. Registration of Participants</h3>
    <span class='question'>
        2.1 How can I register on the site cronofunds.com?
    </span>
    <span class="answer">
        For registration on the site you need to fill in the form according
        to the link and click on the <?php echo CHtml::link('register', $this->createAbsoluteUrl('signup')); ?>
    </span>
    <span class='question'>
        2.2 I have registered but I can't access my account?
    </span>
    <span class="answer">
        Check your mail, about unauthorized access and change of your password, use a form of recovery of the password,
        at emergence of difficulties – address to a support service
    </span>
    <span class='question'>
        2.3 How can I change e-mail address in my account?
    </span>
    <span class="answer">
        Unfortunately your e-mail address should be constant.
    </span>
    <span class='question'>
        2.4 Can I open several accounts from one computer?
    </span>
    <span class="answer">
        You can open only one account under your name. In case of registration or opening more than one user from one
        computer we have to block all related accounts  up to clarification of the situation.
    </span>
</div>
<div>
    <h3 class="h3">3. About Investment</h3>
    <span class='question'>
        3.1 Who can invest in Cronofunds?
    </span>
    <span class="answer">
        Any user registered on the site and having account in webmoney can invest in the company.
        Remind that only a user age of 18 years can participate in investment.
    </span>
    <span class='question'>
        3.2 What webmoney do you work with?
    </span>
    <span class="answer">
        We work with perfect money. You can open an account in Perfect Money
        <?php echo CHtml::link('here', 'http://perfectmoney.is'); ?>
    </span>
    <span class='question'>
        3.3 How can you make the deposit?
    </span>
    <span class="answer">
        Open your personal cabinet, choose invest plan according to which you are going to work,
        indicate the sum and click “invest”
    </span>
    <span class='question'>
        3.4 Transferred money but it is not represented on your balance.
    </span>
    <span class="answer">
        It happens because of occupation of the payment system. In two hours the sum will arrive into the account ,
        otherwise, address to a support service.
    </span>
    <span class='question'>
        3.5 Where can I see my accrual daily percent of the deposit?
    </span>
    <span class="answer">
        All you interested information you can find in a personal cabinet.
    </span>
    <span class='question'>
        3.6 Is interest charged at the weekends?
    </span>
    <span class="answer">
        Our company accomplishes charge interest only on working days according to the invest plans.
    </span>
        <span class='question'>
        3.7 Can I get complicated percent?
    </span>
    <span class="answer">
        Yes, you can use complicated percent but in the manual mode by distribution new deposit.
        Automatic function of daily investment is not provided.
    </span>
</div>
<div>
    <h3 class="h3">4. Referral program</h3>
    <span class='question'>
        4.1 Can I help in development of the company?
    </span>
    <span class="answer">
        Yes, we have a partner program, where you can participate (even without an active deposit)in
        that way you will advance our company
    </span>
    <span class='question'>
        4.2 How can you attract partners?
    </span>
    <span class="answer">
        During the registration a referral link will be generated for you with the help of it you can invite your friends, users of different internet societies to register using this link. Derived income you can deduce immediately
        <br />
        Also in the personal cabinet you will find various promo materials for arrangement on internet societies and resources.
    </span>
    <span class='question'>
        4.3 What income will I get if I participate in a referral program?
    </span>
    <span class="answer">
        Our referral program allows to earn <?php echo 100 * Referral::REFERRAL_PERCENT; ?>% from the income of your
        referrer. Charge is realized daily.
    </span>
</div>
<div>
    <h3 class="h3">5. Withdraw Money</h3>
    <span class='question'>
        5.1 How can I withdraw money?
    </span>
    <span class="answer">
        In your personal cabinet choose WITHDRAW MONEY, indicate necessary sum and confirm the operation.
    </span>
    <span class='question'>
        5.2 How long do you handle requests of withdrawal?
    </span>
    <span class="answer">
        Your request will be handled in 48 hours/ immediately
    </span>
    <span class='question'>
        5.3 Why is not my request handled immediately?
    </span>
    <span class="answer">
        With a view to increasing your security we cannot handle request instantly because our operators are too busy.
    </span>
</div>
<div>
    <h3 class="h3">I cannot find an answer to my question</h3>
    <span class="answer">
        Consult our company’s support service
    </span>
</div>