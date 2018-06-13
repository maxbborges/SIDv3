# Comentários 12/06/2018

Falta alterar o título e escrever o resumo e abstract, conforme os comentários 10/06/2018.

## Capítulo 1 - Introdução

> As vantagens para a utilização da interatividade estão presentes em diversas formas, como por exemplo para (ESCOBAR, 2007, p.4), transmissões ao vivo por rádio ou televisão permite o acesso a um dado acontecimento no exato momento em que ele acontece, mas quando se tem o advento da Internet coloca-se a possibilidade de interação com a informação que é recebida, isso quase que instantaneamente, onde os integrantes atuam simultaneamente, comentando ou opinando sobre aquele determinado assunto. Para (DEUZE, 2002), o advento da Internet traz a possibilidade do público “responder, interagir ou mesmo customizar certas histórias”.

Em nenhum momento foi falado de interatividade e você já começa falando das vantagens dela. Sugiro reescrever este parágrafo falando primeiramente do como a interatividade está sendo usada nos meios de comunicação e depois falando por que ela é boa. A impressão que dá é que as coisas estão invertidas aqui.


Os parágrafos dos dispositivos móveis não está sendo ligado ao que foi falado sobre marketing digital e interatividade. Arranje um meio de ligar este parágrafo com os outros anteriores.

> O Campus, para divulgação de notícias e as mais variadas informações, se utiliza principalmente da sua página oficial e sua página oficial no Facebook. Para utilização desses meios, é necessário que os administradores façam publicações independentes para cada uma das páginas, onerando o trabalho do mesmo, além disso, as páginas não são bem divulgadas, muitas vezes os estudantes e visitantes nem ficam sabendo das notícias que lá são publicadas. Além disso, os professores contam com poucas formas fáceis e intuitivas para repassar informações a seus alunos.

Que Campus?
"da sua página oficial e sua página oficial" -> "de suas páginas WEB e Facebook".

> O Sistema Integrado de Divulgação de Informações do IFB (SID) oferece uma maior visibilidade das notícias, sendo possível por meio painéis espalhados pelo campus, uma melhor interação da comunidade com as notícias, apresentando nos painéis os comentários que foram publicados nas mídias sociais, além de uma melhor forma de comunicação entre professor e aluno, oferecendo um aplicativo mobile que simula o Sistema de Gestão Acadêmica (SGA) em conjunto com a apresentação das notícias.

Não estamos simulando o SGA, o que estamos fazendo é simulando uma comunicação institucional professor aluno integrada ao SGA, são coisas distintas.

## 1.1 Motivação

> "fazendo-o ter interesse em acompanhar e participar de uma determinada noticia ou matéria, tornando-a mais facilmente acessível."

Acessível ou assimilável. O conceito de acessível tem muito mais a ver com disponibilidade e facilidade de acesso na minha opinião.

> Então se tem a necessidade de melhor exposição das notícias, de uma forma de contato fácil e rápida com a comunidade acadêmica, de um sistema mais interativo, com suporte a gestão academia e com uma forma simplificada de contato entre professor e aluno. Pensando nisso, vê-se a necessidade de um sistema onde é possível expor notícias referentes a instituição com facilidade, contando com uma melhor facilidade de acesso e interatividade do espectador dessa notícia, por meio de comentários na publicação e apresentação em tempo real.

Este parágrafo é crucial na motivação. Aqui você está criticando os problemas que o Campus IFB Taguatinga possui. No entanto, repare que aqui você fala da falta de integração com um sistema acadêmico, mas não apresentou isso como um problema antes. Sugiro separar esse parágrafo em dois: um comentando a questão da separação das publicações e da falta de integração com um sistema acadêmico (SGA) e outro falando da necessidade de termos essas coisas em um único sistema.

>Além disso, a comunicação entre professor e turma é feita geralmente por meio físico, e-mail ou necessitando de outros softwares complementares, sendo necessário o professor ter e-mails individuais de cada aluno ou de turma para encaminhar qualquer notícia e isso acaba sendo ruim tanto para os professores, quanto para os alunos.

Este parágrafo de crítica, pode inclusive fazer parte do primeiro parágrafo citando anteriormente.

## 1.2 Proposta

> Com uso da estrutura cliente-servidor e tendo o sistema SID em sua versão 2 implementado por (SOBRINHO, 2017) como base, é proposto a elaboração da terceira versão. Com o uso dos conceito de sinalização digital e marketing digital, a proposta é fazer com que o sistema apresente conteúdos referentes ao IFB e essas informações tenham integração com o Facebook, apresentando postagens e comentários devidamente moderados em tempo real nas telas espalhadas por locais de maior movimento do Câmpus Taguatinga do Instituto Federal de Brasília ou nos dispositivos móveis de cada pessoa.



"Estrutura cliente-servidor" -> "Arquitetura cliente-servidor"

Como é a primeira vez que o SIDv2 está disposto aqui, coloque o seu nome na íntegra, seguido de uma abreviação entre parênteses.

> O sistema proposto, visa proporcionar a integração dos meios usados atualmente para apresentação das informações referentes ao Câmpus, além da inclusão de outros meios. A sistema fará a integração entre a página do Facebook da instituição, painéis de notícias e dispositivos móveis dos alunos ou professores.

O que seriam esses painéis, os murais?

### 1.3 Objetivos

> Um sistema capaz de proporcionar objetividade e simplicidade nas informações a serem repassadas, oferecendo a opção de interação aos usuários do sistema, isso será possível com o estudo da API da rede social Facebook.

Isso não soa como um objetivo. Penso que como no parágrafo anterior você falou do levantamento, aqui você deve citar como objetivo a implementação propriamente dita do sistema descrito na proposta, tomando como base o SID (Formosa), e integração dele com o Facebook, de modo a disponibilizar os comentários aprovados dos internautas em relação à notícia.

Além disso, você não precisa mencionar COMO você vai fazer isso, uma vez que isso se enquadra como Metodologia, e não objetivos, então exclua essa última parte que fala da API.

Por si só o Estudo da API é um objetivo, uma vez que estamos detalhando ela no trabalho.  Coloque isso como um objetivo, mas sem escrever com o intuito de como ela será utilizada para resolver algo.

> Realizar também a implementação de um aplicativo mobile com funcionalidades adicionais, além das funcionalidades do sistema. Fazendo o consumo de um API fictícia do Sistema de Gestão Academia (SGA) para futura integração a plataforma existente.
 
 Tire o Realizar também, coloque "Implementação de um aplicativo mobile que, além das funcionalidades do SID, realiza o consumo de uma API fictícia do Sistema de Gestão Acadêmica (SGA), visando uma futura integração à plataforma existente quando for disponibilizada. ".


### 1.4 Metodologia

Coloque tudo no futuro aqui.

Através da revisão bibliográfica, será realizada a compração entre ferramentas(...)

O estudo da GRAPH API e ferramentas como(....) viabilizará a integração do sistema com a rede social Facebook

Ao utilizar o SID versão 2 como base(...)

> O estudo da Graph API se deu de modo a realizar a leitura da documentação realizando testes práticos das funcionalidade e das possíveis implementações, usando como auxílio a ferramenta Graph API Explorer oferecida pela rede social para testes de cada
uma das solicitações. 

Fale aqui que através do estudo da Graph API será possível entender como recuperar dados da rede social e realizar a integração com o sistema.

> Usando o SID versão 2 como sistema base, será implementado no sistema as inte rações com as redes sociais. As informações serão apresentadas em multiplataforma que podem ser televisores, painéis, páginas web ou celulares, essas informações podem ser alteradas acessando ao servidor com o sistema instalado e conectado a Internet. Após serem criadas ou modificadas, as publicadas poderão ser transmitidas e acessadas pelos clientes em distintas plataformas ao mesmo tempo.

Como é feita a integração com as redes sociais? (Graph API)


> A metodologia presente neste trabalho está direcionada aos aspectos específicos do desenvolvimento de ferramentas computacionais com o intuito de melhoria no processo
de comunicação e veiculação de informações através de várias plataformas, sejam elas mobile, WEB ou painéis. Para a versão mobile do sistema, será usado um framework de desenvolvimento específica para a plataforma.

Este parágrafo está complicado de ser entendido. Você fala que a metodologia está direcionada aos aspectos do desenvolvimento, mas sem dizer qual é, entende? Falou muito e não disse nada.
Reescreva.


> Todo o sistema, incluindo o mobile, seguirá o padrão de desenvolvimento ágil, com metodologia SCRUM, sendo definido sprints semanais, comumente marcada as quartas feiras, para definição das funcionalidades a serem desenvolvidas ou melhoradas.

## 1.5 Organização do documento

Colocar aqui a proposta de cada capítulo que vem depois do primeiro.

# Capítulo 2 - Trabalhos Relacionados

> Este capítulo tem o propósito de inserir e embasar o leitor sobre algumas ferramentas que possuem funcionalidades que usam os conceitos de sinalização e marketing digital, exibindo em telas externas, divulgações criadas pelo administrador no servidor. Todas elas seguem a ideia de uma estrutura cliente-servidor, onde o servidor é responsável por gerenciar os conteúdos que serão exibidos no cliente.

Não é bem esse o objetivo do capítulo. O propósito dele é apresentar trabalhos que fazem o uso de marketing e sinalização digital e criticar cada um deles de acordo com as suas funcionalidades. Tanto é que no final dele, nós devemos reforçar a proposta do SID, cuja missão é uma ferramenta mais completa do que estas.

## 2.1 OOZO

> Atualmente, uma solução encontrada na literatura que faz integração entre marketing digital e o conceito de sinalização digital é o software (OOZO, 2017), onde o módulo cliente é multiplataformas e pode ser instalado em sistemas Linux, Windows, MacOs, Raspberry e página WEB, suas publicações podem ser exibidas online como streaming ou também em telas públicas que são painéis colocada em locais estratégicos de grande acesso público e com programações especificas, designadas pelo desenvolvedor com a assinatura de um serviço de exibição.

Veja bem, tanto Raspberry quando páginas WEB não são sistemas.

Perai, o cara tem que desenvolver alguma coisa ou o sistema já está pronto e só é necessário utilizá-lo?  Esta última parte está confusa.

> No modulo cliente, o OOZO não exibe comentários feitos na publicação, ele somente a captura e a envia para exibição. Durante a exibição do conteúdo publicado o acesso a notícia completa pelo usuário, é feito com o uso de um QRCode, que recupera automaticamente a url postagem, exibido na tela do cliente.

Algumas palavras foram "comidas aqui"

## 2.2 Mango Signs

> Outra solução encontrada é o (SIGNS, 2017), o módulo cliente é multiplataformas, estando disponível somente para Android, Windows ou extensão do navegador chrome.
Entretanto, no módulo cliente não possui um QR code para que o telespectador possa acessar a notícia completa.

Bom, se roda em extensão do chrome, roda em qualquer sistema compatível com Chrome né? Mude isso:  "módulo cliente é multiplataforma, estando disponível em sistemas android e sistemas compatíveis com o navegador Google Chrome."

### SID Formosa

Nota: especialmente, esta subseção tem uma importância muito grande, pois deve ficar claro as limitações do SID Formosa para mostrar o que foi feito no nosso de diferente. Se isto não ficar claro, a banca pode argumentar que não entendeu o que fizemos de diferente.

>  O SID versão 2 (Sistema Inteligente de Divulgação de Informações do IFG-Formosa), é outra solução, dispondo de dois módulos, sendo o modulo administrador e cliente, onde o primeiro é acessível somente por meio de uma página WEB. Enquanto o cliente pode ser acessível por páginas WEB ou implementado em dispositivos como um Raspberry.

O módulo cliente é acessado por qualquer navegador. Estamos falando de software. O raspberry é um computador, assim como o seu notebook, então ele é capaz de rodar o módulo cliente por dispor de um *browser*. Logo, ambos são acessados via navegador, concorda comigo? 

É melhor citar o que o módulo administrador faz e o que o módulo cliente faz. Um é responsável pelo cadastro de notícias e outro pela formatação e apresentação delas.

> Usando o Raspberry Pi como cliente, o SID apresenta as informações que lhe são configuradas, recuperando informações previamente armazenadas no banco de dados. As publicações apresentadas na tela possui um QR Code usado pelo usuário caso tenha interesse em acessar a notícia completa. (SOBRINHO, 2017)

Mais uma vez, o SID Formosa não se limita ao Raspberry pi.


> Entre os problemas encontrados estão: o link que será apresentado no QRCode deve ser configurado manualmente na criação da publicação, o sistema não faz o consumo de uma REST API para requisição de dados, ficando dependente do uso do módulo cliente, além de não oferecer nenhum tipo de aplicação mobile.

O maior problema para mim é a falta da integração com o facebook por meio de uma página e recuperação de comentários.

Não vejo a falta de uma API REST como um problema muito grande, ele só não se propôs a disponibilizar uma.

### 2.4 Screenly

> O (SCREENLY, 2017) usa o Raspberry Pi e um programa próprio que deve ser
instalado no equipamento para seu funcionamento. Na página de login, de acesso WEB, só é possível criar uma nova conta ou logar com uma existe, não havendo integração com Facebook ou Google para login automático. Um dos meios de exibição das publicações é por meio de um Raspberry Pi com o uso de um software proprietário da Screenly instalado e uma televisão conectada a ele.

Repare que você, no final do parágrafo, está falando a mesma coisa do início.


### 2.5 Xibo


### Comparativo

Foi retirado uma linha da tabela, qual era ela e por que?

Faltou reafirmar que a nossa proposta visa fornecer uma ferramenta mais completa que as demais. Conforme comentários 10/06/2018.

Revise os comentários 10/06/2018.


## Capítulo 3

### 3.1 Marketing Digital

Problemas de formatação \LaTeX, corrija.

### 3.3 Arquitetura Cliente-Servidor

> Em resumo, o cliente é um processo que interage com o usuário através de uma interface gráfica ou não, enquanto o servidor fornece um determinado serviço que fica disponível para todo Cliente que o necessita.

Se ele interage ou não, basta dizer que ele interage e consume os serviços prestados pelo servidor..


### 3.6 API

O conceito de API continua sem definição ainda. Revisar comentários 10/06.

#### 3.6.1 REST

O conceito de REST continua sem definição. Você diz que é usada por webservice, mas o que é REST? Quais métodos HTTP ela se baseia? Repare que no capítulo 4 e 5 você usa muito estes métodos.

### JSON

Fale aqui que frequentemente o JSON é utilizado por webservices que utilizam da arquitetura REST como formato de troca de mensagens.



# Comentários 10/06/2018

Pré textual: escrever resumo e abstract.

Penso que o título poderia ser mudado para **Definição, Estudo e Implementação de um Sistema de Divulgação de Informações Integrado do IFB**

Não fiz uma revisão do texto, apenas do conteúdo, no entanto, muita coisa pode ser reescrita ou melhorada. Após as alterações principais, vamos começar a trabalhar nisso.


## Capítulo 1 - Introdução

A proposta da introdução é definir o problema que nós estamos estudando e qual a deficiência do IFB no que tange o mecanismo de divulgação de informações institucional.

> Com o passar dos anos, a mídia foi obtendo novas formas, as divulgações de forma estática e mais tradicionais (revistas e jornais) foram deixando de serem os meios mais eficientes de se expor um conteúdo ou propaganda, foi necessário então que novas formas de expor conteúdos fossem pensadas e desenvolvidas.

Ao falar de mídia e meios estáticos, você não disse quais os meios que sucederam eles. Cite a Internet aqui e utilize uma referência para maior embasamento. Ou seja, queremos dizer que hoje em dia a dinâmica do fluxo de informações mudou. Tanto é que depois você fala de Marketing Digital. Lembre-se que os parágrafos devem estar *linkados*.

Alguns parágrafos aparecem soltos e sem referências, como este abaixo:

> A uso das redes para disseminação de uma informação ou conteúdo vem se tornando uma das ferramentas mais atraentes para divulgações. Não apenas por ser um dos
meios mais acessados atualmente, mas também por conta da maior facilidade de interações
dos espectadores, usuários e empresas.

Utilize referências para embasar o que você está dizendo.

> Entre os usuários de dispositivos móveis estão estudantes, professores e visitantes
do Instituto Federal de Educação, Ciência e Tecnologia de Brasília - Campus Taguatinga
(IFB - Campus Taguatinga).

Retire esse parágrafo. Não é necessário fazer esta constatação fora de contexto.


>O Campus, para divulgação de notícias e as mais variadas informações, se utiliza
principalmente da página oficial e sua página oficial no Facebook. Para utilização desses
meios, é necessário serem feitas publicações independentes, além disso, as páginas não são
bem divulgadas, muitas vezes os estudantes e visitantes nem ficam sabendo das notícias
que lá são publicadas. Além disso, os professores contam com poucas formas fáceis e
intuitivas para repassar informações a seus alunos.

Não está claro o que são publicações independentes. Fale que cada veículo de divulgação de informações é operado individualmente, onerando o trabalho do servidor.



> No intuito da melhor visibilidade das notícias, da maior interação da comunidade
com elas e de uma melhor forma de comunicação entre professor e aluno, surgiu a ideia
do SID, onde será possível um sistema mais integrado e intuitivo para o administrador
e um sistema interativo para a comunidade, onde será possível opinar com comentários
e curtidas nas publicações, além de atalho para acessar a notícia completa tanto por um
computador, quando pelos smartphones e com o uso dos smartphones será possível o
professor encaminhar mensagens para a turma em que ele leciona.

Reescreva este parágrafo. 
Você deve criticar dois pontos (pode utilizar parte do parágrafo anterior):
- Falta de Integração entre os veículos institucionais, isto é, eles atuam independentemente.
- Falta de interatividade entre os veículos institucionais.

Após a crítica, escreva um novo parágrafo e fale sobre o Sistema Integrado de Divulgação de Informações do IFB (SID) e de maneira breve, cite como ele resolve o problema, sem entrar muito em detalhes.
Basicamente você deve falar que ele integra a parte de sinalização digital em painéis espalhados pelo campus com a parte interativa provida pelas redes sociais e por que esta interatividade melhora a assimilação de informação dos transeuntes.
Além disso, diga ele simula o consumo da API do Sistema de Gestão Acadêmico Institucional, abrindo uma porta para uma implementação futura.

### 1.1 Motivação

Coloque referências nos teus parágrafos.

> Pensando nisso, vê-se a necessidade de um sistema onde é possível expor notícias
referentes a instituição com facilidade contando também com a interatividade do espectador dessa notícia, seja ele por meio de curtidas ou por comentários na publicação, tudo em tempo real. Partindo da necessidade de melhor exposição das notícias e de uma forma de contato fácil e rápida com a comunidade acadêmica, de um sistema mais interativo, com suporte a gestão academia e com uma forma simplificada de contato entre professor e aluno."


Não entre em detalhes de implementação, esqueça o "curtidas".


Além disso, *"Partindo da necessidade de melhor exposição das notícias e de uma forma de contato fácil e rápida com a comunidade acadêmica, de um sistema mais interativo, com suporte a gestão academia e com uma forma simplificada de contato entre professor e aluno."* ficou estranho, parece que está pedindo uma informação a mais. Reescreva esse período. Não é partindo disso, há uma necessidade disso.

> Então surge a ideia do SID, onde é possível a melhor interatividade do espectador com as publicações acadêmicas, envio de mensagens para turmas específicas, além do administrador ter uma maior facilidade de criar e editar publicação vinculadas a redes sociais, integrando vários serviços em um único. 


Não é necessário este parágrafo na motivação, isso faz parte da proposta.



### 1.2 Proposta


A proposta está falha.
Ela não fala do sistema e de como ele pode resolver os problemas elencados na Motivação e Introdução. Aqui você deve pegar o gancho das últimas seções e mostrar como estamos atacando o problema.

Certifique-se de dar os devidos créditos ao SID implementado no câmpus Formosa e cite as suas deficiências brevemente.

Aqui devem entrar os conceitos de:
- Sinalização e Marketing digital e sua eficiência na assimilação de informações.
- Interatividade do usuário com as notícias
- Simulação da integração do sistema com plataformas acadêmicas já existentes para futura implementação após a disponibilização da interface destas plataformas para os desenvolvedores. Aqui é importante dizer que não foi possível ainda fazer isto com a interface pois ela ainda não foi publicada pelo setor de TI da reitoria.


### 1.3 Justificativa


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


Retire este parágrafo.


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
