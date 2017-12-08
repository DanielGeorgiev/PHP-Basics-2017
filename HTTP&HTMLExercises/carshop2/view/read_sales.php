<table>
	<th>Make</th>
	<th>Model</th>
	<th>Year</th>
	<th>Date & Time</th>
    <th>Amount</th>
	<?php foreach($sales as $sale): ?>
		<tr>		 
			<td><?php echo($sale['make']);        ?></td>
			<td><?php echo($sale['model']);       ?></td>
			<td><?php echo($sale['year']);        ?></td>
			<td><?php echo($sale['production_year']);?></td>
            <td class="acc"><?php echo($sale['price']); ?></td>
		</tr>
	<?php endforeach; ?>
    <tr>
        <td colspan="4">Total</td>
        <td class="acc"><?php echo($totalSales); ?></td>
    </tr>
</table>