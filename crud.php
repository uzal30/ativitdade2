<?php

    require_once './conexao.php';

    function create($aluno)
    {
        try {
            $con = getConnection();

            $stmt = $con->prepare("INSERT INTO aluno(nome_aluno, email_aluno) VALUES (:nome, :email)");

            $stmt->bindParam(":email", $email->email);
            $stmt->bindParam(":nome", $nome->nome);

            if ($stmt->execute())
                echo "Aluno cadastrado com sucesso";
        } catch (PDOException $error) {
            echo "Erro ao cadastrar o aluno. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }

    function get()
    {
        try {
            $con = getConnection();

            $rs = $con->query("SELECT nome_aluno, email_aluno FROM aluno");

            while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
                echo $row->nome_aluno . "<br>";
                echo $row->email_aluno . "<br>";
            }
        } catch (PDOException $error) {
            echo "Erro ao listar os alunos. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($rs);
        }
    }

    function find($nome)
    {
        try {
            $con = getConnection();

            $stmt = $con->prepare("SELECT nome_aluno, email_aluno FROM aluno WHERE nome_aluno LIKE :nome");
            $stmt->bindValue(":nome", "%{$nome}%");

            if($stmt->execute()) {
                if($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                        echo $row->nome_aluno . "<br>";
                        echo $row->email_aluno . "<br>";
                    }
                }
            }
        } catch (PDOException $error) {
            echo "Erro ao buscar o aluno '{$nome}'. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }

    function update($aluno)
    {
        try {
            $con = getConnection();

            $stmt = $con->prepare("UPDATE aluno SET nome_aluno = :nome, email_aluno = :email WHERE id_aluno = :id");

            $stmt->bindParam(":id", $cidade->codigo);
            $stmt->bindParam(":nome", $cidade->nome);
            $stmt->bindParam(":email", $cidade->uf);

            if ($stmt->execute())
                echo "Aluno atualizado com sucesso";
        } catch (PDOException $error) {
            echo "Erro ao atualizar o aluno. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }

    function delete($id)
    {
        try {
            $con = getConnection();

            $stmt = $con->prepare("DELETE FROM aluno WHERE id_Aluno = ?");
            $stmt->bindParam(1, $id);

            if ($stmt->execute())
                echo "Aluno deletado com sucesso";
        } catch (PDOException $error) {
            echo "Erro ao deletar aluno. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }