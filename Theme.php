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

            'home: title' => "Bem-vindo ao Mapa da Cultura ",
            'home: abbreviation' => "MinC",
            'home: colabore' => "Participe!",
            'home: welcome' => "<p>O Mapa da Cultura é um espaço para integrar e dar visibilidade para projetos, artistas, espaços, eventos culturais e seus produtores. Ele é a principal base de informações e indicadores do Ministério da Cultura, agregando cadastros de diferentes programas e ações. </p>
             <p> Neste mapa estão reunidas informações do antigo Sistema Nacional de Iinformações e Indicadores Culturais (SNIIC) e da <a href='http://culturaviva.gov.br'>Rede Cultura Viva</a>. As próximas bases de dados a compor o Mapas da Cultura Brasileira serão o Sistema Nacional de Bibliotecas e o Cadastro Nacional de Museus. </p>
             <p> Além disso, o Ministério da Cultura irá unir esforços com o sistemas de informação de estados e de municípios e, mais do que isso, irá auxiliá-los na consolidação de seus sistemas de informações e indicadores culturais. </p>",
            'home: events' => "Pesquise e encontre eventos culturais em todo Brasil! Uma vez cadastrado no Mapas Culturais, você pode incluir seus eventos na plataforma e divulgá-los gratuitamente. Em breve estes eventos serão difundidos também em aplicativos de celular e sites de agenda cultural!",
            'home: agents' => "Colabore com a gestão da cultura com informações sobre suas iniciativas, preenchendo seu perfil de agente cultural. Neste espaço, estão registrados artistas, gestores, produtores e instituições; uma rede de atores envolvidos na cena cultural brasileira. É possível cadastrar um ou mais agentes (grupos, coletivos, bandas instituições, empresas, etc.), além de associar ao seu perfil eventos e espaços culturais com divulgação gratuita.",
            'home: spaces' => "Procure e encontre espaços culturais cadastrados na plataforma, acessando os campos de busca combinada que ajudam a refinar sua pesquisa. Cadastre também os espaços onde desenvolve suas atividades artísticas e culturais.",
            'home: projects' => "Os projetos agregam eventos continuados, projetos culturais ou um grupo de eventos. Neste espaço, você encontra leis de fomento, mostras, convocatórias e editais criados, além de diversas iniciativas cadastradas pelos participantes da plataforma. Cadastre-se e divulgue seus projetos.",
            'home: home_devs' => 'Colabore com o Mapas Culturais! Confira a nossa <a href="https://github.com/culturagovbr/mapasculturais/blob/master/doc/api.md" target="_blank">API</a>. A partir dela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas e derivadas. Além disso, o Mapas Culturais é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, fruto de parceria entre o <a href="http://institutotim.org.br" target="_blank">Instituto TIM</a> e a prefeitura de São Paulo, mas já adotado em muitas outras regiões do país. Você pode contribuir para o seu desenvolvimento por meio do <a href="https://github.com/culturagov/mapasculturais/" target="_blank">GitHub</a>.',
//
//            'search: verified results' => 'Resultados Verificados',
//            'search: verified' => "Verificados"
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
            'MapasCulturais\Entities\Event' => [
                'num_sniic' => [
                    'label' => 'Nº SNIIC:',
                    'private' => false
                ],
            ],

            'MapasCulturais\Entities\Project' => [
                'num_sniic' => [
                    'label' => 'Nº SNIIC:',
                    'private' => false
                ],
            ],

            'MapasCulturais\Entities\Space' => [
                'num_sniic' => [
                    'label' => 'Nº SNIIC:',
                    'private' => false
                ],

                'En_CEP' => [
                    'label' => 'CEP',
                ],
                'En_Nome_Logradouro' => [
                    'label' => 'Logradouro',
                ],
                'En_Num' => [
                    'label' => 'Número',
                ],
                'En_Complemento' => [
                    'label' => 'Complemento',
                ],
                'En_Bairro' => [
                    'label' => 'Bairro',
                ],
                'En_Municipio' => [
                    'label' => 'Município',
                ],
                'En_Estado' => [
                    'label' => 'Estado',
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
            ],

            'MapasCulturais\Entities\Agent' => [
                'num_sniic' => [
                    'label' => 'Nº SNIIC:',
                    'private' => false
                ],

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
        $this->enqueueScript('app', 'endereco', 'js/endereco.js');
        $this->enqueueScript('app', 'num-sniic', 'js/num-sniic.js');

        $app->hook('view.render(agent/<<create|edit>>):before', function(){
            $this->jsObject['agentTypes'] = require __DIR__ . '/agent-types.php';
        });
        /*$app->hook('mapasculturais.body:before', function(){
            $this->part('header-sniic');
        });
        */

        $app->hook('entity(<<Agent|Space|Event|Project>>).save:after', function() use ($app){
            if(!$this->getValidationErrors()){
                $num = strtoupper(substr($this->entityType, 0, 2)) . '-' . $this->id;
                $this->num_sniic = $num;
            }
        });
    }
}
