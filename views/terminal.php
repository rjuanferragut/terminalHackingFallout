          <div class="container">
              <div>
          			<input type="hidden" name="password" id="password" value="<?php echo $password ?>">
          			<span id="string" style="display: none"><?php echo $string?></span>
          		</div>
              <div class="row">
                  <div class="col md-12">
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
              </div>
              <div class="row justify-content-center">
                  <div class="col md-3" id="terminal-table">
                      <div class="table">
                          <table>
                              <?php
                              //creación de las filas y columnas de la tabla
                              $horizontalLines = 16;
                              $verticalLines = 4;
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
                                    echo "<td class='code' id='row-codification-".$countLineCode."'>";
                                    $countLineCode++;
                                  }

                                  echo "</td>";
                                }

                                echo "</tr>";
                              }
                              ?>
                          </table>
                      </div>
                  </div>
                  <div class="col md-3" id="prompt">
                      <div class="card">
                          <div class="content-prompt">
                              dfakjlsñflkajsñlkajsñlkfjañkslfa
                          </div>
                          <div class="input-prompt">
                              <input type="text" value="Prompt"/>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
