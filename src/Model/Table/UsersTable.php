<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
	// public $hasMany = array(
	// 	'Error_Logs' => array(
	// 		'dependent' => true
	// 	),
	// 	'Error_Logs' => array(
	// 		'dependent' => true
	// 	),
	// );
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp', [
        'events' => [
            'Model.beforeSave' => [
                'create_date' => 'new',
                'update_date' => 'always',
            ]
        ]
    ]);
    // $this->hasMany('Error_logs', [
    //   'dependent' => true
    // ]);
  }

  public function validationDefault(Validator $validator)
  {
    $validator
      ->notEmpty('name')
      ->requirePresence('name');
    //   ->notEmpty('passwd')
    //   ->requirePresence('passwd')     u
    //   ->add('passwd', [
    //     'length' => [
    //       'rule' => ['minLength', 6],
    //       'message' => 'パスワードは6文字以上'
    //     ]
    //   ]);
    return $validator;
  }
}
