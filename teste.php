<?php
    require_once __DIR__ . "/config/database.php";
    require_once __DIR__ . "/controllers/quartoController.php";
    require_once __DIR__ . "/controllers/PasswordController.php";
    require_once __DIR__ . "/controllers/clienteController.php";
    require_once __DIR__ . "/controllers/adicionalController.php";
    require_once __DIR__ . "/controllers/pedidoController.php";
    require_once __DIR__ . "/controllers/reservaController.php";
    require_once __DIR__ . "/controllers/userController.php";

    //    $data = [
    //    "email" => "thayson.silva@gmail.com",
    //   "senha" => 123 
//    ];

    
    //          CRUD USUÁRIOS
    
<<<<<<< HEAD
    //CRIAR USUÁRIO
=======
    // CRIAR USUÁRIO
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    // $dataUsuario = [
    //     "id_role_fk" => 1,
    //     "nome" => "Maria Santos",
    //     "email" => "maria@hotel.com",
    //     "senha" => PasswordController::generateHash("maria123")
    // ];
    // UserController::criar($connect, $dataUsuario);
    
    // LISTAR TODOS OS USUÁRIOS
    // UserController::listarTodos($connect);
    
    // BUSCAR USUÁRIO POR ID
<<<<<<< HEAD
    // UserController::buscarPorId($connect, 2);
=======
    // UserController::buscarPorId($connect, 1);
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    
    // ATUALIZAR USUÁRIO
    // $dataUsuarioAtualizado = [
    //     "id_role_fk" => 2,
    //     "nome" => "Maria Santos Silva",
    //     "email" => "maria.silva@hotel.com",
    //     "senha" => PasswordController::generateHash("novaSenha123")
    // ];
    // UserController::atualizar($connect, 1, $dataUsuarioAtualizado);
    
<<<<<<< HEAD
    // // DELETAR USUÁRIO
    // UserController::delete($connect, 6);
=======
    // DELETAR USUÁRIO
    // UserController::delete($connect, 1);
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    
    //          CRUD CLIENTES 
    
    // CRIAR CLIENTE
    // $dataCliente = [
<<<<<<< HEAD
    //     "nome" => "João Silva",
    //     "email" => "joao.silva@email.cm",
    //     "cpf" => "123.456.789-01",
    //     "telefone" => "(11) 99999-9999",
    //     "senha" => "joao13"
=======
    //     "id_roles_fk" => 2,
    //     "nome" => "João Silva",
    //     "email" => "joao.silva@email.com",
    //     "cpf" => "123.456.789-00",
    //     "telefone" => "(11) 99999-9999",
    //     "senha" => PasswordController::generateHash("joao123")
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    // ];
    // ClienteController::criar($connect, $dataCliente);
    
    // LISTAR TODOS OS CLIENTES
    // ClienteController::listarTodos($connect);
    
    // BUSCAR CLIENTE POR ID
    // ClienteController::buscarPorId($connect, 1);
    
    // ATUALIZAR CLIENTE
    // $dataClienteAtualizado = [
<<<<<<< HEAD
=======
    //     "id_roles_fk" => 2,
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    //     "nome" => "João Silva Santos",
    //     "email" => "joao.santos@email.com",
    //     "cpf" => "123.456.789-00",
    //     "telefone" => "(11) 98888-8888",
    //     "senha" => PasswordController::generateHash("novaSenha456")
    // ];
    // ClienteController::atualizar($connect, 1, $dataClienteAtualizado);
    
    // DELETAR CLIENTE
<<<<<<< HEAD
    // ClienteController::delete($connect, 3);
=======
    // ClienteController::delete($connect, 1);
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    
    //          CRUD QUARTOS

    // CRIAR QUARTO
    // $dataQuarto = [
    //     "nome" => "Suíte Presidencial",
    //     "numero" => "501",
    //     "tipo" => "Suíte",
    //     "camaSolteiro" => "0",
    //     "camaCasal" => "1",
<<<<<<< HEAD
    //     "disponivel" => 1,
    //     "preco" => 500.00
=======
    //     "disponível" => 1,
    //     "preco" => 500.00,
    //     "id_imagem_fk" => 1
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    // ];
    // QuartoController::criar($connect, $dataQuarto);
    
    // LISTAR TODOS OS QUARTOS
    // QuartoController::listarTodos($connect);
    
    // BUSCAR QUARTO POR ID
<<<<<<< HEAD
    // QuartoController::buscarPorId($connect, 3);
=======
    // QuartoController::buscarPorId($connect, 1);
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    
    // ATUALIZAR QUARTO
    // $dataQuartoAtualizado = [
    //     "nome" => "Suíte Presidencial Luxo",
    //     "numero" => "501",
    //     "tipo" => "Suíte Premium",
    //     "camaSolteiro" => "0",
    //     "camaCasal" => "1",
<<<<<<< HEAD
    //     "disponivel" => 1,
    //     "preco" => 600.00,
    //     "id_imagem_fk" => 2
    // ];
    // QuartoController::atualizar($connect, 3, $dataQuartoAtualizado);
    
    // DELETAR QUARTO
    // QuartoController::delete($connect, 3);
=======
    //     "disponível" => 1,
    //     "preco" => 600.00,
    //     "id_imagem_fk" => 2
    // ];
    // QuartoController::atualizar($connect, 1, $dataQuartoAtualizado);
    
    // DELETAR QUARTO
    // QuartoController::delete($connect, 1);
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    
    //          CRUD ADICIONAIS 

    // CRIAR ADICIONAL
    // $dataAdicional = [
    //     "nome" => "Massagem Relaxante",
<<<<<<< HEAD
    //     "preco" => 120.00
=======
    //     "descricao" => "Sessão de 60 minutos com óleos essenciais",
    //     "preco" => 120.00,
    //     "disponivel" => 1
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    // ];
    // AdicionalController::criar($connect, $dataAdicional);
    
    // LISTAR TODOS OS ADICIONAIS
    // AdicionalController::listarTodos($connect);
    
    // BUSCAR ADICIONAL POR ID
    // AdicionalController::buscarPorId($connect, 1);
    
    // ATUALIZAR ADICIONAL
    // $dataAdicionalAtualizado = [
    //     "nome" => "Massagem Premium",
<<<<<<< HEAD
    //     "preco" => 150.00
=======
    //     "descricao" => "Sessão de 90 minutos com óleos essenciais e música relaxante",
    //     "preco" => 150.00,
    //     "disponivel" => 1
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    // ];
    // AdicionalController::atualizar($connect, 1, $dataAdicionalAtualizado);
    
    // DELETAR ADICIONAL
<<<<<<< HEAD
    // AdicionalController::delete($connect, 2);
=======
    // AdicionalController::delete($connect, 1);
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    
    //          CRUD PEDIDOS
    
    // CRIAR PEDIDO
    // $dataPedido = [
<<<<<<< HEAD
    //     "id_usuario_fk" => 7,
    //     "id_cliente_fk" => 1,
    //     "pagamento" => 2
=======
    //     "id_usuario_fk" => 1,
    //     "id_cliente_fk" => 1,
    //     "pagamento" => "Pix"
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    // ];
    // PedidoController::criar($connect, $dataPedido);
    
    // LISTAR TODOS OS PEDIDOS
    // PedidoController::listarTodos($connect);
    
    // BUSCAR PEDIDO POR ID
<<<<<<< HEAD
    // PedidoController::buscarPorId($connect, 7);
    
    // ATUALIZAR PEDIDO
    // $dataPedidoAtualizado = [
    //     "pagamento" => 2
    // ];
    // PedidoController::atualizar($connect, 2, $dataPedidoAtualizado);
    
    // DELETAR PEDIDO
    // PedidoController::delete($connect, 6);
=======
    // PedidoController::buscarPorId($connect, 1);
    
    // ATUALIZAR PEDIDO
    // $dataPedidoAtualizado = [
    //     "id_usuario_fk" => 2,
    //     "id_cliente_fk" => 1,
    //     "pagamento" => "Credito"
    // ];
    // PedidoController::atualizar($connect, 1, $dataPedidoAtualizado);
    
    // DELETAR PEDIDO
    // PedidoController::delete($connect, 1);
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    
    //          CRUD RESERVAS 

    // CRIAR RESERVA
    // $dataReserva = [
<<<<<<< HEAD
    //     "id_pedido_fk" => 7,
    //     "id_quarto_fk" => 7,
=======
    //     "id_pedido_fk" => 1,
    //     "id_quarto_fk" => 1,
>>>>>>> 5c07991c36180b6d54042ae66ebb93e9e89972a3
    //     "valor_total" => 500.00
    // ];
    // ReservaController::criar($connect, $dataReserva);
    
    // LISTAR TODAS AS RESERVAS
    // ReservaController::listarTodos($connect);
    
    // BUSCAR RESERVA POR ID
    // ReservaController::buscarPorId($connect, 1);
    
    // ATUALIZAR RESERVA
    // $dataReservaAtualizada = [
    //     "id_pedido_fk" => 1,
    //     "id_quarto_fk" => 2,
    //     "valor_total" => 600.00
    // ];
    // ReservaController::atualizar($connect, 1, $dataReservaAtualizada);
    
    // DELETAR RESERVA
    // ReservaController::delete($connect, 1);
    
    // BUSCAR RESERVAS POR PEDIDO
    // ReservaController::listarPorPedido($connect, 1);

?>    