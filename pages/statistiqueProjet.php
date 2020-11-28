<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="row">
            <div class="col-md-6">
                <div class="m-portlet__head-caption" style="padding-top: 25px;">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Statistique du projet
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <?php
            $projet = Projet::get($_GET["id_projet"]);
            $soc = Societe::get($projet["id_societe"]);
            $pro = Livrable::getProgras($_GET["id_projet"]);
            $sum = Livrable::getSum($projet["id_projet"], 2);
        ?>
        <div class="m-widget4 m-widget4--progress">
        

            <div class="m-widget4__item">
                <div class="m-widget4__img m-widget4__img--pic">
                    <img src="<?= Tools::getlogo(Tools::str2url($soc["raison_social"])); ?>" alt="">
                </div>
                <div class="m-widget4__info">
                    <span class="m-widget4__title">
                        <?php echo $projet['nom_projet']; ?>
                    </span>
                    <br>
                    <span class="m-widget4__sub">
                        <?php echo $sec["libelle_secteur"] ?>
                    </span>
                </div>
                <div class="m-widget4__progress">
                    <div class="m-widget4__progress-wrapper">
                        <span class="m-widget17__progress-number">
                            <?= round($pro[0],0); ?> %
                        </span>
                        <div class="progress m-progress--sm">
                            <div class="progress-bar m--bg-accent" role="progressbar" style="width: <?= round($pro[0],0); ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="m-widget24__item">
                        <div class="row">
                            <div class="col-md-4">
                                <span class="m-widget24__stats m--font-info">
                                    Total: <br><?= Projet::getM($projet['montant']); ?> MAD
                                </span>
                            </div>
                            <div class="col-md-4">
                                <span class="m-widget24__stats m--font-accent">
                                    Payée: <br><?= Projet::getM($projet['montant'] - $sum[0]); ?> MAD
                                </span>
                            </div>
                            <div class="col-md-4">
                                <span class="m-widget24__stats m--font-danger">
                                    Le reste: <br><?= Projet::getM($sum[0]); ?> MAD
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>