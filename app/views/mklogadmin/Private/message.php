<?php if (isset($message)): ?>
<?php foreach ($message as $row): ?>
<div class="cont">
<p>От кого: <?php htmlout($row['name'])?></p>
<p>Дата: <?php htmlout($row['date'])?></p>
<p>Почта: <?php htmlout($row['mail'])?></p>
<p>Сообщение: <?php htmlout($row['message'])?></p>
<a  class='del-mess'><button>Удалить</button></a>
<input type="hidden" value="<?=$row['id']?>">
</div>
<?php endforeach;?>
<?php endif;?>