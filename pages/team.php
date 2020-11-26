

<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="row">
            <div class="col-md-6">
                <div class="m-portlet__head-caption" style="padding-top: 25px;">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Equipe du projet
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="pull-right" style="padding-top: 18px;">
                    <button type="button" class="btn btn-primary" id="team" data-dismiss="modal">Ajouter Equipe</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="teammodal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelAddligne">
                        Ajouter l'equipe: 
                    </h5>
                    <button type="button" class="close" data-dismiss="modal_add" aria-label="Close">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <form action="../router.php" method="POST" class="m-form">
                    <div class="modal-body">
                        <input type="hidden" name="id_projet" value="<?=$_GET['id_projet']; ?>">
                        <input type="hidden" name="action" value="team">
                        <input type="hidden" name="traitement" value="add">
                        <div class="form-group">
                            <label for="users" class="form-control-label">
                                Equipe
                            </label>
                            <?php 
                                $userTable = [];
                                $users = User::getListe();
                                $projetUsers = Team::getListe();
                                foreach($projetUsers as $user) {
                                    if($user['projet_id'] == $_GET['id_projet']) {
                                        $userTable.array_push($userTable, $user['user_id']);
                                    }
                                }
                            ?>
                            <select name="users[]" id="users" class="form-control" multiple>
                                <?php 
                                    foreach($users as $user) : 
                                        if($user['id_role'] == 3 && ! in_array($user['id_user'], $userTable)) :
                                ?>
                                            <option value="<?= $user['id_user']; ?>"><?= $user['nom'] . ' ' . $user['prenom'] ;?></option>
                                <?php 
                                        endif;
                                    endforeach; 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">

    <table class="table m-table m-table--head-bg-brand">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $users = Team::getTeamByProjet($_GET['id_projet']);
                foreach ($users as $user) :
            ?>

                    <tr>
                        <th scope="row"><?= $i?></th>
                        <td><?= $user['nom']; ?></td>
                        <td><?= $user['prenom']; ?></td>
                        <td>
                            <a href="../router.php?action=team&traitement=delete&id=<?= $user['id_user']; ?>&id_projet=<?= $_GET['id_projet']?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                    

                <?php 
                    $i++;
                    endforeach
                ?>
        </tbody>
    </table>
    </div>
</div>