

                        <div class="fonction clearfix col-md-7 panel panel-default">
                            <div class="sup_fonction glyphicon-minus">
                                Supprimer la fonction <?php echo $data_fonction['id_nom']; ?>
                            </div>
                            <h1>
                                <?php echo $data_fonction['id_nom']; ?>
                            </h1>

                            <p>
                                Nom de la fonction : 

                                <input type="text" class="form-control" class="fonction_nom" 
                                       name="fonction[<?php echo $key; ?>][nom]" value="<?php echo $data_fonction['id_nom']; ?>"/>
                            </p>

                            <br/>

                            <p>
                                Phrase préalable donnée par SARAH 
                                <input type="text" class="form-control" class="question_sarah" 
                                       name="fonction[<?php echo $key; ?>][question]" value="<?php echo $data_fonction['question_de_sarah']; ?>"/>

                            </p>

                            <br/>
                            <div class="regex">
                                <?php
                                $j = 0;
                                foreach (Motcle_crud::get_motcles($data_fonction['id_nom']) as $key2 => $data_motcle) {
                                    include 'motcle.php';
                                }
                                ?>
                            </div>

                            <div class="add_regex glyphicon-plus">
                                Ajouter un champ regex
                            </div>
                        </div>