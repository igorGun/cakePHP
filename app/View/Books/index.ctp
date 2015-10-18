<?php foreach($books as $book){?>
	<?=$book['Book']['author'];?>: <?=$book['Book']['title'];?>
	<?=$this->Html->link('Покaзать данную книгу',array('action'=>'view',$book['Book']['id']));?> ||
	<?=$this->Html->link('Удалить',array('action'=>'delete',$book['Book']['id']));?> || 
	<?=$this->Html->link('Отредактировать',array('action'=>'edit',$book['Book']['id']));?> <br>
	
<?php }?>
<?=$this->Html->link('Добавить книгу',array('action'=>'add'));?>
<?php
	/*echo $title_for_layout;
	pr($books);
	foreach ($books as $book){
		pr($book['Book']['author']);
	}*/
?>
