<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success notification_new" ><?= $message ?><a class="close_x"></a></div>

<!--<div class="message success notification_new" onclick="this.classList.add('hidden')"><?= $message ?><a class="close_x"></a></div>-->
