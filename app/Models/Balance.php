<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;

class Balance extends Model
{
    //Retiramos o timestamps do migration
    public $timestamps = false;

    public function deposit(float $value) : Array
    {  
        DB::beginTransaction();

        $total_before = $this->amount ? $this->amount : 0 ;
        $this->amount += number_format($value, 2 ,'.', '');
        $deposit = $this->save();

        $historic = auth()->user()->historics()->create([
                                                        'type'          => 'I',
                                                        'amount'        => $value,
                                                        'total_before'  => $total_before,
                                                        'total_after'   => $this->amount,
                                                        'date'          => date('Ymd'),
                                                        ]);

        if($deposit && $historic)
        {
            DB::commit();
            return [
                'success' => 'true',
                'message' => 'Sucesso ao recarregar'
            ];
        }else{
            DB::rollback();
            return [
                'success' => 'false',
                'message' => 'Falha ao recarregar'
            ];
        }
    }

    public function withdrawn(float $value) : Array
    {  
        if($this->amount < $value)
        {
            return [
                'success' => false,
                'message' => 'Saldo insuficiente',
            ];
        }
        DB::beginTransaction();

        $total_before = $this->amount ? $this->amount : 0 ;
        $this->amount -= number_format($value, 2 ,'.', '');
        $withdrawn = $this->save();

        $historic = auth()->user()->historics()->create([
                                                        'type'          => 'O',
                                                        'amount'        => $value,
                                                        'total_before'  => $total_before,
                                                        'total_after'   => $this->amount,
                                                        'date'          => date('Ymd'),
                                                        ]);

        if($withdrawn && $historic)
        {
            DB::commit();
            return [
                'success' => 'true',
                'message' => 'Saque com sucesso'
            ];
        }else{
            DB::rollback();
            return [
                'success' => 'false',
                'message' => 'Falha ao sacar'
            ];
        }
    }

    public function transfer(float $value, User $user) : array
    {
        if($this->amount < $value)
        {
            return [
                'success' => false,
                'message' => 'Saldo insuficiente',
            ];
        }
        
        DB::beginTransaction();

        $total_before = $this->amount ? $this->amount : 0 ;
        $this->amount -= number_format($value, 2 ,'.', '');
        $withdrawn = $this->save();

        $historic = auth()->user()->historics()->create([
                                                        'type'          => 'O',
                                                        'amount'        => $value,
                                                        'total_before'  => $total_before,
                                                        'total_after'   => $this->amount,
                                                        'date'          => date('Ymd'),
                                                        ]);

        if($withdrawn && $historic)
        {
            DB::commit();
            return [
                'success' => 'true',
                'message' => 'Saque com sucesso'
            ];
        }else{
            DB::rollback();
            return [
                'success' => 'false',
                'message' => 'Falha ao sacar'
            ];
        }

    }
}
