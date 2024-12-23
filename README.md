Portal de Notícias 📰

Este repositório contém o código-fonte de um portal de notícias desenvolvido para facilitar a adição de notícias, permitindo a organização por categorias como política, economia, esportes, cultura, tecnologia, e muito mais.

Funcionalidades principais:

   Publicação dinâmica de notícias: interface intuitiva para adicionar conteúdos rapidamente.
   Categorias organizadas: cada notícia pode ser classificada em diferentes categorias para facilitar a navegação.
   Design responsivo: otimizado para desktop, tablets e dispositivos móveis.

Tecnologias utilizadas

    Frontend: HTML, CSS, JavaScript
    Backend: CodeIgniter 4
    Banco de Dados: MySQL
    Bootstrap: utilização de temas gratuitos e trechos de código fornecidos pelo Start Bootstrap, que oferece licenças MIT de código aberto.

Script Obrigatório:

    php spark serve: [O servidor ficará disponível no endereço padrão http://localhost:8080. Caso queira mudar a porta, pode acrescentar "--port 8000"]
    
Scripts:

    php spark migrate:create noticias [Cria um arquivo de migração para o banco de dados chamado noticias. Esse arquivo será usado para definir a estrutura de uma tabela ou fazer alterações no banco, o arquivo será salvo no diretório app/Database/Migrations]
    php spark migrate [Executa as migrações criadas e aplica as alterações no banco de dados.Cria ou modifica tabelas no banco com base nos arquivos de migração presentes no diretório app/Database/Migrations.]
    php spark migrate:rollback [Reverte a última migração aplicada no banco de dados.Útil para desfazer alterações, como remover tabelas ou colunas criadas pela última migração.]
    php spark migrate:refresh [Reverte todas as migrações aplicadas e as executa novamente.É útil para testar alterações na estrutura do banco, limpando e recriando as tabelas em sequência.]
