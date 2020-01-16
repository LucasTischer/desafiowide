              <?php
                foreach($urls as $url):
                    #print_r($urls);
                    ?>
                  <tr>
                      <td><?php echo $url['url']; ?></td>
                      <td><?php echo $url['status']; ?></td>
                      <td><?php echo $url['status_code']; ?></td>
                      <td><?php echo $url['updated_at']; ?></td>
                      <td>

                      <form class="formButton" method="POST" action="<?php echo base_url(); ?>Urls/ver_retorno_url">
                        <textarea type="text" name="text" id="id" value="" style="display:none;"> <?php echo $url['retorno']; ?></textarea>
                        <?php if($url['status_code'] < 400){?>
                        <button id="ver" type="submit" class="btn btn-outline-primary btn_form " title="Visializar"> Visualizar </button>
                        <?php } ?>
                      </form>
                        
                        <form class="formButton" method="POST" action="<?php echo base_url(); ?>Urls/del_url">
                          <input type="text" name="id" id="id" value="<?php echo $url['id']; ?>" hidden="">
                          <button id="del" type="submit" class="btn btn-outline-danger del btn_form" title="Excluír câmera"> Excluír </button>
                        </form>
                      </td>
                    </tr>
              <?php
                endforeach;
              ?>