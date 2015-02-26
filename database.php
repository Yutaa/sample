<html>
<head><title>キャラクター</title></head>
<body>

<?php
	//追加をした場合
	if(isset($_GET['name'])){
		$link = mysql_connect('localhost', 'root', 'hayata');
		if (!$link) {
			die('接続失敗です。'.mysql_error());
		}
		//print('<p>接続に成功しました。</p>');
		
		//******
		//データベース接続
		//******
		$db_selected = mysql_select_db('Game', $link);
		if (!$db_selected){
			die('データベース選択失敗です。'.mysql_error());
		}

		//文字化け対策
		mysql_set_charset('utf8');
		
		//sqlで追加する
		$sql = "INSERT INTO Chara (name,cost,kingtype,type,attribute,skill,askill) VALUES ('". $_GET['name'] ."','". $_GET['cost'] ."','". $_GET['kingtype']."','". $_GET['type'] ."','". $_GET['attribute'] ."','". $_GET['skill'] ."','". $_GET['askill'] ."')";
		$result_flag = mysql_query($sql);

		if (!$result_flag) {
			die('INSERTクエリーが失敗しました。'.mysql_error());
		}
		$result = mysql_query('SELECT * FROM `Chara` WHERE 1 ');
		if (!$result) {
			die('クエリーが失敗しました。'.mysql_error());
		}
		echo "<font size=\"+2\">"."情報を追加しました"."</font>";
		
		//表示
		print('<p>');
		print '<table>';
			print '<caption>'.'キャラクター'.'</caption>';
			print "<thead style=\"background:#ffccff\">";
				print '<tr>';
					print '<th>'.'キャラネーム'.'</th>';
					print '<th>'.'コスト数'.'</th>';
					print '<th>'.'アーサータイプ'.'</th>';
					print '<th>'.'タイプ'.'</th>';
					print '<th>'.'属性'.'</th>';
					print '<th>'.'通常スキル'.'</th>';
					print '<th>'.'覚醒スキル'.'</th>';
				print '</tr>';
			print '</thead>';
		while ($row = mysql_fetch_assoc($result)) {
			print '<tbody>';
				print '<tr>';
					print('<td>'.$row['name']);
					print('<td>'.$row['cost']);
					print('<td>'.$row['kingtype']);
					print('<td>'.$row['type']);
					print('<td>'.$row['attribute']);
					print('<td>'.$row['skill']);
					print('<td>'.$row['askill']);
					print('</p>');
				print '</tr>';
		}
		print '</tbody>';
		print '</table>';
		
		//******
		//MySQLの接続を切る
		//******
		$close_flag = mysql_close($link);

		if ($close_flag){
			print('<p>切断に成功しました。</p>');
		}
	} else {
		//ページを開いた場合
		$link = mysql_connect('localhost', 'root', 'hayata');
		if (!$link) {
			die('接続失敗です。'.mysql_error());
		}
		//print('<p>接続に成功しました。</p>');
		//******
		//データベース接続
		//******
		$db_selected = mysql_select_db('Game', $link);
		if (!$db_selected){
			die('データベース選択失敗です。'.mysql_error());
		}
		//print('<p>test02データベースを選択しました。</p>');

		//文字化け対策
		mysql_set_charset('utf8');
		
		$result = mysql_query('SELECT * FROM `Chara` WHERE 1 ');
		if (!$result) {
			die('クエリーが失敗しました。'.mysql_error());
		}
		//表示
		print('<p>');
		print '<table>';
			print '<caption>'.'キャラクター'.'</caption>';
			print "<thead style=\"background:#ffccff\">";
				print '<tr>';
					print '<th>'.'キャラネーム'.'</th>';
					print '<th>'.'コスト数'.'</th>';
					print '<th>'.'アーサータイプ'.'</th>';
					print '<th>'.'タイプ'.'</th>';
					print '<th>'.'属性'.'</th>';
					print '<th>'.'通常スキル'.'</th>';
					print '<th>'.'覚醒スキル'.'</th>';
				print '</tr>';
			print '</thead>';
		while ($row = mysql_fetch_assoc($result)) {
			print '<tbody>';
				print '<tr>';
					print('<td>'.$row['name']);
					print('<td>'.$row['cost']);
					print('<td>'.$row['kingtype']);
					print('<td>'.$row['type']);
					print('<td>'.$row['attribute']);
					print('<td>'.$row['skill']);
					print('<td>'.$row['askill']);
					print('</p>');
				print '</tr>';
		}
		print '</tbody>';
		print '</table>';
	}

	?>
<hr>
<font size="+2">追加</font><br>
<form method="GET" action="database.php">
	キャラネーム入力欄:<input type="text" name="name" size="5" value="">
	コスト数入力欄:<input type="text" name="cost" size="5" value="">
	アーサータイプ入力欄:<input type="text" name="kingtype" size="5" value="">
	タイプ入力欄:<input type="text" name="type" size="5" value="">
	属性入力欄:<input type="text" name="attribute" size="5" value="">
	通常スキル数値欄:<input type="text" name="skill" size="5" value="">
	覚醒スキル数値入力欄:<input type="text" name="askill" size="5" value="">
	<input type="submit" value="登録">
</form>
<hr>
<font size="+2">並び替え</font><br>
<form method="GET" action="database.php">
	
	<input type="submit" value="実行">
<hr>
</form>
<p>
<a href="<?php echo $_SERVER["SCRIPT_NAME"]; ?>">ページを更新</a>
</p>
<p>
<a href="MA.php">Topに戻る</a>
</p>
</body>
</html>
