<!-- #principal -->
<section id="principal">
    <p id="fil_ariane"><strong>Page d'accueil > Contacts > <?php //echo $societe->raison_sociale; ?> > </strong>Modification établissement</p>

        <!-- #contenu_etape -->
        <!-- #contenu_etape -->    
        <section id="contacts">
         <div id="nouveau_etablissement">
            <h2><?php echo $etablissement->nom; ?></h2>
			
			<div class="form_btn">
				<a id="btn_modifier" href="<?php echo url_for('etablissement_modification',$etablissement); ?>" class="btn_majeur btn_modifier">Modifier</a>
			</div>
			
				<div id="detail_etablissement" >
					<?php include_partial('etablissement/visualisation', array('etablissement' => $etablissement,'ordre' => 0)); ?>
				</div>
            
				<div id="coordonnees_etablissement" class="form_section ouvert">
					<h3>Coordonnées de l'établissement</h3>
					<?php include_partial('compte/coordonneesVisualisation', array('compte' => $contact)); ?>
				</div>
         </div>
        </section>
    </section>
<?php
slot('colButtons');
?>
<div id="action" class="bloc_col">
    <h2>Action</h2>
    <div class="contenu">
        <div class="btnRetourAccueil">
            <a href="<?php echo url_for('societe'); ?>" class="btn_majeur btn_acces"><span>Accueil des sociétés</span></a>
        </div>
    </div>
    <div class="contenu">
        <div class="btnRetourAccueil">
            <a href="<?php echo url_for('societe_visualisation', array('identifiant' => $societe->identifiant)); ?>" class="btn_majeur btn_acces"><span>Accueil de la société</span></a>
        </div>
    </div>
</div>
<?php
end_slot();
?> 
