<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'O campo deve ser aceito.',
    'active_url'           => 'O campo não é uma URL válida.',
    'after'                => 'O campo deve ser uma data posterior a :date.',
    'after_or_equal'       => 'O campo deve ser uma data posterior ou igual a :date.',
    'alpha'                => 'O campo só pode conter letras.',
    'alpha_dash'           => 'O campo só pode conter letras, números e traços.',
    'alpha_num'            => 'O campo só pode conter letras e números.',
    'array'                => 'O campo deve ser uma matriz.',
    'before'               => 'O campo deve ser uma data anterior :date.',
    'before_or_equal'      => 'O campo deve ser uma data anterior ou igual a :date.',
    'between'              => [
        'numeric' => 'O campo deve ser entre :min e :max.',
        'file'    => 'O campo deve ser entre :min e :max kilobytes.',
        'string'  => 'O campo deve ser entre :min e :max caracteres.',
        'array'   => 'O campo deve ter entre :min e :max itens.',
    ],
    'boolean'              => 'O campo deve ser verdadeiro ou falso.',
    'confirmed'            => 'O campo de confirmação não confere.',
    'date'                 => 'O campo não é uma data válida.',
    'date_format'          => 'O campo não corresponde ao formato :format.',
    'different'            => 'Os campos e :other devem ser diferentes.',
    'digits'               => 'O campo deve ter :digits dígitos.',
    'digits_between'       => 'O campo deve ter entre :min e :max dígitos.',
    'dimensions'           => 'O campo tem dimensões de imagem inválidas.',
    'distinct'             => 'O campo campo tem um valor duplicado.',
    'email'                => 'O campo deve ser um endereço de e-mail válido.',
    'exists'               => 'O dado já está cadastado.',
    'file'                 => 'O campo deve ser um arquivo.',
    'filled'               => 'O campo deve ter um valor.',
    'image'                => 'O campo deve ser uma imagem.',
    'in'                   => 'O campo selecionado é inválido.',
    'in_array'             => 'O campo não existe em :other.',
    'integer'              => 'O campo deve ser um número inteiro.',
    'ip'                   => 'O campo deve ser um endereço de IP válido.',
    'ipv4'                 => 'O campo deve ser um endereço IPv4 válido.',
    'ipv6'                 => 'O campo deve ser um endereço IPv6 válido.',
    'json'                 => 'O campo deve ser uma string JSON válida.',
    'max'                  => [
        'numeric' => 'O campo não pode ser superior a :max.',
        'file'    => 'O campo não pode ser superior a :max kilobytes.',
        'string'  => 'O campo não pode ser superior a :max caracteres.',
        'array'   => 'O campo não pode ter mais do que :max itens.',
    ],
    'mimes'                => 'O campo deve ser um arquivo do tipo: :values.',
    'mimetypes'            => 'O campo deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O campo deve ser pelo menos :min.',
        'file'    => 'O campo deve ter pelo menos :min kilobytes.',
        'string'  => 'O campo deve ter pelo menos :min caracteres.',
        'array'   => 'O campo deve ter pelo menos :min itens.',
    ],
    'not_in'               => 'O campo selecionado é inválido.',
    'numeric'              => 'O campo deve ser um número.',
    'present'              => 'O campo deve estar presente.',
    'regex'                => 'O campo tem um formato inválido.',
    'required'             => 'O campo é obrigatório.',
    'required_if'          => 'O campo é obrigatório quando :other for :value.',
    'required_unless'      => 'O campo é obrigatório exceto quando :other for :values.',
    'required_with'        => 'O campo é obrigatório quando :values está presente.',
    'required_with_all'    => 'O campo é obrigatório quando :values está presente.',
    'required_without'     => 'O campo é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo é obrigatório quando nenhum dos :values estão presentes.',
    'same'                 => 'Os campos e :other devem corresponder.',
    'size'                 => [
        'numeric' => 'O campo deve ser :size.',
        'file'    => 'O campo deve ser :size kilobytes.',
        'string'  => 'O campo deve ser :size caracteres.',
        'array'   => 'O campo deve conter :size itens.',
    ],
    'string'               => 'O campo deve ser uma string.',
    'timezone'             => 'O campo deve ser uma zona válida.',
    'unique'               => 'O campo já está sendo utilizado.',
    'uploaded'             => 'Ocorreu uma falha no upload do campo ',
    'url'                  => 'O campo tem um formato inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
