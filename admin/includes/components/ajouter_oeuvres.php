<form class="window_modal" method="POST">

<div class="window_main">
    <div class="window_head">
        <h2 class="title_form">Ajouter une oeuvre</h2>
    </div>

    <div class="window_info_bloc">
        <div class="window_info_left">
            <div class="inp_nom">
                <label for="nom_oeuvre" class="nom_oeuvre">Nom <span>*</span></label>
                <input type="text" name="nom_oeuvre" id="nom_oeuvre" placeholder="Nom">
            </div>
            <div class="inp_image">
                <label for="image_oeuvre" class="image_oeuvre">Télécharger
                    image <span>*</span></label>
                <input type="file" name="image_oeuvre" id="image_oeuvre" placeholder="Télécharger
                    image ">
            </div>
            <div class="inp_date">
                <label for="date_oeuvre" class="date_oeuvre">Date de réalisation</label>
                <input type="date" name="date_oeuvre" id="date_oeuvre"
                    placeholder="Date de réalisation de l'oeuvre">
            </div>

            <div class="inp_date_livraison_prevu">
                <label for="date_livraison_prevu_oeuvre" class="date_livraison_prevu_oeuvre">Date de livraison
                    prévu</label>
                <input type="date" name="nombres_de_vues_oeuvre" id="nombres_de_vues_oeuvre"
                    placeholder="E-mail">
            </div>

            <div class="inp_date_livraison_reel">
                <label for="date_livraison_reel_oeuvre" class="date_livraison_reel_oeuvre">Date de livraison
                    réel</label>
                <input type="date" name="nombres_de_vues_oeuvre" id="nombres_de_vues_oeuvre"
                    placeholder="E-mail">
            </div>

            <div class="inp_nombres_de_vues">
                <label for="nombres_de_vues_oeuvre" class="nombres_de_vues_oeuvre">Nombre de vues</label>
                <input type="number" name="nombres_de_vues_oeuvre" id="nombres_de_vues_oeuvre"
                    placeholder="Nombre de vues">
            </div>

        </div>

        <div class="window_info_right">
            <div class="inp_largeur">
                <label for="largeur_oeuvre" class="largeur_oeuvre">Largeur en cm</label>
                <input type="number" name="largeur_oeuvre" id="largeur_oeuvre" placeholder="Largeur en cm">
            </div>
            <div class="inp_hauteur">
                <label for="hauteur_oeuvre" class="hauteur_oeuvre">Hauteur en cm</label>
                <input type="number" name="hauteur_oeuvre" id="hauteur_oeuvre" placeholder="Hauteur en cm">
            </div>
            <div class="inp_profondeur">
                <label for="profondeur_oeuvre" class="profondeur_oeuvre">Profondeur en cm</label>
                <input type="number" name="profondeur_oeuvre" id="profondeur_oeuvre" placeholder="Profondeur en cm">
            </div>
            <div class="inp_poids">
                <label for="poids_oeuvre" class="poids_oeuvre">Poids en kg<span></span></label>
                <input type="number" name="poids_oeuvre" id="poids_oeuvre" placeholder="Poids en kg/mb">
            </div>
            <div class="inp_duree">
                <label for="duree_oeuvre" class="duree_oeuvre">Durée</label>
                <input type="time" name="duree_oeuvre" id="duree_oeuvre" placeholder="Date de décès">
            </div>
            <div class="inp_description">
                <label for="description_oeuvre" class="description_oeuvre">Description</label>
                <textarea name="description_oeuvre" id="description_oeuvre" cols="30" rows="6"
                    placeholder="Description"></textarea>
                <div class="box_button_description">
                    <div class="button_description"><button type="">FRA</button></div>
                    <div class="button_description"><button type="">GBR</button></div>
                    <div class="button_description"><button type="">DEU</button></div>
                    <div class="button_description"><button type="">RUS</button></div>
                    <div class="button_description"><button type="">CHN</button></div>
                </div>
            </div>

        </div>
    </div>
    <div class="get_mit window_footer">
        <div class="box_button"><button type="submit">Ajouter</button></div>
    </div>
</div>

</div>
</form>