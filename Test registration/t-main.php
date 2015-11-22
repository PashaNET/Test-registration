<?php include_once("t-header.php");?>

    <div id="t-back-button">
        <img src="assets/images/backArrow.png">
    </div>
    <div class="container well" id="t-reg-div"> 
        <h1><?= strtoupper(REGISTRATION) ?></h1>
        <form class="form-horizontal" id="t-reg-form">
            <div>
                <h2><?= PERSONAL ?></h2>
                <hr>
                <div class="form-group col-xs-6">
                    <label class="control-label col-xs-4" for="t-lastName"><?= NAME ?><span>*</span></label>
                    <input type="text" class="form-control" name="firstName" id="t-firstName" placeholder="<?= NAME ?>">
                </div>

                <div class="form-group col-xs-6">
                    <label class="control-label col-xs-4" for="t-secondName"><?= SECOND_NAME ?><span>*</span></label>
                    <input type="text" class="form-control" name="secondName" id="t-secondName" placeholder="<?= SECOND_NAME ?>">
                </div>

                <div class="form-group col-xs-6">
                    <label class="control-label col-xs-4" for="t-date"><?= DATE ?></label>
                    <input type="text" class="form-control" name="date" id="t-date" placeholder="<?= DATE ?>">
                </div>

                <div class="form-group col-xs-6">
                    <label class="control-label col-xs-4"><?= STATUS ?></label>
                    <select class="form-control">
                        <option value="0"><?= NOT_MAR ?></option>
                        <option value="1"><?= MAR ?></option>
                    </select>
                </div>

                <div class="form-group col-xs-6">
                    <label class="control-label col-xs-6" for="t-email"><?= EMAIL ?><span>*</span></label>
                    <input type="email" class="form-control" name="email" id="t-email" placeholder="<?= EMAIL ?>">
                </div>
                <div class="form-group col-xs-6">
                    <label class="control-label col-xs-6" for="t-phoneNumber"><?= PHONE ?><span>*</span></label>
                    <input type="tel" class="form-control" name="phoneNumber" id="t-phoneNumber" placeholder="<?= PHONE ?>">
                </div>
            </div>

            <div>
                <h2><?= ADDRESS ?></h2>
                <hr>
                <div class="form-group col-xs-6">
                    <label class="control-label col-xs-2" for="t-address"><?= COUNTRY ?><span>*</span></label>
                    <input type="text" class="form-control" name="country" id="t-country" placeholder="<?= COUNTRY ?>">
                </div>

                <div class="form-group col-xs-6">
                    <label class="control-label col-xs-2" for="t-city-add"><?= CITY ?><span>*</span></label>
                    <input type="text" class="form-control" name="city_address" id="t-city-add" placeholder="<?= CITY ?>">
                </div>

                <div class="form-group col-xs-12">
                    <label class="control-label col-xs-2" for="t-street"><?= STREET ?><span>*</span></label>
                    <input  class="form-control" name="street_address" id="t-street" placeholder="<?= STREET ?>">
                </div>
            </div>

            <div>
                <h2><?= EDUCATION ?></h2>
                <hr>
                <div class="form-group col-xs-6">
                    <label class="control-label col-xs-2" for="t-education"><?= DEGREE ?><span>*</span></label>
                    <input type="text" class="form-control" name="education" id="t-education" placeholder="<?= DEGREE ?>">
                </div>

                <div class="form-group col-xs-6">
                    <label class="control-label col-xs-2" for="t-city-edu"><?= CITY ?><span>*</span></label>
                    <input type="text" class="form-control" name="city_edu" id="t-city-edu" placeholder="<?= CITY ?>">
                </div>

                <div class="form-group col-xs-12">
                    <label class="control-label col-xs-2" for="t-school"><?= SCHOOL ?><span>*</span></label>
                    <input type="text" class="form-control" name="school" id="t-school" placeholder="<?= SCHOOL ?>">
                </div>

                <div class="form-group col-xs-12">
                    <label class="control-label col-xs-4" for="t-edu-field"><?= EDU_FIELD ?><span>*</span></label>
                    <input type="text" class="form-control" name="edu_field" id="t-edu-field" placeholder="<?= EDU_FIELD ?>">
                </div>
            </div>

            <div>
                <h2><?= ADD_INFO_FOTO ?></h2>
                <hr>
                <div class="form-group col-xs-12">
                    <label class="control-label col-xs-4" for="t-addInfo"><?= ADD_INFO ?></label>
                    <input class="form-control" name="add_info" id="t-addInfo" placeholder="<?= ADD_INFO ?>">
                </div>
                <div class="form-group col-xs-6">
                    <label class="control-label col-xs-4"><?= FOTO ?><span>*</span></label>
                    <input type="file" class="form-control" name="foto"  accept="image/*,image/jpeg" id='t-foto'>
                </div>
                <div class="form-group col-xs-6" id="t-image-container">
                        <img src="assets/images/test-foto.png" class="img-thumbnail" id='t-preview'>
                        <p class="text-danger" id="t-error"></p>
                    <input type="hidden" class="form-control" id='t-fotoName' name="fotoName">
                </div>
            </div>

            <div class="col-xs-12">
                <h2><?= PASSWORD ?></h2>
                <hr>
                <div class="form-group col-xs-6">
                    <label class="control-label" for="t-pass"><?= PASSWORD ?><span>*</span></label>
                    <input type="password" class="form-control" name="pass" id="t-pass" placeholder="<?= PASSWORD ?>">
                </div>
                <div class="form-group col-xs-6">
                    <label class="control-label col-xs-7" for="t-pass-confirm"><?= CONFIRM_PASSWORD ?><span>*</span></label>
                    <input type="password" class="form-control" name="confirm" id="t-pass-confirm" placeholder="<?= CONFIRM_PASSWORD ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary pull-right" id="t-submit"><?= REGISTRATION ?></button>
                </div>
            </div>

        </form>

        <div class="modal fade" id="t-modal"  role="dialog" >
            <div class="modal-dialog modal-vertical-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 id="t-modal-header"> </h2>
                    </div>
                    <div class="modal-body">
                        <h3 id="t-modal-body"> </h3>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id="t-modal-button"><?= RETURN_TO_MAIN ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="t-main">
        <div class="well" >
           <form method="post" id="t-signIn-form">
              <div class="form-group">
                <label for="t-email"><?= EMAIL ?></label>
                <input type="email" name = "email" class="form-control" id="t-email" placeholder=<?= EMAIL ?>>
              </div>
              <div class="form-group">
                <label for="t-pasword"><?= PASSWORD ?></label>
                <input type="password"  name = "password" class="form-control" id="t-pasword" placeholder=<?= PASSWORD ?>>
              </div>
              <div class="row" id="t-buttons-group">                   
                <button type="button" class="btn btn-primary col-xs-4" id="t-regButton"><?= REGISTRATION ?></button>
                <button type="button" class="btn btn-success pull-right col-xs-4" id="t-signIn"><?= SIGNIN ?></button>
              </div>                
            </form>
        </div>
    </div>

<?php include_once("t-footer.php");?>