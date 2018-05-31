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
