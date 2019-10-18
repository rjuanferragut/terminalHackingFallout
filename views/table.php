<?php
    $countLine = 0;
    $array_hexadecimal = array('0x7400','0x74C0','0X740C','0x74CC','0x7418','0x74D0','0x7424','0x74E4','0x7430','0x74F0','0x743C','0x74FC','0x7448','0x7500','0x7454','0x7514','0x7460','0x7520','0x746C','0x752C','0x7478','0x7530','0x7484','0x7544','0x7490','0x7550','0x749C','0x755C','0x74A8','0x7560','0x74B4','0x7574');
    for ($x = 0; $x < 2; $x++) {
        echo '<div style="display: inline-block"><table><tbody>';
        for ($i = 0; $i < 16; $i ++) {
              echo '<tr>' .
              '<td class="hexacode">' . $array_hexadecimal[$countLine] . '</td>' .
              '<td class="code" id="row-codification-'.$countLine.'">' . '</td>' .
              '</tr>';
              $countLine++;
        }
        echo '</tbody></table></div>';
    }
?>
