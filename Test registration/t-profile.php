
<?php include_once("t-header.php");?>
    <div class="container well" id="t-profile-div">
        <div>
            <div class="row">
                <h4 class="col-xs-4"><?= strtoupper(PERSONAL) ?></h4>
                <button type="button" class="btn btn-primary btn-xs col-xs-3 pull-right t-profile-edit"><?= EDIT_PD ?></button>
            </div>
            <hr>
            <div class="alert alert-info" role="alert">
                <table class="table table-bordered" id="t-personal-table">
                    <tr>
                        <td class="t-profile-title"><?= NAME ?>:</td>
                        <td id="t-profile-firstName"></td>
                        <td class="t-profile-title"><?= SECOND_NAME ?>:</td>
                        <td id="t-profile-secondName"></td>
                        <td></td>
                        <td></td>
                        <td rowspan="3" id="t-profile-fotoName"><img src="" alt="foto" class="img-thumbnail col-xs-12"></td>
                    </tr>
                    <tr>
                        <td class="t-profile-title"><?= DATE ?>:</td>
                        <td id="t-profile-date"></td>
                        <td class="t-profile-title"><?= STATUS ?>:</td>
                        <td id="t-profile-user_status"></td>
                    </tr>
                    <tr>
                        <td class="t-profile-title"><?= EMAIL ?>:</td>
                        <td id="t-profile-email"></td>
                        <td class="t-profile-title"><?= PHONE ?>:</td>
                        <td id="t-profile-phoneNumber"></td>
                    </tr>
                </table>
            </div>

            <div class="modal fade" id="t-profile-modal-add"  role="dialog" >
                <div class="modal-dialog modal-vertical-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3><?= EDIT_PD ?></h3>
                        </div>
                        <div class="modal-body">
                            <label class="control-label col-xs-4"><?= NAME ?></label>
                            <input type="text" class="form-control" name="firstName"  placeholder="<?= NAME ?>">
                            <label class="control-label col-xs-4" ><?= SECOND_NAME ?></label>
                            <input type="text" class="form-control" name="secondName"  placeholder="<?= SECOND_NAME ?>">
                            <label class="control-label col-xs-4"><?= DATE ?></label>
                            <input type="text" class="form-control" name="date" id="t-date" placeholder="<?= DATE ?>">
                            <label class="control-label col-xs-4"><?= STATUS ?></label>
                            <select class="form-control" id="t-profile-status">
                                <option value="0"><?= NOT_MAR ?></option>
                                <option value="1"><?= MAR ?></option>
                            </select>
                            <label class="control-label col-xs-4" ><?= EMAIL ?></label>
                            <input type="email" class="form-control" name="email"  placeholder="<?= EMAIL ?>">
                            <label class="control-label col-xs-4" ><?= PHONE ?></label>
                            <input type="tel" class="form-control" name="phoneNumber"  placeholder="<?= PHONE ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success t-modal-save"><?= SAVE ?></button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><?= CANCEL ?></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div>
            <div class="row">
                <h4 class="col-xs-4"><?= strtoupper(ADDRESS) ?></h4>
                <button type="button" class="btn btn-primary btn-xs col-xs-3 pull-right t-profile-edit"><?= EDIT_AD ?></button>
            </div>
            <hr>
            <div class="alert alert-info" role="alert">
                <table class="table table-bordered">
                    <tr>
                        <td class="t-profile-title"><?= COUNTRY ?>:</td>
                        <td id="t-profile-country"></td>
                        <td class="t-profile-title"><?= CITY ?>:</td>
                        <td id="t-profile-city_address"></td>
                    </tr>
                    <tr>
                        <td class="t-profile-title"><?= STREET ?>:</td>
                        <td id="t-profile-street_address" colspan="2"></td>
                    </tr>
                </table>
            </div>

            <div class="modal fade" id="t-profile-modal-add"  role="dialog" >
                <div class="modal-dialog modal-vertical-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3><?= EDIT_AD ?></h3>
                        </div>
                        <div class="modal-body">
                            <label class="control-label col-xs-4"><?= COUNTRY ?></label>
                            <input type="text" class="form-control" name="country"  placeholder="<?= COUNTRY ?>">
                            <label class="control-label col-xs-4" ><?= CITY ?></label>
                            <input type="text" class="form-control" name="city_address"  placeholder="<?= CITY ?>">
                            <label class="control-label col-xs-4"><?= STREET ?></label>
                            <input  class="form-control" name="street_address"  placeholder="<?= STREET ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success t-modal-save"><?= SAVE ?></button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><?= CANCEL ?></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div>
            <div class="row">
                <h4 class="col-xs-4"><?= strtoupper(EDUCATION) ?></h4>
                <button type="button" class="btn btn-primary btn-xs col-xs-3 pull-right t-profile-edit"><?= EDIT_ED ?></button>
            </div>
            <hr>
            <div class="alert alert-info" role="alert">
                <table class="table table-bordered">
                    <tr>
                        <td class="t-profile-title"><?= DEGREE ?>:</td>
                        <td id="t-profile-education"></td>
                        <td class="t-profile-title"><?= CITY ?>:</td>
                        <td id="t-profile-city_edu"></td>
                    </tr>
                    <tr>
                        <td class="t-profile-title"><?= SCHOOL ?>:</td>
                        <td id="t-profile-school" colspan="2"></td>
                    </tr>
                    <tr>
                        <td class="t-profile-title"><?= EDU_FIELD ?>:</td>
                        <td id="t-profile-edu_field" colspan="2"></td>
                    </tr>
                </table>
            </div>

            <div class="modal fade" id="t-profile-modal-add"  role="dialog" >
                <div class="modal-dialog modal-vertical-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3><?= EDIT_ED ?></h3>
                        </div>
                        <div class="modal-body">
                            <label class="control-label col-xs-4" ><?= DEGREE ?></label>
                            <input type="text" class="form-control" name="education"  placeholder="<?= DEGREE ?>">
                            <label class="control-label col-xs-4" ><?= CITY ?></label>
                            <input type="text" class="form-control" name="city_edu"  placeholder="<?= CITY ?>">
                            <label class="control-label col-xs-4" ><?= SCHOOL ?></label>
                            <input type="text" class="form-control" name="school"  placeholder="<?= SCHOOL ?>">
                            <label class="control-label col-xs-4" ><?= EDU_FIELD ?></label>
                            <input type="text" class="form-control" name="edu_field"  placeholder="<?= EDU_FIELD ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success t-modal-save"><?= SAVE ?></button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><?= CANCEL ?></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div>
            <div class="row">
                <h4 class="col-xs-4"><?= strtoupper(ADD_INFO) ?></h4>
                <button type="button" id="t-profile-edit-info" class="btn btn-primary btn-xs col-xs-3 pull-right t-profile-edit"><?= EDIT_ADD ?></button>
            </div>
            <hr>
            <div class="alert alert-info" role="alert">
                <table class="table table-bordered">
                    <tr>
                        <td id="t-profile-add_info" colspan="2"></td>
                    </tr>
                </table>
            </div>

            <div class="modal fade" id="t-profile-modal-add"  role="dialog" >
                <div class="modal-dialog modal-vertical-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3><?= EDIT_ADD ?></h3>
                        </div>
                        <div class="modal-body">
                            <label class="control-label col-xs-4" for="t-addInfo"><?= ADD_INFO ?></label>
                            <input class="form-control" name="add_info" id="t-addInfo" placeholder="<?= ADD_INFO ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success t-modal-save"><?= SAVE ?></button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><?= CANCEL ?></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php include_once("t-footer.php");?>