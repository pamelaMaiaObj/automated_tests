# Docker básico para desenvolvimento local
Um projeto criado com docker e docker-compose para desenvolver local sem precisar de PHP, Mysql, apache ou outro server.

Por padrão este projeto suporte aplicações com php 7.4, então caso precise de rodar algum projeto mais antigo ou mais novo, deverá configurar o arquivo Dockerfile dentro da pasta docker/php.

## Instalação (caso não tenha o docker e docker-composer)

1. Instale o [Docker](https://www.docker.com/) rodando o seguinte comando: `sudo apt install docker.io`.

Em seguida, rode os seguintes comando para iniciar e habilitar o seu Docker.
```bash
sudo systemctl start docker
```

```bash
sudo systemctl enable docker
```
Ao final do processo, rode esse comando para verificar se o docker esta instalando corretamente:`sudo docker --version`.
## Instalando o Docker-Compose
Rode teste comando para baixar o docker-compose
```bash
sudo curl -L "https://github.com/docker/compose/releases/download/1.24.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
```

Agora iremos dar permissao para o arquivo executavel e iremos move-lo para a pasta de arquivos executaveis do linux

```bash
sudo chmod +x /usr/local/bin/docker-compose
sudo ln -s /usr/local/bin/docker-compose /usr/bin/docker-compose
```
E para verificar se instalou tudo certinho, rode o comando abaixo:
```bash
sudo docker-compose --version
```
## Baixando os arquivos necessarios para subir os containers
Clone esse repositório com o comando abaixo:
```bash
git clone git@github.com:pamelaMaiaObj/docker_base.git
```

Digamos que voce tenha clonado seu projeto na pasta `/var/www`, adentre a pasta `/var/www/`  e crie uma pasta chamada `app`, este pasta servira para colocar suas aplicacoes, e por fim, crie uma pasta chamada `my-data` na raiz do repositorio (caso não exista), esta pasta servira para que o docker salve todos os arquivos do nosso banco para que persistamos caso precise reiniciar os containers, etc.

#### Caso você tenha instalado o docker / docker-compose com sudo:
Rode os seguintes comandos dentro da pasta onde esta o docker-compose.yml
```bash
sudo groupadd docker
```
```bash
sudo usermod -aG docker $USER
```
```bash
newgrp docker
```

Ao final, rode o seguinte comando para subir os seus containeres:
```bash
docker-compose up -d --no-deps --build
```
Caso queira baixar seus containeres:
```bash
docker-compose down -v
```
## Configurando sua primeira aplicacao
Por padrao, todos os projetos deverao ser clonado dentro da pasta `app` que criamos no passo acima. Como esta primeira versao de docker nao contem git instalado nos containers, clone o repositorio diretamente da sua maquina sem acessar nenhum container.

No ato dos containers subirem e darem ok, teste acessar sua aplicacao pelo browser colocando localhost/`nome_da_sua_aplicacao` e pronto!

Agora voce roda sua aplicacao totalmente no docker.
