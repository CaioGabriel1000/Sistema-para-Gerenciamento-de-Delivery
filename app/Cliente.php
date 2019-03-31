<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $codigoCliente
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $situacao
 * @property integer $telefone
 * @property string $remember_token
 * @property string $criacao
 * @property string $atualizacao
 * @property Pedido[] $pedidos
 * @property TelefoneCliente[] $telefoneClientes
 */
class Cliente extends Authenticatable
{

	use Notifiable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cliente';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigoCliente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'situacao', 'telefone'
	];
	
	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany('App\Pedido', 'codigoCliente', 'codigoCliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telefoneClientes()
    {
        return $this->hasMany('App\TelefoneCliente', 'codigoCliente', 'codigoCliente');
    }
}