<?php
/*Classe responsável por gerenciar dados no MySQL via PDO.*/
class DB
{
    //  Protected : Acesso permitido à própria classe e a suas subclasses (herança).
    protected $conexao;
    protected $host = "localhost";
    protected $dbname = "artesanato_db";
    protected $username = "root";
    protected $password = "";
    protected $pdo;

    

    public function __construct()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";
            $this->pdo = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            die("Falha na conexão" . $e->getMessage());
        }
    }


    public function __destruct()
    {
        $this->pdo = null; // Encerra a conexão
    }

    private function execute($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }


    //  função Vizualiza os produtos
    public function getproduto_artesanais()
    {
        return $this->execute("SELECT * FROM produtos_artesanais")->fetchAll(PDO::FETCH_ASSOC);
    }

    // função de cadastro de produto
    public function getcadastroProduto($nome_produto, $preco, $descrição, $categoria,)
    {
        $this->execute("INSERT INTO produtos_artesanais (nome_produto, preco, descricao, categoria)  VALUES (?, ?, ?,?)", [
            $nome_produto,
            $preco,
            $descrição,
            $categoria
        ]);
    }

    public function selectProdutoPorId($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos_artesanais WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //Função de  deletar
    public function deleteProduto($id)
    {
        $this->execute("DELETE FROM produtos_artesanais  WHERE id = ?", [$id]);
    }
}
