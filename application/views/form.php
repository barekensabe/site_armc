<!doctype html>
<html class="no-js" lang="zxx">
    <!-- <header> Blog Ara End -->
     <?php include VIEWPATH . 'templete/header_site.php'; ?>
    <!-- </header> -->
    <main>

      
        <!-- Services Area Start -->
            <div  style="background-image: url(<?=base_url()?>assets/img/gallery/section_bg02.jpg); background-repeat: no-repeat; background-size: cover" class="services-area mt-5 pt-150 pb-150">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-10">
                            <!-- Section Tittle -->
                            <div class="section-tittle mt-4 text-center mb-80">
                                <span>Formation professionnelle</span>
                                                <h2>Veuillez remplir le formulaire d'enregistrement.</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                   <div class="col-lg-8 bg-light p-4 shadow">
     <div class="form-row">
        <div class="col-lg-6 mb-4">
            <label>* Nom </label>
            <input class="form-control myinput" type="text" name="" placeholder="Nom">
        </div>
        <div class="col-lg-6 mb-4">
           <label>* Prénom </label>
         <input class="form-control myinput" type="text" name="" placeholder="Prénom">
        </div>

        <div class="col-lg-6 mb-4">
            <label>* Sexe :</label>
        <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optradio">Homme
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optradio">Femme
      </label>
    </div>
    </div>

    <div class="col-lg-6 mb-4">
           <label>* Date</label>
          <input class="form-control" type="date" name="" placeholder="Enter name">
        </div>

        <div class="col-lg-6 mb-4">
            <div class="form-group">
           <label>* Select</label>
            <select class="selectpicker form-control">
                <option value="">Sélectionner un choix</option>
                <option value="">Category 1</option>
                <option value="">Category 2</option>
                <option value="">Category 3</option>
            </select>
        </div></div>


        <div class="col-lg-6 mb-4">
            <div class="form-group">
           <label>* Select search</label>
                                                    <select class="selectpicker form-control" data-live-search="true">
                                                        <option value="">Sélectionner un choix</option>
                                                        <option value="">Category 1</option>
                                                        <option value="">Category 2</option>
                                                        <option value="">Category 3</option>
                                                    </select>
        </div></div>


        <div class="col-lg-6 mb-4">
            <div class="form-group">
           <label>* Select multiple</label>
                                                    <select class="selectpicker form-control" data-live-search="true" multiple>
                                                        <option value="">Choose Option</option>
                                                        <option value="">Category 1</option>
                                                        <option value="">Category 2</option>
                                                        <option value="">Category 3</option>
                                                    </select>
        </div></div>





      </div>
    </div>
                     </div>
                </div>
            </div>
            <!-- Services Area End -->

    </main>


     <!-- <header> Blog Ara End -->
     <?php include VIEWPATH . 'templete/footer_site.php'; ?>
    <!-- </header> -->
        
    </body>
</html>