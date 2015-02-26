<html>
<head><title>実行結果</title></head>
<p>
<center><font size="+3"><<<実行結果>>></font>
<p>
<body background="./Pictures/bg_02.png" style="background-repeat : no-repeat; background-size: cover;">


<?php
	if(isset($_GET['pass'])){
		if($_GET['pass'] == 1){
			//**********
			//・ダメージ計算式
			//**********
			
			//card
			$card = $_GET['card'];
			//spot
			$spot = $_GET['spot'];
			if($spot == "普通"){
				$spot = 1;
			}
			else if($spot == "有効"){
				$spot = 2;
			}
			else if($spot == "苦手"){
				$spot = 0.5;
			}
			//chain
			$chain = $_GET['chain'];
			if($chain == "チェインなし"){
				$chain = 1;
			}
			else if($chain == "2チェイン"){
				$chain = 1.2;
			}
			else if($chain == "3チェイン"){
				$chain = 1.4;
			}
			else if($chain == "4チェイン"){
				$chain = 1.6;
			}
			$critical = $_GET['critical'];
			if($critical == "クリティカルなし"){
				$critical = 1;
			}
			else if($critical == "クリティカルあり"){
				$critical = 1.5;
			}
			//*****
			//表示
			//*****
			if($card == ""){
				echo "カードに表示されている値:";
				$error = "入力なし";
				echo $error."<br>";
				echo '<font color="#ff0000">'."計算できません".'</font>'."<br>";
			} else {
				echo "カードに表示されている値:".$card."<br>";
				echo "属性補正:".$_GET['spot']."<br>";
				echo "チェイン:".$_GET['chain']."<br>";
				echo "クリティカル:".$_GET['critical']."<br>";
				//*****
				//計算表示
				//*****
				$sum = $card * $spot * $chain * $critical;
				echo "ダメージは".'<font size="+3">'.$sum.'</font>'."です"."<br>";
			}
		}
		else if($_GET['pass'] == 2){
			//**********
			//・戦闘中のカードに表示されている値
			//**********
	
			if(isset($_GET['deck']) && isset($_GET['character']) && isset($_GET['buff'])){
				//deck
				$deck = $_GET['deck'];
				//character
				$character = $_GET['character'];
				//buff
				$buff = $_GET['buff'];
				//*****
				//入力表示
				//*****
				if($deck == ""){
					echo "デッキ攻撃力(物理or魔法):";
					$error = "入力なし";
					echo $error."<br>";
					echo '<font color="#ff0000">'."計算できません".'</font>'."<br>";
				} else {
					echo "デッキ攻撃力:".$deck."<br>";
					echo "キャラクター攻撃力:".$character."<br>";
					echo "ダメージアップ補正:".$buff."<br>";
					//*****
					//計算表示
					//*****
					$card = $deck + $character + $buff;
					echo "戦闘中のカードに表示されている値".'<font size="+3">'.$card.'</font>'."です"."<br>";
				}
			} 
		}
		else if($_GET['pass'] == 3){
			//**********
			//・チアリー確殺
			//**********
	
			if(isset($_GET['damage']) && isset($_GET['spot']) && isset($_GET['buff']) && isset($_GET['chain']) && isset($_GET['critical'])){
				//damage
				$damage = $_GET['damage'];
				//spot
				$spot = $_GET['spot'];
				if($spot == "普通"){
					$spot = 1;
				}
				else if($spot == "有効"){
					$spot = 2;
				}
				else if($spot == "苦手"){
					$spot = 0.5;
				}
				//buff
				$buff = $_GET['buff'];
				//chain
				$chain = $_GET['chain'];
				if($chain == "チェインなし"){
					$chain = 1;
				}
				else if($chain == "2チェイン"){
					$chain = 1.2;
				}
				else if($chain == "3チェイン"){
					$chain = 1.4;
				}
				else if($chain == "4チェイン"){
					$chain = 1.6;
				}
				//critical
				$critical = $_GET['critical'];
				if($critical == "クリティカルなし"){
					$critical = 1;
				}
				else if($critical == "クリティカルあり"){
					$critical = 1.5;
				}
				$critical = $_GET['critical'];
				if($critical == "クリティカルなし"){
					$critical = 1;
				}
				else if($critical == "クリティカルあり"){
					$critical = 1.5;
				}
				//*****
				//入力表示
				//*****
				if($damage == ""){
					echo "カードに表示されている値:";
					$error = "入力なし";
					echo $error."<br>";
					echo '<font color="#ff0000">'."計算できません".'</font>'."<br>";
				} else {
					echo "デッキ攻撃力:".$damage."<br>";
					echo "属性補正:".$_GET['spot']."<br>";
					echo "チェイン:".$_GET['chain']."<br>";
					echo "クリティカル:".$_GET['critical']."<br>";
					//*****
					//計算表示
					//*****
					$sum = $damage * $spot * $chain * $critical;

					echo "ダメージは".'<font size="+3">'.$sum.'</font>'."です"."<br>"."<br>";
					
					$aotiari = 10130;
					$akatiari = 16800;
					$pinktiari = 23630;
					if($sum >= $aotiari){
						echo '<font size="+3">'.'<font color="#00BFFF">'."チアリー".'</font>'."は確殺できます".'</font>'."<br>";
						$aopic = 1;
					} else {
						echo '<font size="+3">'.'<font color="#00BFFF">'."チアリー".'</font>'."は確殺できません".'</font>'."<br>";
						$aopic = 2;
					}
					if($sum >= $akatiari){
						echo '<font size="+3">'.'<font color="#ff0000">'."スーパーチアリー".'</font>'."は確殺できます".'</font>'."<br>";
						$akapic = 3;
					} else {
						echo '<font size="+3">'.'<font color="#ff0000">'."スーパーチアリー".'</font>'."は確殺できません".'</font>'."<br>";
						$akapic = 4;
					}
					if($sum >= $pinktiari){
						echo '<font size="+3">'.'<font color="#FF69B4">'."アルティメットチアリー".'</font>'."は確殺できます".'</font>'."<br>";
						$pinkpic = 5;
					} else {
						echo '<font size="+3">'.'<font color="#FF69B4">'."アルティメットチアリー".'</font>'."は確殺できません".'</font>'."<br>";
						$pinkpic = 6;
					}
					
					//画像表示
					echo '<p>';
					if($aopic == 1){	echo "<img src=\"./Pictures/upload2.png\" border=\"0\" alt=\"Sample\" height=\"150\" width=\"150\">";	}
					if($aopic == 2){	echo "<img src=\"./Pictures/upload.png\" border=\"0\" alt=\"Sample\" height=\"150\" width=\"150\">";	}
					if($akapic == 3){	echo "<img src=\"./Pictures/upload (1)2.png\" border=\"0\" alt=\"Sample\" height=\"150\" width=\"150\">";	}
					if($akapic == 4){	echo "<img src=\"./Pictures/upload (1).png\" border=\"0\" alt=\"Sample\" height=\"150\" width=\"150\">";	}
					if($pinkpic == 5){	echo "<img src=\"./Pictures/upload (2)2.png\" border=\"0\" alt=\"Sample\" height=\"150\" width=\"150\">";	}
					if($pinkpic == 6){	echo "<img src=\"./Pictures/upload (2).png\" border=\"0\" alt=\"Sample\" height=\"150\" width=\"150\">";	}
					echo '</p>'.'<br>'.'<br>';
					
					//早見表
					print('<p>');
					print '<table>';
						print '<caption>'.'早見表(弱点で攻撃)'.'</caption>';
						print "<thead style=\"background:#ffccff\">";
							print '<tr>';
								print '<th>'.'敵'.'</th>';
								print '<th>'.'HP'.'</th>';
								print '<th>'.'チェインなし'.'</th>';
								print '<th>'.'2チェイン'.'</th>';
								print '<th>'.'3チェイン'.'</th>';
								print '<th>'.'4チェイン'.'</th>';
							print '</tr>';
						print '</thead>';
						print '<tbody>';
						print "<thead style=\"background:#ffffff\">";
							print '<tr>';
								print('<td>'."アルティメットチアリー");
								print('<td>'."　23630　");
								print('<td>'." 11815 ");
								print('<td>'." 9846 ");
								print('<td>'." 8440 ");
								print('<td>'." 7385 ");
							print '</tr>';
							print '<tr>';
								print('<td>'."スーパーチアリー");
								print('<td>'."　16880　");
								print('<td>'."8440");
								print('<td>'."7034");
								print('<td>'."6029");
								print('<td>'."5275");
							print '</tr>';
							print '<tr>';
								print('<td>'."チアリー");
								print('<td>'."　10130　");
								print('<td>'."5065");
								print('<td>'."4221");
								print('<td>'."3618");
								print('<td>'."3166");
							print '</tr>';
					print '<tbody>';
					print '</tbody>';
					print '</table>';
				}

			}
		}
		else if($_GET['pass'] == 4){
			//**********
			//(応用)富豪ケルピーで青チアリー確殺
			//**********
	
			if(isset($_GET['damage']) && isset($_GET['kerupi'])){
				$damage = $_GET['damage'];
				//kerupi
				$kerupi = $_GET['kerupi'];
				if($kerupi == "6570"){
					$kerupi = 6570;
				}
				$buff = $_GET['buff'];
				//chain
				$chain = $_GET['chain'];
				if($chain == "チェインなし"){
					$chain = 1;
				}
				else if($chain == "2チェイン"){
					$chain = 1.2;
				}
				else if($chain == "3チェイン"){
					$chain = 1.4;
				}
				else if($chain == "4チェイン"){
					$chain = 1.6;
				}
				//critical
				$critical = $_GET['critical'];
				if($critical == "クリティカルなし"){
					$critical = 1;
				}
				else if($critical == "クリティカルあり"){
					$critical = 1.5;
				}
				$critical = $_GET['critical'];
				if($critical == "クリティカルなし"){
					$critical = 1;
				}
				else if($critical == "クリティカルあり"){
					$critical = 1.5;
				}
				//入力表示
				if($damage == ""){
					echo "デッキ攻撃力(物理):";
					$error = "入力なし";
					echo $error."<br>";
					echo '<font color="#ff0000">'."計算できません".'</font>'."<br>";
				} else {
					echo "デッキ攻撃力(物理):".$damage."<br>";
					echo "ケルピーLvMaxダメ:".$kerupi."<br>";
					echo "ダメージアップ補正(バブ):".$_GET['buff']."<br>";
					echo "チェイン:".$_GET['chain']."<br>";
					echo "クリティカル:".$_GET['critical']."<br>";
					//計算表示
					$total = $damage + $kerupi + $buff;
					$sum = $total * $chain * $critical;
					echo "ダメージは".'<font size="+3">'.$sum.'</font>'."です"."<br>"."<br>";
					$aotiari = 10130;
					
					if($sum >= $aotiari){
						echo '<img src="./Pictures/WIN.png" alt="Sample" height="50" width="100"><br>';
						echo '<font size="+3">'."確殺できます!".'</font>'."<br>";
						echo "<img src=\"./Pictures/upload2.png\" border=\"0\" alt=\"Sample\" height=\"150\" width=\"150\">";
						echo "<img src=\"./Pictures/upload2.png\" border=\"0\" alt=\"Sample\" height=\"150\" width=\"150\">";
						echo "<img src=\"./Pictures/upload2.png\" border=\"0\" alt=\"Sample\" height=\"150\" width=\"150\">";
					} else {
						echo '<img src="./Pictures/LOSE.png" alt="Sample" height="50" width="100"><br>';
						echo '<font size="+3">'."確殺できません".'</font>'."<br>";
						echo "<img src=\"./Pictures/upload.png\" border=\"0\" alt=\"Sample\" height=\"150\" width=\"150\">";
						echo "<img src=\"./Pictures/upload.png\" border=\"0\" alt=\"Sample\" height=\"150\" width=\"150\">";
						echo "<img src=\"./Pictures/upload.png\" border=\"0\" alt=\"Sample\" height=\"150\" width=\"150\">";
					}
				}

			}	
		}
	} 
	?>
<p>
<a href="MA.php">Topに戻る</a>
</p>
</div>
</center>
</body>
</html>
