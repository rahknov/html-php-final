<!DOCTYPE html>
<html>
<head><title>View Books 1</title>

	
	
</head>

<body>

<table>
	<thead>
	<tr>
		<th width=21% align="center">Title</th>
		<th width=21% align="center">Author</th>
		<td width=50% align="center">Abstract</td>
		<td width=8% align="center">Action</td>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<td width=21% align="center">Title</td>
		<td width=21% align="center">Author</td>
		<td width=50% align="center">Abstract</td>
		<td width=8% align="center">Action</td>
	</tr>
	</tfoot>
	<tbody>
	<?php
		foreach($books as $title=>$MybookList)
		{

			echo "<tr>";
				echo "<td><a href='index.php?command=bookDetails&&page=$MybookList->Title'>". $MybookList->Title ."</a></td>";
				echo "<td>". $MybookList->Author ."</td>";
				echo "<td>". $MybookList->Abstract ."</td>";												
				//modify your code into this
				echo "<td>Edit | <a href='index.php?command=deleteRec&&ISBN=".$MybookList->ISBN."' onclick='return confirm(\"Are you sure you want to do Delete this record?\")'>Delete</a></td>";
			echo "</tr>";
		}
	?>
	</tbody>
</table>

</body>
</html>