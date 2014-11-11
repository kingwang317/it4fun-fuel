<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="bodybox04">
<p class="subject">不用麻煩的履歷，只需要你的基本資料</p>

<p class="content">填寫履歷，多餘又麻煩。何不把它省略呢？<br />
我們只需要您的基本資料，其餘雜事，我們處理！<br />
立即登錄，享受獵才顧問的專業服務！</p>
</div>

<div id="bodybox05">
<p class="subject">因為沒有工作經驗求職處處碰壁?</p>

<p class="content">Young Talent-就愛新鮮人！<br />
經過認證的職缺，我們幫你的求職路把關！</p>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>