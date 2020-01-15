<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">URLTracker</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link mr-md-2" href="<?php echo base_url(); ?>Users/logout">Logout</a>
    </div>
  </div>
</nav>

<div class="container">
        <div class="row">

          <div class="col">
            <div class="container" style="padding-top: 6%">
              <h2 class="text-center"> URLs Cadastradas</h2>
              <hr/>
            </div>
          </div>

          <div class="col">
            <div class="container" style="padding-top: 6%; padding-left: 0px">
              <button type="button" class="btn btn-outline-primary btn-lg btn-block" data-toggle="modal" data-target="#modalNovaUrl">
                <i class="fa fa-plus"></i> Adicionar URL
              </button>
            </div>
          </div>

        </div>
        <div class="container-fluid">
            <?php echo $this->session->flashdata("error"); ?>
            <?php echo $this->session->flashdata("success"); ?>
        </div>
      </div>

      <div class="container" style="padding-top: 1%">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">URL</th>
                <th scope="col">STATUS</th>
                <th scope="col">RETORNO</th>
                <th scope="col">ACESSO EM</th>
                <th scope="col">AÇÕES</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($urls as $url):
                  echo "<tr>
                      <td>".$url['url']."</td>
                      <td>".$url['status']."</td>
                      <td>".$url['retorno']."</td>
                      <td>".$url['updated_at']."</td>
                      <td>
                        <form class=\"formButton\"action=\"<?php echo base_url(); ?>Users/logout\" method=\"post\">
                          <input type=\"text\" name=\"ver\" value=".$url['id']." hidden>
                          <button id=\"ver\" type=\"submit\" class=\"btn btn-outline-primary btn_form\" title=\"Visializar videos gravados\"> Visualizar </button>
                        </form>

                        <button id=\"del\" type=\button\" class=\"btn btn-outline-danger del btn_form\" value=".$url['id']." title=\"Excluír câmera\"> Excluír </button>
                      </td>
                    </tr>";
                endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </div>

        <div class="modal fade" id="modalNovaUrl" tabindex="-1" role="dialog" aria-labelledby="novaUrl">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-header">
                 <p class="modal-title" id="novaUrl">
                  <span class="title"> ADICIONAR URL </span>
                 </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

                <form method="POST" action="<?php echo base_url(); ?>Urls/new_url">

                <div class="modal-body">

                <div class="form-group">
                  <input type="text" class="form-control input-hig bstooltip" id="url" name="url" placeholder="Insira a URL" title="URL a ser rastreada">
                </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-lg btn-outline-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-lg btn-outline-primary submit_usr">Salvar</button>
                </div>

              </form>

            </div>
          </div>
        </div>

      </div>