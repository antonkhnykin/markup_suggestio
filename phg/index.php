<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Суггестия. Разметка текста</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
</head>
<body>
    <main>
        <h1>Суггестия. Разметка текста</h1>

<?php
define('DB_USER', "c19009"); //логин админа БД
define('DB_PASSWORD', "ZllsT7zv"); // пароль админа БД
define('DB_DATABASE', "c19009_main"); // база данных
define('DB_SERVER', "localhost"); // сервер 'localhost'

$connection = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

$sql = "SELECT * FROM texts_zen WHERE status=0";
$result = $connection->query($sql);
$num_results = $result->num_rows;

$sql2 = "SELECT * FROM texts_zen WHERE status=1";
$result2 = $connection->query($sql2);
$num_results_ready = $result2->num_rows;

if ($num_results != 0) {
	$num = rand(0, $num_results - 1);
	for ($i = 0; $i < $num_results; $i++)
	  {
		$result->data_seek($i);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		if ($i == $num) {
			$id = $row['id'];
			$text = $row['text'];
        		echo "<h5>Осталось разметить: ".$num_results." (размечено: ".$num_results_ready.")</h5>\n";
		}
	   }
}
        echo "<table class=table_by_css>\n";
            echo "<tr>\n";
                echo "<td align=left>\n";
                    echo "<form method=post action=index.php>\n";
                        echo "<input type=submit class='btn btn-outline-danger' value='Загрузить другой текст'>\n";
                    echo "</form>\n";
                echo "</td></tr>\n";
                echo "<tr><td align=left>\n";
                    echo "<form method=post action=delete.php>\n";
                        echo "<input type=hidden name=id value=".$id.">\n";
                        echo "<input type=submit class='btn btn-outline-danger' value='Убрать текст из датасета'>\n";
                    echo "</form>\n";
                echo "</td>\n";
            echo "</tr>\n";
        echo "</table>\n";
echo "       <p>".iconv('cp1251','utf-8', $text)."</p>\n";
?>
    </main>
    <form method="post" action="save.php">
        <table class="table_center_by_css">
            <tr>
                <td>
                    <div class="header-h5 header-h5-left">
                        <h5>Суггестия</h5>
                    </div>
                </td>
                <td>
                    <div class="header-h5 header-h5-right">
                        <h5>Модальность</h5>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                     <div class="form_radio_group">
                        <div class="form_radio_group-item">
<?php
                            echo "<input type=hidden name=id value=".$id.">\n";
?>
                            <input id="radio-1" type="radio" name="suggestio" value="1" required>
                            <label for="radio-1">есть</label>
                        </div>
                        <div class="form_radio_group-item">
                            <input id="radio-2" type="radio" name="suggestio" value="0" required>
                            <label for="radio-2">нет</label>
                        </div>
                    </div>
                </td>
                <td align="right">
                    <div class="form_radio_group">
                        <div class="form_radio_group-item">
                            <input id="radio-3" type="radio" name="modus" value="-2" required>
                            <label for="radio-3">-2</label>
                        </div>
                        <div class="form_radio_group-item">
                            <input id="radio-4" type="radio" name="modus" value="-1" required>
                            <label for="radio-4">-1</label>
                        </div>
                        <div class="form_radio_group-item">
                            <input id="radio-5" type="radio" name="modus" value="0" required>
                            <label for="radio-5">0</label>
                        </div>
                        <div class="form_radio_group-item">
                            <input id="radio-6" type="radio" name="modus" value="1" required>
                            <label for="radio-6">+1</label>
                        </div>
                        <div class="form_radio_group-item">
                            <input id="radio-7" type="radio" name="modus" value="2" required>
                            <label for="radio-7">+2</label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><hr class="hr-line"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" class="btn btn-outline-info" value="Сохранить изменения"></td>
            </tr>
            <tr><td><br></td></tr>
        </table>
    </form>

</body>
</html>