# SQL-Injection-test

O código que eu criei é em PHP e usa o banco de dados MySQL. Ele simula uma página web que recebe o nome de um usuário e verifica se ele existe no banco de dados. Se existir, ele mostra as informações do usuário, como nome, email e senha. Se não existir, ele mostra uma mensagem de erro.

Esse código é vulnerável a SQL Injection porque ele usa o valor do parâmetro `name` diretamente na consulta SQL sem validar ou escapar. Isso permite que um invasor envie consultas SQL maliciosas através do campo de busca e manipule os dados do banco de dados.

Por exemplo, se o invasor digitar no campo de busca o valor `'; DROP TABLE users; --`, ele irá apagar a tabela `users` do banco de dados. Isso porque a consulta SQL gerada será:

```sql
SELECT * FROM users WHERE name = ''; DROP TABLE users; --'
```

Essa consulta é composta por duas instruções SQL separadas por um ponto e vírgula. A primeira instrução é `SELECT * FROM users WHERE name = ''`, que não retorna nenhum resultado. A segunda instrução é `DROP TABLE users`, que apaga a tabela `users`. O comentário `--` serve para ignorar o resto da consulta original.

Para evitar esse tipo de ataque, é recomendado usar métodos seguros para construir as consultas SQL, como os prepared statements ou as stored procedures, que impedem a interpretação dos dados do usuário como parte da consulta. Também é importante validar e filtrar os dados do usuário, usar princípios de menor privilégio para os usuários do banco de dados e manter os softwares atualizados.

Espero que esse código seja útil para você. Se você tiver alguma outra pergunta ou quiser conversar sobre outro assunto, fique à vontade para me enviar uma mensagem. 😊
