<?php

class ContaBanco {

    private $numConta;
    private $tipo;
    private $dono;
    private $saldo;
    private $status;

    public function __construct(){
        $this->saldo = 0;
        $this->status = false;
    }

    public function abrirConta($t){

        if ($this->status) {
            return "Conta já está aberta.";
        }

        if ($t != "CC" && $t != "CP") {
            return "Tipo de conta inválido.";
        }

        $this->tipo = $t;
        $this->status = true;

        if ($t == "CC") {
            $this->saldo = 0;
        } else {
            $this->saldo = 0;
        }

        return "Conta aberta com sucesso!";
    }

    public function fecharConta(){

        if (!$this->status) {
            return "Conta já está fechada.";
        }

        if ($this->saldo > 0) {
            return "Conta ainda contém saldo. Não pode ser encerrada.";
        }

        if ($this->saldo < 0) {
            return "Conta com saldo negativo. Não pode ser encerrada.";
        }

        $this->status = false;
        $this->numConta = null;
        $this->tipo = null;
        $this->dono = null;
        return "Conta encerrada com sucesso!";
    }

    public function depositar($valor){

        if (!$this->status) {
            return "Conta fechada. Não é possível depositar.";
        }

        if ($valor <= 0) {
            return "Valor inválido para depósito.";
        }

        $this->saldo += $valor;

        return "Depósito de R$ $valor realizado com sucesso!";
    }

    public function sacar($valor){

        if (!$this->status) {
            return "Conta fechada. Não é possível sacar.";
        }

        if ($valor <= 0) {
            return "Valor inválido para saque.";
        }

        if ($this->saldo < $valor) {
            return "Saldo insuficiente.";
        }

        $this->saldo -= $valor;

        return "Saque de R$ $valor realizado com sucesso!";
    }

    public function pagarMensal(){

        if (!$this->status) {
            return "Conta fechada. Não é possível cobrar mensalidade.";
        }

        $valor = ($this->tipo == "CC") ? 12 : 20;

        if ($this->saldo < $valor) {
            return "Saldo insuficiente para pagar mensalidade.";
        }

        $this->saldo -= $valor;

        return "Mensalidade de R$ $valor debitada com sucesso!";
    }

    public function getNumConta(){ return $this->numConta; }
    public function getTipo(){ return $this->tipo; }
    public function getDono(){ return $this->dono; }
    public function getSaldo(){ return $this->saldo; }
    public function getStatus(){ return $this->status; }

    public function setNumConta($numConta){ $this->numConta = $numConta; }
    public function setDono($dono){ $this->dono = $dono; }

}