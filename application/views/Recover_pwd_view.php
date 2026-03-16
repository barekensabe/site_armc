<!DOCTYPE html>
<html lang="en">

<?php include VIEWPATH . 'template_ep/header_ep.php'; ?>

<style type="text/css">
  .help-block{color:red;}
</style>

<body class="inner_page login">
    <div style="background-image: url(<?=base_url('assets_ep/images/register_bg.png') ?>); background-repeat: no-repeat; background-size: cover" class="full_container pb-5">
        <div class="container">
            <div class="center verticle_center full_height">
                <div class="login_section">
                    <div class="logo_login">
                        <div class="center">
                            <img width="140" src="<?=base_url()?>assets_ep/images/paeej_logo_circle.png" alt="#" />
                        </div>
                    </div>
                    <div class="login_form px-5 shadow">
                        <p id="message_success"></p>
                        <h4 class="text-center">Récuperer le mot de passe </h4><br>
                        <!-- <form method="post" class="form-horizontal" action="<?=base_url('Login_ep/recover_pwd') ?>" id="myform"> -->
                        <form id="form_recover" method="POST">
                            <fieldset>
                                <div class="form-group col-lg-12">
                                    <label style="font-weight: 900; color:#454545">Adresse e-mail</label>
                                    <input type="text" name="EMAIL" id="EMAIL" class="form-control" placeholder="Adresse e-mail">
                                    <span class="help-block" id="error_mail"></span>
                                    <?php echo form_error('EMAIL', '<div class="text-danger">', '</div>'); ?> 

                                </div><br>
                                <div class="form-group col-lg-12 text-center">
                                    <button class="main_bt" id="btnRecu" onclick="recove_pwd()" >Récuperer</button>
                                </div><br>
                                
                                <center>
                                    <a class="forgot" href="<?=base_url('Login_ep') ?>">Retour</a>
                                </center><br>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>


            <!-- footer -->
            <?php include VIEWPATH. 'template_ep/footer_ep.php'; ?>


        </div>
    </div>


</body>


<script type="text/javascript">

    function recove_pwd()
    {

        $('#btnRecu').html('Chargement....');
        $('#btnRecu').attr("disabled",true);
        $('#message_success').html('');

        var url;
        url="<?php echo base_url('Login_ep/recover')?>";
        var formData = new FormData($('#form_recover')[0]);
        $.ajax({
        url:url,
        type:"POST",
        data:formData,
        contentType:false,
        processData:false,
        dataType:"JSON",
        success: function(data)
        {
        if(data.status) 
        {
            $('#message_success').html(data.message_success);
            window.location="<?=base_url('Login_ep')?>";
        }
        else
        {
            for (var i = 0; i < data.inputerror.length; i++) 
            {
            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); 
            }
        }

        $('#btnRecu').text('Récuperer');
        $('#btnRecu').attr('disabled',false); 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        alert('Erreur s\'est produite');
        $('#btnRecu').text('Récuperer');
        $('#btnRecu').attr('disabled',false);

        }


    });



    }

</script>

</html>

