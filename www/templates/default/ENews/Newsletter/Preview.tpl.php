<script type="text/javascript">
    WDN.loadJS("/wdn/templates_3.0/scripts/plugins/ui/jQuery.ui.js",function(){
        WDN.jQuery("#releaseDate").datepicker({
            showOn: 'both',
            buttonImage: '/wdn/templates_3.0/css/content/images/mimetypes/x-office-calendar.png',
            dateFormat: 'yy-mm-dd',
            buttonImageOnly: true
        });
        WDN.loadJS("<?php echo UNL_ENews_Controller::getURL();?>js/preview.js", function(){
            preview.initialize();
        });
    });
    WDN.loadCSS("/wdn/templates_3.0/css/content/forms.css");
    WDN.loadCSS("/wdn/templates_3.0/scripts/plugins/ui/jquery-ui.css");
    WDN.loadCSS("/wdn/templates_3.0/scripts/plugins/ui/ui.datepicker.css");

    WDN.jQuery(function($){
        $('h3 a.showHide').click(function() {
            $(this).parent('h3').nextUntil('h3').slideToggle();
            $(this).toggleClass('show');
            return false;
        });
    });
</script>

<div class="zenbox">
<form class="enews energetic" method="post" action="?view=preview&amp;id=<?php echo $context->newsletter->id; ?>">
    <fieldset style="float:left">
    <legend>Your Newsletter</legend>
    <ol style="margin-top:0">
        <li>
            <input type="hidden" name="_type" value="newsletter" />
            <input type="hidden" name="id" id="id" value="<?php echo $context->newsletter->id; ?>" />
            <label for="emailSubject">Email Subject<span class="required">*</span><span class="helper">Include story keywords!</span></label>
            <input name="subject" type="text" value="<?php echo $context->newsletter->subject; ?>" id="emailSubject" />
            <label for="releaseDate">Release Date</label>
            <input class="datepicker" name="release_date" type="text" size="10" value="<?php echo str_replace(' 00:00:00', '', $context->newsletter->release_date); ?>" id="releaseDate" />
        </li>
    </ol>

    </fieldset>
    <p class="submit" style="float:left;margin-left:60px">
    <input type="submit" name="submit" value="Save" style="margin:50px 20px 0 0" />

    </p>
    <div class="clear"></div>
</form>
<div style="float:right;margin-top:-60px;position:relative;right:53px;top:36px;">
<?php echo $savvy->render($context->newsletter, 'ENews/Newsletter/SendPreviewForm.tpl.php'); ?>
</div>
</div>
<div class="col left" id="drag_story_list">
<?php $stories = $context->getRaw('available_stories'); ?>
<?php foreach (array('news', 'event', 'ad') as $type): ?>
    <div id="<?php echo $type; ?>Available">
        <h3><?php echo ucfirst($type); ?> <span>Submissions</span><a href="#" class="showHide">Hide</a></h3>
        <div class="storyItemWrapper">
            <?php echo $savvy->render($stories->setType($type)); ?>
        </div>
    </div>
<?php endforeach; ?>
</div>
<div class="three_col right">
    <?php echo $savvy->render($context->newsletter, 'templates/email/ENews/Newsletter.tpl.php'); ?>
</div>
