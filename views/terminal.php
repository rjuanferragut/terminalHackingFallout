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
                  </div>
                  <div class="col md-3" id="prompt">
                      <div class="card">
                          <div class="content-prompt"></div>
                          <div class="input-prompt">
                              <span><i class="fas fa-square-full blink"></i></span>
                              <form action="views/register.php" method="post" style="display: inline">
                                  <input type="hidden" name="tries" value="0">
                                  <input type="text" name="prompt" class="input-prompt" autocomplete="off">
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
