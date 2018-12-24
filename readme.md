# EXEMPLO DE CRUD EM PHP USANDO MSQLI

A classe `DbConfig` situada no directório `_config`, possui um metódo e uma variavel privada.
 
 - **getConnection()** :: Faz a conexão com o Banco de dados e se já tiver uma conexão existente no sistema apenas retorna ela.
 - **$instance** :: Propriedade estática que possui a conexão com o banco de dados.
 
## CrudExample Class

 Está classe possui exemplo básico de como interagir com a classe `DbConfig`.
 
 - **getNamesFromUsersTable()** - Retorna os nomes de todos usuários na tbl `Users`
 - **insertNewValueInUsersTable()** - Faz a inserção de um novo usuario na tbl `Users`
 - **deleteDeterminedItem()** - Deleta um determinado usuário na tbl `Users`
 - **updateDeterminedItem()** - Atualiza o nome de um usuário na tbl `Users`
 - **baseForQueries ()** - Para evitar redundância de codigos toda execução das `queries` foram extraídas para esse metódo protegido!
 
## Contantes usadas no sistema
   - **host**
   - **user**
   - **pwd**
   - **database**
   - **port** - Por padrão é `3306`, caso tengas alterado na configuração do SGBD, precisas alterar ela.
   
# License
    MIT - Acidiney Dias
