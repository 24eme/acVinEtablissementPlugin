<?php

class acVinEtablissementRouting {

    /**
     * Listens to the routing.load_configuration event.
     *
     * @param sfEvent An sfEvent instance
     * @static
     */
    static public function listenToRoutingLoadConfigurationEvent(sfEvent $event) {
        $r = $event->getSubject();

        $r->prependRoute('etablissement_autocomplete_all', new sfRoute('/etablissement/autocomplete/:interpro_id/tous',
                        array('module' => 'etablissement_autocomplete',
                            'action' => 'all')));
        															   
		
		$r->prependRoute('etablissement_autocomplete_byfamilles', new sfRoute('/etablissement/autocomplete/:interpro_id/familles/:familles', 
        															   array('module' => 'etablissement_autocomplete', 
                                                                             'action' => 'byFamilles')));
                
                $r->prependRoute('etablissement_modification', new EtablissementRoute('/etablissement/:identifiant/modification',
                        array('module' => 'etablissement',
                            'action' => 'modification'),
                        array('sf_method' => array('get', 'post')),
                    array('model' => 'Etablissement',
                        'type' => 'object') ));
                
                $r->prependRoute('etablissement_new', new EtablissementRoute('/etablissement/:identifiant/nouveau',
                        array('module' => 'etablissement',
                            'action' => 'nouveau'),
                        array('sf_method' => array('get', 'post')),
                    array('model' => 'Etablissement',
                        'type' => 'object') ));
                
                

    }

}