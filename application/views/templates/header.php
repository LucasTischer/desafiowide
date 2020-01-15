<html>
    <head>
        <title>Interwebs | URLTracker</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="<?=base_url('assets/css/style.css');?>" rel="stylesheet">
        <script src="<?=base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?=base_url('assets/js/scripts.js');?>"></script>
        <script type="text/javascript">
            //fechar alerta automaticamente
            $(function() {
                var alert = $('div.alert[auto-close]');
                alert.each(function() {
                    var that = $(this);
                    var time_period = that.attr('auto-close');
                    setTimeout(function() {
                        that.alert('close');
                    }, time_period);
                 });
            });

            $(document).ready(function(){
                refreshTable();
            });

            function refreshTable(){
                window.setInterval(function(){$('#tabela_retorno').load('<?php echo base_url(); ?>Urls/reload_tabela');}, 10000);
            }

        </script>
    </head>
    <body>
            
