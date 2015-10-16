<form method="post" />
A <input type="text" name="a" /> <br>
<select name="task">
    <option value="+">+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
</select> <br>
B <input type="text" name="b" /> <br>
<input type="submit" name="submit" value="Розрахувати" /> <br>
</form>

<?php
if (isset($_POST['submit'])) {
    if (empty($_POST['a'])) {
        $result = 'Число А не заповнене';
    } elseif (empty($_POST['b'])) {
        $result = 'Число В не заповнене';
    }
    elseif (!preg_match("/^([0-9\-])+$/", $_POST['a'])) {
        $result = 'Введіть в поле А цифру';
    }
    elseif (!preg_match("/^([0-9\-])+$/", $_POST['b'])) {
        $result = 'Введіть в поле В цифру';
    }

    else {

        $a = $_POST['a'];
        $b = $_POST['b'];
        $task = $_POST['task'];

        if ($task == '+') {
            $result = $a + $b;
        } elseif ($task == '*') {
            $result = $a * $b;
        } elseif ($task == '/') {
            $result = $a / $b;
        } else {
            $result = $a - $b;
        }
    }
}
    echo 'Результат: '. $result;
?>