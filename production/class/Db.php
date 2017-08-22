<?php
 class Db extends PDO
 {
     public function __construct($sgdb='mysql', $host='srv3.ibesp.org.br', $db='portal_ibesp', $user='ibespobr', $password='Ibe8409', $persistent = true)
     {
         $options = [
             PDO::ATTR_PERSISTENT => $persistent,
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
         ];
         $dns = sprintf('%s:host=%s;dbname=%s;charset=utf8', $sgdb, $host, $db);
         parent::__construct($dns, $user, $password, $options);
     }

     protected function bindValues(&$sth, $data = [])
     {
         foreach ($data as $key => $val) {
             $tipo = (is_int($val))? PDO::PARAM_INT: PDO::PARAM_STR;
             $sth->bindValue(":$key", $val, $tipo);
         }
     }

     public function select($sql, array $where = [], $all = true, $fetchMode = PDO::FETCH_ASSOC)
     {
         $sth = $this->prepare($sql);

         $this->bindValues($sth, $where);

         $sth->execute();

         if ($all) {
             return $sth->fetchAll($fetchMode);
         }

         return $sth->fetch($fetchMode);
     }

     public function insert($tabela, $data)
     {
         //$camposNomes = implode('`, `', array_keys($data));
         //$camposValores = ':' . implode(', :', array_keys($data));
         $camposNomes = implode('`, `', array_keys($data));
         $camposValores = "'" . implode("', '", $data)."'";

         $sql = sprintf('INSERT INTO %s (`%s`) VALUES (%s)', $tabela, $camposNomes, $camposValores);
//         echo $sql; // descomentar apenas para verificar o comando insert q está sendo passado
//         exit();
         $sth = $this->prepare($sql);

         $this->bindValues($sth, $data);

         $sth->execute();

         return $this->lastInsertId();
     }

     public function update($table, $data = [], $where)
     {
         $novosDados = null;
         foreach ($data as $key => $value) {
             $novosDados .= "$key='$value',";
         }
         $novosDados = rtrim($novosDados, ',');
         $sql = sprintf('UPDATE %s SET %s WHERE %s', $table, $novosDados, $where);
         //echo $sql;
         //exit();

         $sth = $this->prepare($sql);

         $this->bindValues($sth, $data);

         return $sth->execute();
     }

     public function delete($table, $where, $limit=1)
     {
         $sql = sprintf('DELETE FROM %s WHERE %s LIMIT %s', $table, $where, $limit);
         echo "<H1>ATENÇÃO</H1>";
         echo "<h3>o método de excluisão de noticias está desativo. Ao inves de excluir a noticia por favor inativa-a</h3>";
//         echo $sql;
         exit();
         return $this->exec($sql);
     }
 }