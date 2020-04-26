<?= $header ?>

<section>
    <div class="mainwrapper">
    <?= $menu ?>

        <div class="mainpanel">
            <div class="pageheader">
                <div class="media">
                    <div class="pageicon pull-left">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="media-body">
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                            <li>Home</li>
                        </ul>
                        <h4>Home Page</h4>
                    </div>
                </div><!-- media -->
            </div><!-- pageheader -->

            <div class="contentpanel">
                <div class="row row-stat">
                    <div class="col-md-4">
                        <div class="panel panel-success-alt noborder">
                            <a href="<?= base_url('')?>"><img src="<?= base_url('assets/images/_img/bemvindo.png') ?>" alt=""></a>
                        </div><!-- panel -->
                    </div><!-- col-md-4 -->
                </div><!-- row -->
            </div><!-- contentpanel -->
        </div><!-- mainpanel -->
    </div><!-- mainwrapper -->
    
    <?= $footer ?>