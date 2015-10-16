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
            'home: welcome' => "O Mapa da Cultura é um espaço para integrar e dar visibilidade para produtores, artistas, espaços e eventos culturais. Ele é a principal base do Ministério da cultura, integrando cadastros de diferentes programas. Neste mapa estão reunidas informações do antigo SNIIC e da <a href='http://culturaviva.gov.br'>Rede Cultura Viva</a>. Sistema Nacional de Bibliotecas e Cadastro Nacional de Museus serão os próximos programas a se integrarem. Além disso, o Ministério da Cultura pretende unir esforços com o sistemas de informação dos estados e municípios e, mais do que isso, pretende auxiliar estados e municípios na consolidação de seus sistemas.",
            'home: events' => "Você pode pesquisar eventos culturais em todo Brasil. Como usuário cadastrado, você pode incluir seus eventos na plataforma e divulgá-los gratuitamente. No futuro esses eventos serão divulgados em aplicativos de celular e sites de agenda cultural!",
            'home: agents' => "Você pode colaborar na gestão da cultura com suas próprias informações, preenchendo seu perfil de agente cultural. Neste espaço, estão registrados artistas, gestores, produtores e instituições; uma rede de atores envolvidos na cena cultural brasileira. Você pode cadastrar um ou mais agentes (grupos, coletivos, bandas instituições, empresas, etc.), além de associar ao seu perfil eventos e espaços culturais com divulgação gratuita.",
            'home: spaces' => "Procure por espaços culturais incluídos na plataforma, acessando os campos de busca combinada que ajudam na precisão de sua pesquisa. Cadastre também os espaços onde desenvolve suas atividades artísticas e culturais.",
            'home: projects' => "Reúne projetos culturais ou agrupa eventos de todos os tipos. Neste espaço, você encontra leis de fomento, mostras, convocatórias e editais criados, além de diversas iniciativas cadastradas pelos usuários da plataforma. Cadastre-se e divulgue seus projetos.",
            'home: home_devs' => 'Existem algumas maneiras de desenvolvedores interagirem com o Mapas Culturais. A primeira é através da nossa <a href="https://github.com/culturagovbr/mapasculturais/blob/master/doc/api.md" target="_blank">API</a>. Com ela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas. Além disso, o Mapas Culturais é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, fruto de parceria entre o <a href="http://institutotim.org.br" target="_blank">Instituto TIM</a> e a prefeitura de São Paulo, mas já adotado em muitas outras regiões do país, e você pode contribuir para o seu desenvolvimento através do <a href="https://github.com/culturagov/mapasculturais/" target="_blank">GitHub</a>.',
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
                'num_sniic' => [
                    'label' => 'Nº SNIIC:',
                    'private' => false
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
