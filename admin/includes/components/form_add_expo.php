
<form class="window_modal" method="POST">

<div class="window_main">
    <div class="window_head">
        <h2 class="title_form">Ajouter une nouvelle exposition</h2>
    </div>

    <div class="window_info_bloc">
        <div class="window_info_left">
            <div class="inp_nom">
                <label for="nom_expo" class="nom_expo">Nom exposition <span>*</span></label>
                <input type="text" name="nom_expo" id="nom_expo" placeholder="Nom exposition">
            </div>
            <div class="inp_image">
                <label for="image_expo" class="image_expo">Télécharger
                    image <span>*</span></label>
                <input type="file" name="image_expo" id="image_expo" placeholder="Télécharger
                    image ">
            </div>
            <div class="inp_date_debut_expo">
                <label for="date_debut_expo" class="date_debut_expo">Date début d'exposition</label>
                <input type="date" name="date_debut_expo" id="date_debut_expo"
                    placeholder="Date début d'exposition">
            </div>

            <div class="inp_date_fin_expo">
                <label for="date_fin_expo" class="date_fin_expo">Date fin d'exposition</label>
                <input type="date" name="date_fin_expo" id="date_fin_expo" placeholder="Date fin d'exposition">
            </div>

            <div class="inp_horaire_visite">
                <label for="horaire_visite" class="horaire_visite">Horaire visite</label>
                <input type="time" name="horaire_visite" id="horaire_visite" placeholder="Horaire visite">
            </div>

        </div>

        <div class="window_info_right">

            <div class="inp_nom_directeur_art">
                <label for="nom_directeur_art" class="nom_directeur_art">Nom directeur artistique</label>
                <input type="text" name="nom_directeur_art" id="nom_directeur_art" placeholder="Nom">
            </div>

            <div class="inp_prenom_directeur_art">
                <label for="prenom_directeur_art" class="prenom_directeur_art">Prénom directeur
                    artistique</label>
                <input type="text" name="prenom_directeur_art" id="prenom_directeur_art" placeholder="Prénom">
            </div>
            <div class="inp_email_directeur_art">
                <label for="email_directeur_art" class="email_directeur_art">Email directeur artistique</label>
                <input type="email" name="email_directeur_art" id="email_directeur_art"
                    placeholder="Email directeur artistique">
            </div>

            <div class="inp_nombre_oeuvres">
                <label for="nombre_oeuvres" class="nombre_oeuvres">Nombre d'oeuvres</label>
                <input type="number" name="nombre_oeuvres" id="nombre_oeuvres" placeholder="Nombre d'oeuvres">
            </div>

            <div class="inp_report_freq">
                <label for="report_freq" class="report_freq">Fréquentation</label>
                <input type="number" name="report_freq" id="report_freq" placeholder="Fréquentation">
            </div>

            <div class="inp_theme_expo">

                <label for="theme_expo" class="theme_expo">Thême exposition</label>
                <select name="theme_expo" id="theme_expo"></select>
            </div>



        </div>
    </div>
    <div class="get_mit window_footer">
        <div class="box_button"><button type="submit">Ajouter</button></div>
    </div>
</div>

</div>
</form>