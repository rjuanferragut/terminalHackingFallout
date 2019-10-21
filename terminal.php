      <div class="container">
          <div class="col-12">
              <p>
      						Welcome to ROBCO Industries (TM) Termlink
      						<br />
      						===============================
      						<br />
      						Password is required
      						<br />
      						Attempts remaining: <span id="lifesCount"></span>
    					</p>
          </div>
          <div class="row">
              <div class="col-3">
                  <table>
                    <?php
                    //creación de las filas y columnas de la tabla
                    $horizontalLines = 16;
                    $verticalLines = 2;
                    $countLineCode = 1;
                    //empieza en el 1 para que coincida con el total de las strings de codigo

                    $countHexacode = 0;

                    for ($i=0; $i < $horizontalLines; $i++) {
                      echo "<tr>";

                      for ($j = 0; $j < $verticalLines; $j++) {
                        if($j % 2 == 0){
                          echo "<td class='Hexade' id=".$array_hexadecimal[$countHexacode].">".$array_hexadecimal[$countHexacode];
                          $countHexacode++;
                        }else{
                          echo "<td class='code' id=".$countLineCode." >";
                          $countLineCode++;
                        }

                        echo "</td>";
                      }

                      echo "</tr>";
                    }
                    ?>
                  </table>
              </div>
              <div class="col-3">
                  <table>
                    <?php
                    //creación de las filas y columnas de la tabla
                    $horizontalLines = 16;
                    $verticalLines = 2;
                    $countLineCode = 1;
                    //empieza en el 1 para que coincida con el total de las strings de codigo

                    $countHexacode = 0;

                    for ($i=0; $i < $horizontalLines; $i++) {
                      echo "<tr>";

                      for ($j = 0; $j < $verticalLines; $j++) {
                        if($j % 2 == 0){
                          echo "<td class='Hexade' id=".$array_hexadecimal[$countHexacode].">".$array_hexadecimal[$countHexacode];
                          $countHexacode++;
                        }else{
                          echo "<td class='code' id=".$countLineCode." >";
                          $countLineCode++;
                        }

                        echo "</td>";
                      }

                      echo "</tr>";
                    }
                    ?>
                  </table>
              </div>
              <div class="col-3">

              </div>
          </div>
      </div>
