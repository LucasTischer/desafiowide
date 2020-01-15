              <?php
                foreach($urls as $url):
                    #print_r($urls);
                    ?>
                  <tr>
                      <td>"<?php echo $url['url']; ?>"</td>
                      <td>"<?php echo $url['status']; ?>"</td>
                      <td></td>
                      <td>"<?php echo $url['updated_at']; ?>"</td>
                      <td>

                        <button id="ver" type="submit" class="btn btn-outline-primary btn_form " value=".$url['id']." title="Visializar"> Visualizar </button>
                        
                        <form class="formButton" method="POST" action="<?php echo base_url(); ?>Urls/del_url">
                          <input type="text" name="id" id="id" value="<?php echo $url['id']; ?>" hidden="">
                          <button id="del" type="submit" class="btn btn-outline-danger del btn_form" title="Excluír câmera"> Excluír </button>
                        </form>
                      </td>
                    </tr>
              <?php
                endforeach;
              ?>