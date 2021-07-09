<?php  // resources/lang/ja/validation.php

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

    'accepted'             => ':attributeを承認してください。',
    'active_url'           => ':attributeは正しいURLではありません。',
    'after'                => ':attributeは:date以降の日付にしてください。',
    'alpha'                => ':attributeは英字のみにしてください。',
    'alpha_dash'           => ':attributeは英数字とハイフンのみにしてください。',
    'alpha_num'            => ':attributeは英数字のみにしてください。',
    'array'                => ':attributeを正しい値にしてください。',
    'before'               => ':attributeは:date以前の日付にしてください。',
    'between'              => [
        'numeric' => ':attributeは:min〜:maxまでにしてください。',
        'file'    => ':attributeは:min〜:max KBまでのファイルにしてください。',
        'string'  => ':attributeは:min〜:max文字にしてください。',
        'array'   => ':attributeは:min〜:max個までにしてください。',
    ],
    'boolean'              => ':attributeはtrueかfalseにしてください。',
    'confirmed'            => ':attributeは確認用項目と一致していません。',
    'date'                 => ':attributeは正しい日付ではありません。',
    'date_format'          => ':attributeは":format"書式と一致していません。',
    'delete_project'       => 'この案件には稼働か応募しているユーザーがいます。',
    'different'            => ':attributeは:otherと違うものにしてください。',
    'digits'               => ':attributeは:digits桁にしてください',
    'digits_between'       => ':attributeは:min〜:max桁にしてください。',
    'email'                => ':attributeを正しいメールアドレスにしてください。',
    'filled'               => ':attributeは必須です。',
    'file'                 => ':attributeのアップロードに失敗しました。。',
    'exists'               => '選択された:attributeは正しくありません。',
    'image'                => ':attributeは画像にしてください。',
    'in'                   => '選択された:attributeは正しくありません。',
    'integer'              => ':attributeは整数にしてください。',
    'ip'                   => ':attributeを正しいIPアドレスにしてください。',
    'max'                  => [
        'numeric' => ':attributeは:max以下にしてください。',
        'file'    => ':attributeは:max KB以下のファイルにしてください。.',
        'string'  => ':attributeは:max文字以下にしてください。',
        'array'   => ':attributeは:max個以下にしてください。',
    ],
    'mimes'                => ':attributeのファイル拡張子が異なります。',
    'mimetypes'            => ':attributeのファイル形式が不正です。',
    'min'                  => [
        'numeric' => ':attributeは:min以上にしてください。',
        'file'    => ':attributeは:min KB以上のファイルにしてください。.',
        'string'  => ':attributeは:min文字以上にしてください。',
        'array'   => ':attributeは:min個以上にしてください。',
    ],
    'not_in'               => '選択された:attributeは正しくありません。',
    'numeric'              => ':attributeは数字にしてください。',
    'regex'                => ':attributeの書式が正しくありません。',
    'required'             => ':attributeは必須です。',
    'required_if'          => ':otherが:valueの時、:attributeは必須です。',
    'required_with'        => ':valuesが存在する時、:attributeは必須です。',
    'required_with_all'    => ':valuesが存在する時、:attributeは必須です。',
    'required_without'     => ':valuesが存在しない時、:attributeは必須です。',
    'required_without_all' => ':valuesが存在しない時、:attributeは必須です。',
    'same'                 => ':attributeと:otherは一致していません。',
    'size'                 => [
        'numeric' => ':attributeは:sizeにしてください。',
        'file'    => ':attributeは:size KBにしてください。.',
        'string'  => ':attribute:size文字にしてください。',
        'array'   => ':attributeは:size個にしてください。',
    ],
    'string'               => ':attributeは文字列にしてください。',
    'timezone'             => ':attributeは正しいタイムゾーンをしていしてください。',
    'unique'               => ':attributeは既に存在します。',
    'url'                  => ':attributeを正しい書式にしてください。',

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
        'password' => [
            'half_width_upper_case' => ':attributeは半角英字大文字を含めて入力してください。',
            'half_width_lower_case' => ':attributeは半角英字小文字を含めて入力してください。',
            'half_width_number' => ':attributeは半角数字を含めて入力してください。',
            'same_password_as_before' => '前回設定した:attributeとは異なる、新しい:attributeを入力してください。',
            'included_email_text_in_password' => ':attributeはメールアドレスの文字列を含めずに入力してください。'
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | カスタムバリデーション属性名
    |--------------------------------------------------------------------------
    |
    | 以下の言語行は、例えば"email"の代わりに「メールアドレス」のように、
    | 読み手にフレンドリーな表現でプレースホルダーを置き換えるために指定する
    | 言語行です。これはメッセージをよりきれいに表示するために役に立ちます。
    |
    */
    'attributes' => [
        'user_id' => 'ユーザーID',
        'sei' => '姓',
        'sei_kana' => '姓(カナ)',
        'mei' => '名',
        'mei_kana' => '名(カナ)',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'tel' => '電話番号',
        'birthday' => '誕生日',
        'password_confirmation' => 'パスワード確認欄',
        'position_ids' => 'ポジション',
        'position_ids.*' => 'ポジション',
        'csv_array.*.position_ids.*' => 'ポジション',
        'skill_ids' => 'スキル',
        'level_ids' => 'レベル',
        'skill_ids.*' => 'スキル',
        'csv_array.*.skill_ids.*' => 'スキル',
        'level_ids.*' => 'レベル',
        'project_id' => 'プロジェクトID',
        'min_unit_price' => '最低単価',
        'csv_array.*.min_unit_price' => '最低単価',
        'max_unit_price' => '最高単価',
        'csv_array.*.max_unit_price' => '最高単価',
        'min_operation_time' => '最低精算幅',
        'csv_array.*.min_operation_time' => '最低精算幅',
        'max_operation_time' => '最高精算幅',
        'csv_array.*.max_operation_time' => '最高精算幅',
        'description' => '案件内容',
        'csv_array.*.description' => '案件内容',
        'weekly_attendance' => '週勤務日数',
        'csv_array.*.weekly_attendance' => '週勤務日数',
        'feature' => '案件内容',
        'csv_array.*.feature' => '案件内容',
        'work_start' => '業務開始時間',
        'csv_array.*.work_start' => '業務開始時間',
        'work_end' => '業務終了時間',
        'csv_array.*.work_end' => '業務終了時間',
        'better_condition' => '尚可条件',
        'csv_array.*.better_condition' => '尚可条件',
        'required_condition' => '必須条件',
        'csv_array.*.required_condition' => '必須条件',
        'agent_id' => '案件元会社',
        'csv_array.*.agent_id' => '案件元会社',
        'station_id' => '駅名',
        'csv_array.*.station_id' => '駅名',
        'csv_file' => 'csvファイル',
        'keyword' => '検索キーワード',
        'title' => 'お知らせタイトル',
        'contents' => 'お知らせ詳細',
        'policy' => '利用規約・個人情報の取扱い'
    ]
];
