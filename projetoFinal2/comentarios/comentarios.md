# Comentários 10/06/2018

Pré textual: escrever resumo e abstract.

Penso que o título poderia ser mudado para **Definição, Estudo e Implementação de um Sistema de Divulgação de Informações Integrado do IFB**

Não fiz uma revisão do texto, apenas do conteúdo, no entanto, muita coisa pode ser reescrita ou melhorada. Após as alterações principais, vamos começar a trabalhar nisso.


## Capítulo 1 - Introdução

A proposta da introdução é definir o problema que nós estamos estudando e qual a deficiência do IFB no que tange o mecanismo de divulgação de informações institucional.




> Com o passar dos anos, a mídia foi obtendo novas formas, as divulgações de forma estática e mais tradicionais (revistas e jornais) foram deixando de serem os meios mais eficientes de se expor um conteúdo ou propaganda, foi necessário então que novas formas de expor conteúdos fossem pensadas e desenvolvidas.

----------- OK
Ao falar de mídia e meios estáticos, você não disse quais os meios que sucederam eles. Cite a Internet aqui e utilize uma referência para maior embasamento. Ou seja, queremos dizer que hoje em dia a dinâmica do fluxo de informações mudou. Tanto é que depois você fala de Marketing Digital. Lembre-se que os parágrafos devem estar *linkados*.

----------- OK
Alguns parágrafos aparecem soltos e sem referências, como este abaixo:

> A uso das redes para disseminação de uma informação ou conteúdo vem se tornando uma das ferramentas mais atraentes para divulgações. Não apenas por ser um dos
meios mais acessados atualmente, mas também por conta da maior facilidade de interações
dos espectadores, usuários e empresas.

----------- OK
Utilize referências para embasar o que você está dizendo.

> Entre os usuários de dispositivos móveis estão estudantes, professores e visitantes
do Instituto Federal de Educação, Ciência e Tecnologia de Brasília - Campus Taguatinga
(IFB - Campus Taguatinga).

----------- OK
Retire esse parágrafo. Não é necessário fazer esta constatação fora de contexto.


>O Campus, para divulgação de notícias e as mais variadas informações, se utiliza
principalmente da página oficial e sua página oficial no Facebook. Para utilização desses
meios, é necessário serem feitas publicações independentes, além disso, as páginas não são
bem divulgadas, muitas vezes os estudantes e visitantes nem ficam sabendo das notícias
que lá são publicadas. Além disso, os professores contam com poucas formas fáceis e
intuitivas para repassar informações a seus alunos.

----------- OK
Não está claro o que são publicações independentes. Fala que cada veículo de divulgação de informações é operado individualmente, onerando o trabalho do servidor.



> No intuito da melhor visibilidade das notícias, da maior interação da comunidade
com elas e de uma melhor forma de comunicação entre professor e aluno, surgiu a ideia
do SID, onde será possível um sistema mais integrado e intuitivo para o administrador
e um sistema interativo para a comunidade, onde será possível opinar com comentários
e curtidas nas publicações, além de atalho para acessar a notícia completa tanto por um
computador, quando pelos smartphones e com o uso dos smartphones será possível o
professor encaminhar mensagens para a turma em que ele leciona.

----------- OK
Reescreva este parágrafo. 
Você deve criticar dois pontos (pode utilizar parte do parágrafo anterior):
- Falta de Integração entre os veículos institucionais, isto é, eles atuam independentemente.
- Falta de interatividade entre os veículos institucionais.

----------- OK
Após a crítica, escreva um novo parágrafo e fale sobre o Sistema Integrado de Divulgação de Informações do IFB (SID) e de maneira breve, cite como ele resolve o problema, sem entrar muito em detalhes.
Basicamente você deve falar que ele integra a parte de sinalização digital em painéis espalhados pelo campus com a parte interativa provida pelas redes sociais e por que esta interatividade melhora a assimilação de informação dos transeuntes.
Além disso, diga ele simula o consumo da API do Sistema de Gestão Acadêmico Institucional, abrindo uma porta para uma implementação futura.

### 1.1 Motivação

Coloque referências nos teus parágrafos.

> Pensando nisso, vê-se a necessidade de um sistema onde é possível expor notícias
referentes a instituição com facilidade contando também com a interatividade do espectador dessa notícia, seja ele por meio de curtidas ou por comentários na publicação, tudo em tempo real. Partindo da necessidade de melhor exposição das notícias e de uma forma de contato fácil e rápida com a comunidade acadêmica, de um sistema mais interativo, com suporte a gestão academia e com uma forma simplificada de contato entre professor e aluno."

----------- OK
Não entre em detalhes de implementação, esqueça o "curtidas".

----------- OK
Além disso, *"Partindo da necessidade de melhor exposição das notícias e de uma forma de contato fácil e rápida com a comunidade acadêmica, de um sistema mais interativo, com suporte a gestão academia e com uma forma simplificada de contato entre professor e aluno."* ficou estranho, parece que está pedindo uma informação a mais. Reescreva esse período. Não é partindo disso, há uma necessidade disso.

> Então surge a ideia do SID, onde é possível a melhor interatividade do espectador com as publicações acadêmicas, envio de mensagens para turmas específicas, além do administrador ter uma maior facilidade de criar e editar publicação vinculadas a redes sociais, integrando vários serviços em um único. 

----------- OK
Não é necessário este parágrafo na motivação, isso faz parte da proposta.



### 1.2 Proposta

----------- OK
A proposta está falha.
Ela não fala do sistema e de como ele pode resolver os problemas elencados na Motivação e Introdução. Aqui você deve pegar o gancho das últimas seções e mostrar como estamos atacando o problema.

Certifique-se de dar os devidos créditos ao SID implementado no câmpus Formosa e cite as suas deficiências brevemente.

Aqui devem entrar os conceitos de:
- Sinalização e Marketing digital e sua eficiência na assimilação de informações.
- Interatividade do usuário com as notícias
- Simulação da integração do sistema com plataformas acadêmicas já existentes para futura implementação após a disponibilização da interface destas plataformas para os desenvolvedores. Aqui é importante dizer que não foi possível ainda fazer isto com a interface pois ela ainda não foi publicada pelo setor de TI da reitoria.


### 1.3 Justificativa

----------- OK
Acho que é uma boa juntar essa seção com a seção da proposta.
Você não precisa colocar aqui os parágrafos que fazem a motivação e falam sobre o problema, isso já foi feito.



### 1.4 Objetivos

Você está confundindo Objetivos Gerais com a Proposta, uma coisa é uma coisa e outra coisa é outra coisa.
Aqui você deve elencar o que nós queremos fazer neste trabalho, que basicamente é:
- Estudo de tecnologias de sinalização digital/marketing digital para levantar os principais requisitos de software para implementação do sistema.
- Estudo da API da rede social Facebook para possibilitar a interação dos usuários. 
- Definição e Implementação do Sistema de Integração de Divulgação de Informações do IFB.
- Implementação de um aplicativo mobile com as funcionalidades do sistema.
- Consumo de uma API fictícia do SGA para uma futura integração do sistema à plataforma acadêmica do IFB.


Os objetivos específicos podem se concentrar em:
- Estudo e utilização de frameworks específicos (citar).
- Disponibilização de uma API REST para interoperabilidade do SID com outros sistemas.
- Sugestão de uma proposta de implantação viável no Câmpus Taguatinga utilizando computadores Raspberry Pi.


### 1.5 Metodologia

Esta seção pode ser melhorada.

> Partindo da pesquisa descritiva, será descrito os procedimentos e passos que foram seguidos e usados para obtenção do resultado desejado.

----------- OK
Retire este parágrafo.

----------- OK
A parte da revisão bibliográfica está ok, mas é importante, sempre que você falar que vai utilizar o SID como base, se referir a qual versão do SID você está falando.

No entanto, nesta seção deverá estar presente
- Qual foi a metodologia de desenvolvimento de software utilizada e por que?
- Qual a metodologia utilizada para implementação dos módulos do sistema administrador e cliente?
- Qual a metodologia para estudar e utilizar a GRAPH API?
- Qual a metodologia utilizada para elaboração do sistema Mobile?

## Capítulo 2 - Trabalhos Relacionados

Coloque aqui no início deste capítulo o seu propósito.
Uma coisa que pode ajudar a visualizar, é colocar screenshots das ferramentas.

### 2.1 OOZO

- É estruturado como cliente/servidor ou é uma coisa só?
- Que tipo de integração com rede social o OOZO utiliza? Twitter?
- Quem captura os comentários? O sistema ou um moderador? De que forma o sistema faz isso?
- Como é feita esta sincronização com as redes sociais na versão gratuita?
- Que funcionalidades diferem entre a versão gratuita e a paga? No texto isto não está claro, apenas é afirmado que grande parte dos recursos não estão disponíveis na versão gratuita.
- Ele possui um módulo administrador? Como isso se dá?

A descrição desta ferramenta está muito confusa. Fiquei com uma série de dúvidas ao ler ela.

Procure escrever a ferramenta no mínimo de modo a detalhar todos os requisitos da tabela.

### 2.2 MangoSigns

Corrija o título da seção. O nome da ferramenta aparece errado em diversas partes do texto também.


### 2.3 SID Formosa

Detalhe melhor o SID Formosa aqui. Afinal ele foi o sistema utilizado por você como base. É importante que fique claro como ele é estruturado, pois fica mais fácil de entender o seu.

- É estruturado como cliente servidor?
- Quais os módulos disponíveis?
- Quais as limitações?
- Ele possui uma API REST para ser consumida por outras aplicações?
- Ele é portável em outros dispositivos, como *smartphones* e *tablets*?
### 2.4 Screenly

### 2.5 Xibo

### 2.6 Comparativo

É importante descrever cada trabalho relacionado de uma maneira completa, para que essa tabela faça sentido. Não fica claro pro leitor por exemplo, por que OOZO, SID, Screenly e XIBO não possuem portabilidade.

Tente escrever para cada sistema, uma explicação de como ele funciona e cumpre/não cumpre os requisitos presentes nesta tabela, senão ela fica muito solta no texto.

Por fim, escreva um último parágrafo nesta seção que o SID, de acordo com a sua proposta, pretende oferecer uma solução completa para atender todos os requisitos.

## Capítulo 3 - Referencial Teórico

Coloque no início do capítulo o seu propósito.

### 3.3 Linguagens de Programação

Tente aqui, ao abordar cada linguagem, as características que você utilizou delas para cumprir os objetivos.

Por ex: integração fácil com SGBDs.

### 3.4 Banco de Dados

### 3.5 API

O que é uma interface? O que é uma API? Ela é um instrumento mesmo? Esta definição está correta? Onde estão as referências?

Seja mais rigoroso na apresentação dos conceitos.


#### 3.5.1 REST

REST não são webservices, é uma arquitetura.  Refaça esta seção e procure referências para se embasar.


#### 3.10 Frameworks

Certifique-se de listar aqui os frameworks somente se eles estiverem sendo utilizados na ferramenta. Certifique-se em capítulos posteriores de citá-los de sua utilização também.

#### 3.11 Arquitetura Cliente-Servidor

Penso que isso aqui deveria vir bem antes, uma vez que vários outros conceitos utilizam dele.




# Comentários 05/06/2018
## Capítulo 3 - Referencial Teórico

### 3.8 - JSON

Coloque um exemplo de um arquivo JSON aqui para exemplificar o que está sendo feito. Fale também de sua utilidade, é um dos padrões mais utilizados para troca de informações na internet.


## Capítulo 4 - Graph API

### 4.1 Visão Geral

A definição informal de grafo continua com problemas. Ao falar de pontos, o leitor imagina um plano cartesiano. Utilize a definição padrão de grafos.

- "Os nós são os vértices onde cada elemento é considerado um vértice,"
Corrija

- "O relacionamento entre os vértices formam as arestas, que são as ligações entre os nós, são as conexões entre uma coleção de objetos a um objeto único, onde podem representar diversos conjuntos de
elementos, tais como as fotos de uma página ou o conjunto de comentários em uma foto."

A sua frase está confusa. Você diz que dois vértices se relacionam através de uma aresta de depois estende isso para um relacionamento n-para-um. Reescreva de outra forma, diga que um nó pode estar relacionado com vários outros através das arestas que interligam eles.

- "Os campos são os atributos mais específicos do nós ou arestas, tais como, o link de uma publicação, as informações de quem realizou o comentário, o tamanho de uma imagem, entre outros."

Nova ideia = novo parágrafo.

- "A obtenção dos elementos são feitas através de requisições e podem ser feitas
diretamente do navegador ou usando outras aplicações que usem bibliotecas HTTP. En-
tretanto, para o seu funcionamento, elas devem seguir os padrões para a obtenção de uma
resposta correta do servidor, os padrões são que as requisições devem ser feitas a conteú-
dos existentes na rede social e usando os conceitos de nós, vértices e campos para que se
possa obter os elementos desejados, além do uso de um token de acesso que permite o
acesso a elementos de acordo com as permissões que foram solicitadas e aceitas."


Esse parágrafo contém muita informação. Você está falando como conversar com a API e ao mesmo tempo introduzindo a noção de token e permissões. Separe o parágrafo. Um para cada ideia.
Aproveite e utilize o conceito de JSON aqui. O servidor responde com um JSON, correto? Entendeu o motivo de colocar isso no referencial teórico?


- "A API trabalha de forma a auxiliar o desenvolvedor a realizar requisições, ofere-
cendo diversas classes e métodos, para as mais diversas funcionalidades. Entre as diversas
classes que podem ser instanciados estão a GraphEdge() e GraphNode(), cada uma delas
possuem diversos métodos inclusos, entre eles estão o asArray, o asJson e o getField. 
A classe GraphEdge() é usado para retornar conteúdos referentes a aresta, en-
quanto a classe GraphNode() é usada para retornar conteúdo referentes aos nós. Já os
métodos asArray, asJson e getField são usados para representar respectivamente um re-
torno em formato de ARRAY, em formato JSON ou um campo específico em formato
ARRAY. Portanto, as respostas a todas as requisições feitas a rede social serão em formato
e estrutura JSON ou Array."

Muito detalhe, essa é a seção de visão geral.

Termine esta seção colocando a tabela que está no início da Seção 4.2 aqui. A ideia desta tabela é introduzir os principais nós com os seus relacionamentos, como você fez.
Talvez seja interessante você tirar a parte mais técnica da tabela da visão geral como o: /{ID}/me, e em vez de /albums, /photos, /feed, /friends, coloque os objetos da vida real: álbum de fotos, fotos, *feed* de notícias, amigos. Toda essa parte mais técnica você vai abordar ao falar de cada nó individualmente, ou seja, ela vai estar presente, mas no lugar correto.

Antes de falar de qualquer nó, como você está utilizando o conceito de *token* em todos eles, penso que seria interessante criar uma seção "Tokens e Permissões" para introduzir estes conceitos. Assim o leitor já vai estar familiarizado com tudo.

Após esta seção de Tokens, você terá uma seção para falar dos nós. Crie uma subseção para cada nó da sua tabelinha e dê exemplos, como os que você fez.
Procure também, comentar os campos mais comuns de cada nó. A documentação traz para cada nó, uma tabela com todos os campos dele. Você pode utilizar isso no seu documento e pegar os campos mais importantes.

Para cada nó você comente das arestas mais importantes também e como requisitar essas informações, como você fez em alguns exemplos.



# Comentários 31/05/2018

## Capítulo 4 - Graph API

### 4.1 - Visão Geral
A seção de visão geral precisa ser melhorada em alguns pontos:

"A Graph segue um padrão de estrutura que se assemelha a um grafo. Para(MELO
et al., 2014), informalmente um grafo pode ser explicado como um conjunto de pontos que
formam vértices e arestas, onde cada ponto é chamado de vértice e o par deles é chamado
de arestas. A estrutura da Graph, segue esse mesmo conceito, possuindo nós, arestas e
campos."

Por favor, não utilize os nós como pontos. Isso pode criar confusão. Tanto é que a sua referência dá isso como uma definição completamente informal. Posteriormente ela fala de uma maneira mais formal e mais adequada.
Utilize a nomenclatura de vértice mesmo. Um grafo é um conjunto de vértices e um relacionamento entre eles. Entre cada par de vértice relacionado, temos uma aresta. A sua própria referência fala isso mais pra frente.


"Todas as requisições de dados ao Facebook devem ser feitas a uma URL de hospedagem, nessa URL está hospedado todos os dados que podem ser requisitados são: <graph-video.facebook.com>, usada para requisições de vídeos e <graph.facebook.com>, usadas para todos os outros tipos de requisições.""

Uma URL não hospeda nada, por favor corrija.

"As respostas a todas as requisições feitas a rede social são em formato e estrutura
JSON, podendo possuir os três tipos básicos de conteúdo: numérico, booleano e String,
podendo ser associativo ou não. O JSON é um modelo para armazenamento e transmissão
de informações no formato texto e com capacidade de transmitir um grande volume de
dados."

Isso deveria estar no referencial teórico. Uma seção específica sobre o JSON. No meio do texto isso não está legal. O que é um JSON associativo? Fica meio perdido.


Pontos menores:
- Referência sem detalhes (MELO). É um trabalho de graduação, o que é?


### 4.2
Creio que a seção 4.2 poderia ser denominada de "Nós".

Inicialmente, descreva quais os tipos de nós através de uma tabela.
Associe os nós mais importantes ao que eles representam na rede social. Repare que o leitor não necessariamente consegue fazer esta associação que parece óbvia para quem já mexeu com a API (você).


Aqui você deve detalhar em cada subseção um nó diferente. Concentre-se nos mais importantes.
Para cada nó diferente, utilize exemplos originais que expliquem a interação entre a API.

Como ós campos estão dentro do nó, convém explicitar os campos dos nós selecionados para explicação.

Para cada código, explique a funcionalidade da requisição e detalhe a  resposta. Você fala que é demonstrado a possibilidade de uso, mas o leitor nunca viu isso na vida.


# Comentários 29/05/2018

## Capítulo 4 - Graph API

Não há uma visão geral da Graph API. Eu senti falta de você descrever os principais elementos da Graph. O Capítulo já começa descrevendo o Token de acesso. Neste ponto, o leitor não sabe o que é um nó, não sabe o que é um token e não sabe o que é uma aresta. A API não foi apresentada. O texto está mal apresentado.


Você pode encontrar os conceitos básicos [aqui](https://developers.facebook.com/docs/graph-api/overview).

Repare que ele introduz a Graph API e seus principais elementos. Assim, para tudo que for descrito posteriormente, o leitor já terá um conhecimento superficial prévio.

Neste [link](https://developers.facebook.com/docs/graph-api/using-graph-api) você encontra as descrições anteriores ainda com mais detalhe e os mecanismos básicos por trás da API. Você deve se concentrar em trazer uma descrição **rica** da API.

Penso que uma seção denominada *Visão Geral* deveria ser criada. Esta seção deve procurar ser técnica.

Outra coisa que eu percebi foi que não há a parte da resposta do servidor, apenas as requisições são ilustradas. Se a parte de resposta for inserida e explicada, o leitor vai ter uma facilidade ainda maior para utilização da API. Utilize a Graph API explorer.

Senti falta da descrição dos principais nós da Graph. Você pode descrevê-los nesta seção visão geral e utilizar o material encontrado na referência, repare que há uma diferença dos nós, temos os nós especiais, e os nós que são alcançáveis apenas via arestas.

Você inserir o aprofundamento dos nós principais da Graph API (*cf.* https://developers.facebook.com/docs/graph-api/reference). Como exemplo posso citar:
- Album
- Comment
- Event
- Link
- Page
- Object Likes
- Page
- Photo
- Profile
- Status
- Video 

Se há outros nós que considera relevante, insira-os também.

Repare que para cada nó, você tem os campos (*fields*) e as arestas. Descreva-os também.

Forneça exemplos de operação sobre os nós principais. Ex: recuperação de likes e comentários de uma foto, recuperação das fotos presentes em um álbum, publicação em páginas, publicação em perfis, publicação de fotos em um perfil ou uma páginas, ... Seja criativo, o usuário quer ter um outro guia para aprender a API que não seja a documentação oficial do Facebook.


O texto encontra-se com diversos erros de português. As palavras estão sequer acentuadas. A banca vai se recusar a ler qualquer trabalho neste sentido.
