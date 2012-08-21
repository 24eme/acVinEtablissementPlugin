<?php 

class WidgetEtablissement extends sfWidgetFormChoice
{
    protected $identifiant = null;

    public function __construct($options = array(), $attributes = array())
    {
        parent::__construct($options, $attributes);

        $this->setAttribute('data-ajax', $this->getUrlAutocomplete());
        $this->setOption('choices', $this->getChoices());
    }

    protected function configure($options = array(), $attributes = array())
    {
        parent::configure($options, $attributes);

        $this->setOption('choices', array());
        $this->addOption('familles', array());
        $this->setAttribute('class', 'autocomplete'); 
    }

    public function setOption($name, $value) {
        parent::setOption($name, $value);

        if($name == 'familles') {
            $this->setAttribute('data-ajax', $this->getUrlAutocomplete());
        }

        return $this;
    }

    public function getUrlAutocomplete() {
        $familles = $this->getOption('familles');

        if (!is_array($familles) && $familles) {
            $familles = array($familles);
        }

        if (is_array($familles) && count($familles) > 0) {
            
            return sfContext::getInstance()->getRouting()->generate('etablissement_autocomplete_byfamilles', array('familles' => implode("|",$familles)));
        }

        return sfContext::getInstance()->getRouting()->generate('etablissement_autocomplete_all');
    }

    public function getChoices() {
        if(!$this->identifiant) {

            return array();
        }
        $etablissements = EtablissementAllView::getInstance()->findByEtablissement($this->identifiant);
        if (!$etablissements) {

            return array();
        }
        
        $choices = array();
        foreach($etablissements->rows as $key => $etablissement) {
            $choices[EtablissementClient::getInstance()->getIdentifiant($etablissement->id)] = EtablissementAllView::getInstance()->makeLibelle($etablissement->key);
        }

        return $choices;
    }

    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        $this->identifiant = $value;

        return parent::render($name, $value, $attributes, $errors);
    }

}