<html>
    <meta charset="utf-8"/>
    <title>게시판</title>
</html>
<body>
    <form action="./write.php" method="POST" enctype="multipart/form-data">
	<table>
	<col width=100></col><col width=100></col>
		<tr>
			<td>item id:</td>
			<td><input type="text" name="id" /></td>
		</tr>
		<tr>
			<td>item name:</td>
			<td><input type="text" name="subject" /></td>
		</tr>
		<tr>
			<td>price:</td>
			<td><input type="num" name="price"/></td>
		</tr>
		<tr>
			<td>images:</td>
			<td><input type="file" id="file" name="file" required /></td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="전송" />
			</td>
		</tr>
		</table>
    </form>
</body>
</html>