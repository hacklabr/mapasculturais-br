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
             <p> Neste mapa estão reunidas informações do antigo Sistema Nacional de Informações e Indicadores Culturais (SNIIC) e da <a href='http://culturaviva.gov.br'>Rede Cultura Viva</a>. As próximas bases de dados a compor o Mapa da Cultura serão o Sistema Nacional de Bibliotecas e o Cadastro Nacional de Museus. </p>
             <p> Além disso, o Ministério da Cultura unirá esforços com o sistemas de informação de estados e de municípios e, mais do que isso, irá auxiliá-los na consolidação de seus sistemas de informações e indicadores culturais. </p>",
            'home: events' => "Pesquise e encontre eventos culturais em todo Brasil! Uma vez cadastrado no Mapa da Cultura, você pode incluir seus eventos na plataforma e divulgá-los gratuitamente. Em breve estes eventos serão difundidos também em aplicativos de celular e sites de agenda cultural!",
            'home: agents' => "Colabore com a gestão da cultura com informações sobre suas iniciativas, preenchendo seu perfil de agente cultural. Neste espaço, estão registrados artistas, gestores, produtores e instituições; uma rede de atores envolvidos na cena cultural brasileira. É possível cadastrar um ou mais agentes (grupos, coletivos, bandas instituições, empresas, etc.), além de associar ao seu perfil eventos e espaços culturais com divulgação gratuita.",
            'home: spaces' => "Procure e encontre espaços culturais cadastrados na plataforma, acessando os campos de busca combinada que ajudam a refinar sua pesquisa. Cadastre também os espaços onde desenvolve suas atividades artísticas e culturais.",
            'home: projects' => "Os projetos agregam eventos continuados, projetos culturais ou um grupo de eventos. Neste espaço, você encontra leis de fomento, mostras, convocatórias e editais criados, além de diversas iniciativas cadastradas pelos participantes da plataforma. Cadastre-se e divulgue seus projetos.",
            'home: home_devs' => 'Colabore com o Mapa da Cultura! Confira a nossa <a href="https://github.com/culturagovbr/mapasculturais/blob/master/doc/api.md" target="_blank">API</a>. A partir dela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas e derivadas. 
            <p>Além disso, o Mapa da Culturais é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, fruto de parceria entre o <a href="http://institutotim.org.br" target="_blank">Instituto TIM</a> e a prefeitura de São Paulo, mas já adotado em muitas outras regiões do país. Você pode contribuir para o seu desenvolvimento por meio do <a href="https://github.com/culturagov/mapasculturais/" target="_blank">GitHub</a>.</p>',
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
                    'validations' => array(
                        'required' => 'O CEP é obrigatório.',
                    )
                ],
                'En_Nome_Logradouro' => [
                    'label' => 'Logradouro',
                    'validations' => array(
                        'required' => 'O nome do logradouro é obrigatório.',
                    )
                ],
                'En_Num' => [
                    'label' => 'Número',
                    'validations' => array(
                        'required' => 'O número é obrigatório.',
                    )
                ],
                'En_Complemento' => [
                    'label' => 'Complemento',
                ],
                'En_Bairro' => [
                    'label' => 'Bairro',
                    'validations' => array(
                        'required' => 'O bairro é obrigatório.',
                    )
                ],
                'En_Municipio' => [
                    'label' => 'Município',
                    'validations' => array(
                        'required' => 'O município é obrigatório.',
                    )
                ],
                'En_Estado' => [
                    'label' => 'Estado',
                    'validations' => array(
                        'required' => 'O Estado é obrigatório',
                    ),
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
                    'private' => false
                ],
                'En_CEP' => [
                    'label' => 'CEP',
                    'private' => function(){
                        return !$this->publicLocation;
                    },
                    'validations' => array(
                        'required' => 'O CEP é obrigatório.',
                    )
                ],
                'En_Nome_Logradouro' => [
                    'label' => 'Logradouro',
                    'private' => function(){
                        return !$this->publicLocation;
                    },
                    'validations' => array(
                        'required' => 'O nome do logradouro é obrigatório.',
                    )
                ],
                'En_Num' => [
                    'label' => 'Número',
                    'private' => function(){
                        return !$this->publicLocation;
                    },
                    'validations' => array(
                        'required' => 'O número é obrigatório.',
                    )
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
                    'validations' => array(
                        'required' => 'O bairro é obrigatório.',
                    )
                ],
                'En_Municipio' => [
                    'label' => 'Município',
                    'private' => function(){
                        return !$this->publicLocation;
                    },
                    'validations' => array(
                        'required' => 'O município é obrigatório.',
                    )
                ],
                'En_Estado' => [
                    'label' => 'Estado',
                    'private' => function(){
                        return !$this->publicLocation;
                    },
                    'validations' => array(
                        'required' => 'O Estado é obrigatório',
                    ),
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
        
        
        /*
         * @TODO: remover isto depois de resolver o bug das taxonomias existentes em um tema e inexistes noutro.
         * O mapas culturais deve ignorar as taxonomias não registradas.
         */
        
        $taxonomies = [
            // Atuação e Articulação
            'contemplado_edital' => 'Editais do Ministério da Cultura em que foi contemplado',
            'acao_estruturante' => 'Ações Estruturantes',
            'publico_participante' => 'Públicos que participam das ações',
            'local_realizacao' => 'Locais onde são realizadas as ações culturais',
            'area_atuacao' => 'Área de experiência e temas',
            'instancia_representacao_minc' => 'Instância de representação junto ao Ministério da Cultura',
            // Economia Viva
            'ponto_infra_estrutura' => '',
            'ponto_equipamentos' => '',
            'ponto_recursos_humanos' => '',
            'ponto_hospedagem' => '',
            'ponto_deslocamento' => '',
            'ponto_comunicacao' => '',
            'ponto_sustentabilidade' => '',
            // Formação
            'metodologias_areas' => ''
        ];

        $id = 10;

        foreach ($taxonomies as $slug => $description){
            $id++;
            $def = new \MapasCulturais\Definitions\Taxonomy($id, $slug, $description);
            $app->registerTaxonomy('MapasCulturais\Entities\Agent', $def);
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
    
    function getOneEntity($entity_class) {
        $app = \MapasCulturais\App::i();

        $cache_id = __METHOD__ . ':' . $entity_class;

        if($app->cache->contains($cache_id)){
            return $app->cache->fetch($cache_id);
        }

        $dql = "
        SELECT
           e.id
        FROM
           $entity_class e
        WHERE
           e.status > 0
           
       ";

        if ($entity_class === 'MapasCulturais\Entities\Event') {
            $events = $app->controller('Event')->apiQueryByLocation(array(
                '@from' => date('Y-m-d'),
                '@to' => date('Y-m-d', time() + 28 * 24 * 3600),
                '@select' => 'id'
            ));
            $event_ids = array_map(function($item) {
                return $item['id'];
            }, $events);

            if ($event_ids)
                $dql .= ' AND e.id IN (' . implode(',', $event_ids) . ')';
            else
                return null;
        }

        $ids = $app->em->createQuery($dql)
                ->useQueryCache(true)
                ->setResultCacheLifetime(60 * 5)
                ->getScalarResult();

        if ($ids) {
            $id = $ids[array_rand($ids)]['id'];
            $result = $app->repo($entity_class)->find($id);
        } else {
            $result = null;
        }

        $app->cache->save($cache_id, $result, 120);

        return $result;
    }
}
