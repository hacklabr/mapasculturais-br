<?php
namespace MapasBR;
use MapasCulturais\Themes\BaseV1;
use MapasCulturais\App;

class Theme extends BaseV1\Theme{

    protected static function _getTexts(){
        return array(
            'site: in the region' => 'no Brasil',
            'site: of the region' => 'do Brasil',
            'site: owner' => 'Ministério da Cultura',
            'site: by the site owner' => 'pelo Ministério da Cultura',

            'home: title' => "Bem-vind@ plataforma " . App::i()->siteName,
            'home: abbreviation' => "MinC",
        );
    }

    static function getThemeFolder() {
        return __DIR__;
    }
    
    public function addEntityToJs(\MapasCulturais\Entity $entity) {
        parent::addEntityToJs($entity);
        $this->jsObject['entity']['sniic_tipo_nivel_1'] = $entity->sniic_tipo_nivel_1;
        $this->jsObject['entity']['sniic_tipo_nivel_2'] = $entity->sniic_tipo_nivel_2;
        $this->jsObject['entity']['sniic_tipo_nivel_3'] = $entity->sniic_tipo_nivel_3;
    }
    
    public function register() {
        parent::register();
        
        $app = App::i();
        
        $metadata = [
            'MapasCulturais\Entities\Agent' => [
                'sniic_tipo_nivel_1' => [
                    'label' => 'Tipologia Nível 1',
                    'private' => false
                ],
                'sniic_tipo_nivel_2' => [
                    'label' => 'Tipologia Nível 2',
                    'private' => false
                ],
                'sniic_tipo_nivel_3' => [
                    'label' => 'Tipologia Nível 3',
                    'private' => false,
                    'validations' => [
                        'required' => 'A tipologia deve ser informada.'
                    ]
                ],
            ]
        ];
        
        foreach($metadata as $entity_class => $metas){
            foreach($metas as $key => $cfg){
                $def = new \MapasCulturais\Definitions\Metadata($key, $cfg);
                $app->registerMetadata($def, $entity_class);
            }
        }
    }
    
    protected function _init() {
        parent::_init();
        
        $app = App::i();
        $app->hook('view.render(agent/<<create|edit>>):before', function(){
            $this->jsObject['agentTypes'] = require __DIR__ . '/agent-types.php';
        });
        $app->hook('mapasculturais.body:before', function(){
            echo 'asd';
        });
    }
}
