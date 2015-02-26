<?php
	//sessionスタート
	session_start();
	//背景ランダム
	$_SESSION['Back'] = rand(1,1);
?>
<html>
<head><title>ダメージシミュレーター</title></head>
<body>
<p>
<div style="text-align:center"><font size="+4">乖離性ミリオンアーサーのダメージシミュレーター</font></div>
<p>
<body background="./Pictures/so.jpg" style="background-repeat : no-repeat; background-size: cover;">
<fieldset>
<legend>リンクまとめ</legend>
<p>
<a href="#a">・ダメージ計算式</a>
</p>
<p>
<a href="#b">・戦闘中のカードに表示されている値</a>
</p>
<p>
<a href="#c">・各色チアリー確殺</a>
</p>
<p>
<a href="#d">・(応用)富豪ケルピーで青チアリー確殺</a>
</p>
<p>
<a href="database.php">・キャラクター一覧</a>
</p>
</fieldset>
<font size="+2"><a name="a">・ダメージ計算式(デバブなし)</font><br>
<font size="+2">公式 : (戦闘中のカードに表示されている値) × 属性補正 × チェイン補正 × クリティカル補正 ｰ (敵の防御力ｰダメージダウン補正)</font><br>
<form method="GET" action="result.php">
	<p>
	カードに表示されている値:<input type="text" name="card" size="5" value="">
	</p>
	<p>
	属性補正:<input type="radio" name="spot" size="5" value="普通" checked>普通
	<input type="radio" name="spot" size="5" value="有効">有効
	<input type="radio" name="spot" size="5" value="苦手">苦手
	</p>
	<p>
	チェイン:<select name="chain">
	<option value="チェインなし">チェインなし</option>
	<option value="2チェイン">2チェイン</option>
	<option value="3チェイン">3チェイン</option>
	<option value="4チェイン">4チェイン</option>
	</select>
	</p>
	<p>
	クリティカル:<select name="critical">
	<option value="クリティカルなし">クリティカルなし</option>
	<option value="クリティカルあり">クリティカルあり</option>
	</select>
	</p>
	<input type="hidden" name="pass" value="<?php echo $pass = 1; ?>">
	<input type="submit" value="実行"><input type="reset" value="リセット">
</form>
<hr>
</body>
<body>
<hr>
<font size="+2"><a name="b">・戦闘中のカードに表示されている値</font><br>
<font size="+2">公式 : デッキ攻撃力(物理or魔法) + キャラクター攻撃力(覚醒ｏｒ未覚醒) + ダメージアップ補正(バブ)</font><br>
</font><br>
<form method="GET" action="result.php">
	<p>
	デッキ攻撃力(物理or魔法):<input type="text" name="deck" size="5" value="">
	</p>
	<p>
	キャラクター攻撃力(覚醒ｏｒ未覚醒):<input type="text" name="character" size="5" value="">
	</p>
	<p>
	ダメージアップ補正(バブ):<input type="text" name="buff" size="5" value="0">
	<p>
	<input type="hidden" name="pass" value="<?php echo $pass = 2; ?>">
	<input type="submit" value="実行"><input type="reset" value="リセット">
</form>
<hr>
</body>
<body>
<hr>
<font size="+2"><a name="c">・各色チアリー確殺</font><br>
<font size="+2">公式:<font color="#00BFFF">チアリー</font>HP10130,<font color="#ff0000">スーパーチアリー</font>チアリーHP16800,<font color="#FF69B4">アルティメットチアリー</font>HP23630</font><br>
</font><br>
<form method="GET" action="result.php">
	<p>
	カードに表示されている値:<input type="text" name="damage" size="5" value="">
	</p>
	<p>
	属性補正:<input type="radio" name="spot" size="5" value="普通">普通
	<input type="radio" name="spot" size="5" value="有効" checked>有効
	<input type="radio" name="spot" size="5" value="苦手">苦手
	</p>
	<p>
	ダメージアップ補正(バブ):<input type="text" name="buff" size="5" value="0">
	</p>
	<p>
	チェイン:<select name="chain">
	<option value="チェインなし">チェインなし</option>
	<option value="2チェイン">2チェイン</option>
	<option value="3チェイン">3チェイン</option>
	<option value="4チェイン">4チェイン</option>
	</select>
	</p>
	<p>
	クリティカル:<select name="critical">
	<option value="クリティカルなし">クリティカルなし</option>
	<option value="クリティカルあり">クリティカルあり</option>
	</select>
	</p>
	<input type="hidden" name="pass" value="<?php echo $pass = 3; ?>">
	<input type="submit" value="実行"><input type="reset" value="リセット">
</form>
<hr>
</body>
<body>
<hr>
<font size="+2"><a name="d">・(応用)富豪ケルピーで<font color="#00BFFF">チアリー</font>確殺</font><br>
<font size="+2"><a name="d">公式 : <font color="#00BFFF">チアリー</font>HP10130 = (戦闘中のカードに表示されている値) × チェイン補正 × クリティカル補正</font><br>
</font><br>
<form method="GET" action="result.php">
	<p>
	デッキ攻撃力(物理):<input type="text" name="damage" size="5" value="">
	</p>
	<p>
	ケルピーLvMaxダメ:<input type="text" name="kerupi" size="5" value="6570">
	</p>
	<p>
	ダメージアップ補正(バブ):<input type="text" name="buff" size="5" value="0">
	</p>
	<p>
	チェイン:<select name="chain">
	<option value="チェインなし">チェインなし</option>
	<option value="2チェイン">2チェイン</option>
	<option value="3チェイン">3チェイン</option>
	<option value="4チェイン">4チェイン</option>
	</select>
	</p>
	<p>
	クリティカル:<select name="critical">
	<option value="クリティカルなし">クリティカルなし</option>
	<option value="クリティカルあり">クリティカルあり</option>
	</select>
	</p>
	<input type="hidden" name="pass" value="<?php echo $pass = 4; ?>">
	<input type="submit" value="実行"><input type="reset" value="リセット">
</form>
<hr>
</body>
<hr>
</body>
</html>
