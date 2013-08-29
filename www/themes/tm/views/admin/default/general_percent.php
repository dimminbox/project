<?php

// Выводим содержимое массива $week
// в виде календаря
// Выводим таблицу
echo '<h3>' . date('M.Y', strtotime($date)) . '</h3>';
echo "<table class='table table-bordered table-striped'>";
for($j = 0; $j < 7; $j++)
{
    echo "<tr>";
    for($i = 0; $i < count($week); $i++)
    {
        if(!empty($week[$i][$j]))
        {
            // Если имеем дело с субботой и воскресенья
            // подсвечиваем их
            if($j == 5 || $j == 6)
                echo "<td><font color=red>".$week[$i][$j]."</font></td>";
            else echo "<td>".$week[$i][$j]."<input type='text' name='". $week[$i][$j] . "' value=''></td>";
        }
        else echo "<td>&nbsp;</td>";
    }
    echo "</tr>";
}
echo "</table>";
