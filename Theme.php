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
        $this->jsObject['entity']['tipologia_nivel1'] = $entity->tipologia_nivel1;
        $this->jsObject['entity']['tipologia_nivel2'] = $entity->tipologia_nivel2;
        $this->jsObject['entity']['tipologia_nivel3'] = $entity->tipologia_nivel3;
    }
    
    public function register() {
        parent::register();
        
        $app = App::i();
        
        $metadata = [
            'MapasCulturais\Entities\Agent' => [
                'tipologia_nivel1' => [
                    'label' => 'Tipologia Nível 1',
                    'private' => false
                ],
                'tipologia_nivel2' => [
                    'label' => 'Tipologia Nível 2',
                    'private' => false
                ],
                'tipologia_nivel3' => [
                    'label' => 'Tipologia Nível 3',
                    'private' => false,
                    'validations' => [
                        'required' => 'A tipologia deve ser informada.'
                    ]
                ],  
                'En_CEP' => [
                    'label' => 'CEP',
                    'private' => function(){
                        return !$this->publicLocation;
                    },
                ],
                'En_Nome_Logradouro' => [
                    'label' => 'Logradouro',
                    'private' => function(){
                        return !$this->publicLocation;
                    },
                ],
                'En_Num' => [
                    'label' => 'Número',
                    'private' => function(){
                        return !$this->publicLocation;
                    },
                ],
                'En_Complemento' => [
                    'label' => 'Complemento',
                    'private' => function(){
                        return !$this->publicLocation;
                    },
                ],
                'En_Bairro' => [
                    'label' => 'Bairro',
                    'private' => function(){
                        return !$this->publicLocation;
                    },
                ],
                'En_Municipio' => [
                    'label' => 'Município',
                    'private' => function(){
                        return !$this->publicLocation;
                    },
                ],
                'En_Estado' => [
                    'label' => 'Estado',
                    'private' => function(){
                        return !$this->publicLocation;
                    },
                    'type' => 'select',

                    'options' => array(
                        'AC'=>'Acre',              
                        'AL'=>'Alagoas',
                        'AP'=>'Amapá',             
                        'AM'=>'Amazonas',
                        'BA'=>'Bahia',             
                        'CE'=>'Ceará',
                        'DF'=>'Distrito Federal',  
                        'ES'=>'Espírito Santo',
                        'GO'=>'Goiás',             
                        'MA'=>'Maranhão',
                        'MT'=>'Mato Grosso',       
                        'MS'=>'Mato Grosso do Sul',
                        'MG'=>'Minas Gerais',      
                        'PA'=>'Pará',
                        'PB'=>'Paraíba',           
                        'PR'=>'Paraná',
                        'PE'=>'Pernambuco',        
                        'PI'=>'Piauí',
                        'RJ'=>'Rio de Janeiro',    
                        'RN'=>'Rio Grande do Norte',
                        'RS'=>'Rio Grande do Sul', 
                        'RO'=>'Rondônia',
                        'RR'=>'Roraima',           
                        'SC'=>'Santa Catarina',
                        'SP'=>'São Paulo',         
                        'SE'=>'Sergipe',
                        'TO'=>'Tocantins',
                    )
                ],
                'numSniic' => [
                    'label' => 'Nº SNIIC:',
                    'private' => false,
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
        /*$app->hook('mapasculturais.body:before', function(){
            $this->part('header-sniic');
        });
        */
    }
}
