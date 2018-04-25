<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $Lang->get("TWITCH_MAIN_TITLE"); ?></h3> <span style="float:right;"><?= $Lang->get("TWITCH_DEVELOPED_BY"); ?></span>
                </div>
                <div class="box-body">

                    <h4 style="margin-top:30px;"><span class="fa fa-file-text"></span> <?= $Lang->get("TWITCH_TITLE"); ?></h4>

                    <form method="post" action="<?= $this->Html->url(["controller" => "Twitch", "action" => "index", "admin" => true]); ?>">
                        <div class="form-group col-md-6">
                            <label class="control-label"><?= $Lang->get("TWITCH_LABEL_TITLE"); ?></label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-code"></span></span>
                                 <input type="text" class="form-control" id="url_player" name="url_player" value="<?= (!empty($url_player)) ? $url_player : ''; ?>" placeholder="<?= $Lang->get("PSEUDO_INPUT_PLACEHOLDER"); ?>" minlength="3" maxlength="100" required>
                                <span class="input-group-btn">
                                    <input type="hidden" name="data[_Token][key]" value="<?= $csrfToken ?>">
                                    <button type="submit" class="btn btn-primary"><?= $Lang->get("PSEUDO_REGISTER"); ?></button>
                                </span>
                            </div>
                        </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
<div class="clearfix"></div>
</section>
