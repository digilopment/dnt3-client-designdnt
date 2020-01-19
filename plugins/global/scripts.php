<!-- MAIN MENU   -->
<script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/tinynav.min.js?ver=4.5.2'></script>
<script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/nervesliderui.js?ver=4.5.2'></script>
<script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/nerveslider.min.js?ver=4.5.2'></script>
<script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/jquery.hoverdir.js?ver=4.5.2'></script>
<script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/jquery.quovolver.js?ver=4.5.2'></script>
<script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/jquery.imagesloaded.js?ver=4.5.2'></script>
<script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/jquery.wookmark.js?ver=4.5.2'></script>
<script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/jquery.colorbox-min.js?ver=4.5.2'></script>
<script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/jflickrfeed.min.js?ver=4.5.2'></script>
<script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/custom.js?ver=4.5.2'></script>
<script type='text/javascript' src='<?php echo $data['media_path']; ?>/js/wp-embed.js?ver=4.5.2'></script>
<script type="text/javascript">
   jQuery('#cbox').jflickrfeed({
    limit:6,    qstrings: { id: "52617155@N08"},    itemTemplate:
   '<li>' +
          '<a class="photo" href="{{image}}" title="{{title}}">' +
                  '<img src="{{image_s}}" alt="{{title}}" />' +
          '</a>' +
   '</li>'
   }, function (data) {
    jQuery('#cbox a').colorbox({maxWidth:'95%', maxHeight:'95%'});
   });
</script>