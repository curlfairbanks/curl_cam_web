<?php $channel_list = ["No Change",
												["text" => "Sheet 1 Near", "value" => "SHEET@1NR"],
												["text" => "Sheet 1 Near", "value" =>"SHEET@1FR"],
							          ["text" => "Sheet 2 Near", "value" =>"SHEET@2NR"],
												["text" => "Sheet 2 Near", "value" =>"SHEET@2FR"],
							          ["text" => "Sheet 3 Near", "value" =>"SHEET@3NR"],
												["text" => "Sheet 3 Near", "value" =>"SHEET@3FR"],
							          ["text" => "Sheet 4 Near", "value" =>"SHEET@4NR"],
												["text" => "Sheet 4 Near", "value" =>"SHEET@4FR"],
							          ["text" => "Sheet 5 Near", "value" =>"SHEET@5NR"],
												["text" => "Sheet 5 Near", "value" =>"SHEET@5FR"],
							          ["text" => "Sheet 6 Near", "value" =>"SHEET@6NR"],
												["text" => "Sheet 6 Near", "value" =>"SHEET@6FR"],
							          ["text" => "Wide 1-3 Far", "value" =>"SHEET@W1_3FR"],
												["text" => "Wide 1-3 Near", "value" =>"SHEET@W1_3NR"], 
							          ["text" => "Wide 4-6 Far", "value" =>"SHEET@W4_6FR"],
												["text" => "Wide 4-6 Near", "value" =>"SHEET@W4_6NR"],
							          ["text" => "Side by Side 1", "value" =>"SIDEBYSIDE@1"],
												["text" => "Side by Side 2", "value" =>"SIDEBYSIDE@2"],
												["text" => "Side by Side 3", "value" =>"SIDEBYSIDE@3"],
							          ["text" => "Side by Side 4", "value" =>"SIDEBYSIDE@4"],
												["text" => "Side by Side 5", "value" =>"SIDEBYSIDE@5"],
												["text" => "Side by Side 6", "value" =>"SIDEBYSIDE@6"]
												] ?>
												
<?= $this->Form->create(null) ?>
<table>
	<tr>
		<th colspan="3">All Camera Views</th>
	</tr>
	<tr>
		<td>Change To:</td>
		<td>
			<?= $this->Form->select('all', $channel_list)?>
		</td>
		<td><button type="submit">SET</button></td>
	</tr>
	<?php $sheet_count = 1 ?>
	<?php while($sheet_count<= 6) { ?>
	<tr>
		<th colspan="3">Sheet <?= $sheet_count ?></th>
	</tr>
	<tr>
		<td>Change To:</td>
		<td>
			<?= $this->Form->select('sheet_'.$sheet_count, $channel_list)?>
		</td>
		<td><button type="submit">SET</button></td>
	</tr>
	<?php $sheet_count++ ?>
	<?php } ?>
</table>
<?= $this->Form->end() ?>