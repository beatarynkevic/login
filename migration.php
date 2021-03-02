//sukuriam vartotoja rankiniu budu ir irasom i duomenu baze
//vienkartinis failas
//passwordas hashinamas md5 algoritmu (nebenaudojama)
//php turi password_hash ir password_verify
//vienkartinis naudojimas
<?php
$users = [
    ['name' => 'Petras', 'surname' => 'Lapinskas', 'pass' => password_hash('123', PASSWORD_DEFAULT)],
    ['name' => 'Ona', 'surname' => 'Lapinskiene', 'pass' => password_hash('123', PASSWORD_DEFAULT)],
    ['name' => 'Saulius', 'surname' => 'Lapinskas', 'pass' => password_hash('123', PASSWORD_DEFAULT)]
];

file_put_contents(__DIR__.'/users.json', json_encode($users));

//vienkartinis failas,kad sugeneruotu duomenu baze su fake users